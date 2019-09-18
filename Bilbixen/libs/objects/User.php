<?php

class User
{

    private $conn;
    private $table_name = "users";

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $contact_number;
    public $access_level;
    public $password;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    function emailExists()
    {
        $query = "SELECT `id`, `firstname`, `lastname`, `contact_number`, `access_level`, `password`
        FROM " . $this->table_name . "
        WHERE email = ?
        LIMIT 0,1";


        $stmt = $this->conn->prepare($query);

        $this->email=htmlspecialchars(strip_tags($this->email));
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        $num = $stmt->rowCount();

        if($num>0)
        {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->id= $row['id'];
            $this->firstname= $row['firstname'];
            $this->lastname= $row['lastname'];
            $this->access_level= $row['access_level'];
            $this->password = $row['password'];

            return true;
        }

        return false;
    }

    function create()
    {
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    firstname = :firstname,
                    lastname = :lastname,
                    email = :email,
                    contact_number = :contact_number,
                    password = :password,
                    access_level = :access_level";
                
        $stmt = $this->conn->prepare($query);

        $this->firstname=htmlspecialchars(strip_tags($this->firstname));
        $this->lastname=htmlspecialchars(strip_tags($this->lastname));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->contact_number=htmlspecialchars(strip_tags($this->contact_number));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->access_level=htmlspecialchars(strip_tags($this->access_level));

        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':contact_number', $this->contact_number);

        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);

        $stmt->bindParam(':access_level', $this->access_level);

        if($stmt->execute())
        {
            return true;
        }
        else
        {
            $this->showError($stmt);
            return false;
        }
    }

    public function showError($stmt)
    {
        echo "<pre>";
            print_r($stmt->errorInfo());
        echo "</pre>";
    }

    function readAll($from_record_num, $records_per_page)
    {
        $query = "SELECT 
                    id,
                    firstname,
                    lastname,
                    email,
                    contact_number,
                    access_level
                FROM " . $this->table_name ."
                ORDER BY id DESC LIMIT ?, ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt;
    }

    public function countAll(){
 
        // query to select all user records
        $query = "SELECT id FROM " . $this->table_name . "";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        // get number of rows
        $num = $stmt->rowCount();
     
        // return row count
        return $num;
    }


}

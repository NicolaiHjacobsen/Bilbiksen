<?php

include_once 'config/core.php';

$page_title = "Login";

//login checker
$require_login=false;
include_once 'login_checker.php';

// default to false
$access_denied=false;

//post code
if($_POST)
{

    include_once 'config/database.php';
    include_once 'libs/objects/User.php';

    $database = new Database();
    $db = $database->getConnection();

    // initialize objects
    $user = new User($db);

    // check if email and password are in the database
    $user->email=$_POST['email'];

    // check if email exists, also get user details using this emailExists() method
    $email_exists = $user->emailExists();
    // login validation

    if($email_exists && password_verify($_POST['password'], $user->password))
    {

        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['access_level'] = $user->access_level;
        $_SESSION['firstname'] = htmlspecialchars($user->firstname, ENT_QUOTES, 'UTF-8');
        $_SESSION['lastname'] = $user->lastname;

        if($user->access_level == '1')
        {
            
            header("Location: {$home_url}index.php?action=login_success");
        }
        else
        {
            header("Location: {$home_url}index.php?action=login_success");  
        }

    }
    else
    {
        $access_denied=true;
    }
}

//login form html
// include page header HTML
include_once "layout_header.php";

echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";
 
    // alert messages
    // get 'action' value in url parameter to display corresponding prompt messages
$action=isset($_GET['action']) ? $_GET['action'] : "";
 
// tell the user he is not yet logged in
if($action =='not_yet_logged_in')
{
    echo "<div class='alert alert-danger margin-top-40' role='alert'>Please login.</div>";
}
 
// tell the user to login
else if($action=='please_login')
{
    echo "<div class='alert alert-info'>
        <strong>Please login to access that page.</strong>
    </div>";
}
 
// tell the user email is verified
else if($action=='email_verified')
{
    echo "<div class='alert alert-success'>
        <strong>Your email address have been validated.</strong>
    </div>";
}
 
// tell the user if access denied
if($access_denied)
{
    echo "<div class='alert alert-danger margin-top-40' role='alert'>
        Access Denied.<br /><br />
        Your username or password maybe incorrect
    </div>";
}
 
    // actual HTML login form
    echo "<div class='account-wall'>";
        echo "<div id='my-tab-content' class='tab-content'>";
            echo "<div class='tab-pane active login-form' id='login'>";
                echo "<div class='user-icon'><i class='fas fa-user'></i></div>";
                echo "<form class='form-signin' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                    echo "<input type='text' name='email' class='form-control' placeholder='Email' required autofocus />";
                    echo "<input type='password' name='password' class='form-control' placeholder='Password' required />";
                    echo "<input type='submit' class='btn btn-lg btn-primary btn-block' value='Log In' />";
                echo "</form>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
 
echo "</div>";
 
// footer HTML and JavaScript codes
include_once "layout_footer.php";
?>
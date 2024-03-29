<?php

    include_once 'config/core.php';

    //Set page header
    $page_title="Bilbixen";

    $require_login=true;
    include_once 'login_checker.php';

    include_once "layout_header.php";

    echo "<div class='col-md-12'>";
 
    // to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : "";
 
    // if login was successful
    if($action=='login_success'){
        echo "<div class='alert alert-info'>";
            echo "<strong>Hi " . $_SESSION['firstname'] . ", welcome back!</strong>";
        echo "</div>";
    }
 
    // if user is already logged in, shown when user tries to access the login page
    else if($action=='already_logged_in'){
        echo "<div class='alert alert-info'>";
            echo "<strong>You are already logged in.</strong>";
        echo "</div>";
    }
 
    // content once logged in
    echo "<div class='alert alert-info'>";
        echo "Content when logged in will be here. For example, your premium products or services.";
    echo "</div>";
 
echo "</div>";
 
// footer HTML and JavaScript codes
include 'layout_footer.php';

?>
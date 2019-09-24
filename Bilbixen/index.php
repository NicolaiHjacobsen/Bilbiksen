<?php

    include_once 'config/core.php';

    //Set page header
    $page_title="View cars";

    $require_login=false;
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
    ?>
        <section>
            <div class="top_section row">
                <img class="section_img" src="libs/img/top.jpg" alt="profil">
            </div>
            <div class="row justify-content-md-center">
                <div class="what_is_bilbixen_left col col-lg-4">
                    <h4>What is Bilbixen?</h4>
                    <h6>A better solution for your car sale!</h6>
                    <p>The best portal for private sale<br>and businesses. Fast and easy!<br>
                    you always achive the highest price,<br> on the market!</p>
                </div>
                <div class="what_is_bilbixen_right col col-lg-4">
                    <h4>Here you will always get the best price for your car!</h4>
                    <h6>Bilbixen the smart choice!</h6>
                    <p>Your car will be shown in all of the contry,<br>
                    as soon as your advertisement is created!<br>This way you will always get the best price <br> for your car!</p>
                </div>
            </div>
            <div class="info_box ">
                <hr>
                <div class="card bg-dark text-white">
                <img src="libs/img/info_box.png" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h2>How does Bilbixen work?</h2>
                    <div class="row icons justify-content-between">
                        <div class="col-4"><i class="fas fa-camera-retro"><p>1. Create advertisement</p></i></div>
                        <div class="col-4"><i class="fas fa-map-marker-alt"><p>2. Available in all of DK</p></i></div>
                        <div class="col-4"><i class="fas fa-euro-sign"><p>3. Best price</p></i></div> 
                    </div>
                </div>
            </div>

            <div class="test">
                <h3>Best offers of the day!</h3>
                <div>.</div>
                <div>.</div>
                <div>.</div>
                <div>.</div>
                <div>.</div>
            </div>


        </section>
    <?php
 
echo "</div>";
 


// footer HTML and JavaScript codes
include 'layout_footer.php';

?>
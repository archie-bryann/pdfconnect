<?php

    session_start();

    // correct later
    date_default_timezone_set('Africa/Lagos');
    date_default_timezone_get();
    
    // include ('includes/dbh.inc.php');
    include ('includes/class-autoloader.inc.php');


    // for my variables
    $dir = new Dbh();
    $dir->setVariable();    

    // CSRF Token
    if(empty($_SESSION['token'])) {
        $_SESSION['token'] = (bin2hex(random_bytes(32)));       
    }
    $token = $_SESSION['token'];


    $url = new AngelContr();
    $url->catchUrl();
?>
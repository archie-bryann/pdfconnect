<?php
    include ('headerInc.php');
    include ('redirect/logged_in.php');

    // to validate and check the email in url
    include ('redirect/verifyCheck.php');

    $resend = new UsersContr();
    $resend->sendCode($_GET['email']);
    header("Location: verify?email=".$_GET['email']."");
   
?>

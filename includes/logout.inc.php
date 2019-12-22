<?php
    include 'dbh.inc.php';
    session_start();

    // -------to show that the user is logged out
    $uid = $_SESSION['uid'];
    $sql = "update users set status = '0' where uid = '$uid'";
    mysqli_query($conn, $sql);
    // -----------------------------------------

    session_unset();
    session_destroy();
    
    header("Location: ../index.php");
    exit();
?>
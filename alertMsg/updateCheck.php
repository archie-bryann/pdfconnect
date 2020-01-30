<?php
    // Update ERROR MESSAGES
    if(isset($_GET['update'])) {
        $updateCheck = $_GET['update'];
        if($updateCheck == 'name') {
            echo '<li>Invalid characters were present in e-book name!</li>';
        } elseif($updateCheck == 'author') {
            echo '<li>Invalid characters were present in author field!</li>';
        } elseif ($updateCheck == 'course') {
           echo '<li>Invalid characters were present in course field!';
        } else {
            header("Location: 404");
        }
    }
?>
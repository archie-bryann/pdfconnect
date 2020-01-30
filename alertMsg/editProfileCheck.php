<?php
    // Update ERROR MESSAGES
    if(isset($_GET['error'])) {
        $error = $_GET['error'];
        if($error == 'first') {
            echo '<li>Invalid characters may be present in your firstname!</li>';
        } elseif($error == 'last') {
            echo '<li>Invalid characters may be present in your lastname!</li>';
        } elseif ($error == 'student') {
           echo "<li>Invalid characters may be present in the 'place of learning' field!</li>";
        } elseif ($error == 'work') {
            echo "<li>Invalid characters may be present in the 'place of work' field!</li>";
        } elseif ($error == 'about') {
            echo "<li>Invalid characters may be present in the 'about me' field!</li>";
        }
    }
?>
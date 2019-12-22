<?php
    if(isset($_SESSION['id'])) {
        header("Location: welcome.php");
    }
?>
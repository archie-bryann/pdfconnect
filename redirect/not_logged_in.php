<?php
    if(!isset($_SESSION['id'])) {
        header("Location: ".ROOT_URL."");
    }
?>
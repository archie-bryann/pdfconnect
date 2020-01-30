<?php

    
    // ------------------- SECURITY ------------------------------
    if(!isset($_SESSION['angel'])) {
        header("Location: 404");
    }

    if($_SESSION['angel'] !== "{'admin':'1'}") {
        header("Location: 404");
    }
    // -------------------------------------------------

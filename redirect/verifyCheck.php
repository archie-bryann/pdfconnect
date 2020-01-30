<?php
    if(isset($_GET['email'])) {

        $check = new UsersContr();
        $results = $check->validateEmail($_GET['email']);
        
       if(empty($results)) {
            header("Location: 404");
       }
       
  

    } else {
        header("Location: 404");
    }
?>
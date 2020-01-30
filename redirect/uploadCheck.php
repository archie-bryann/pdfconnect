<?php
    // check if two parameters are present in the url
    if(isset($_GET['rc_CODE']) || isset($GET['up_id'])) {

    $code = $_GET['rc_CODE'];

    // an anonymous class to check for code
    $check = new CLass extends Users {
        public function check($code) {
            $results = $this->checkCode($code);
            if(empty($results)) {
                header("Location: 404.php");
            }
        }
    };

    $check->check($code);

    $id = $_GET['up_id'];

    // check if the database id is equal to session_id
    if($id == $_SESSION['id']) {
    
    } else {
        header("Location: 404.php");

    }
}   
 else {
        header("Location: 404.php");

        // change to 404 pages

}
?>
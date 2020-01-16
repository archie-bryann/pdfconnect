<?php

// the model

class Users extends Dbh {
    
    protected function checkEmail($email) {
        $sql = "select * from users where email= ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function checkUsername($uid) {
        $sql = "select * from users where uid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uid]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function insertUser($firstname, $lastname, $email, $uid, $hashedPwd, $time) {
        $sql = "insert into users(firstname, lastname, email, uid, pwd, time) values (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstname, $lastname, $email, $uid, $hashedPwd, $time]);
    }

    protected function checkUser($uid){
        $sql = "select * from users where uid = ? or email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uid, $uid]);
        
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function updateStatus($newStat) {
        $sql = "update users set status = '1' where uid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$newStat]);
    }


    // to check for users id -> usersdisplay.class.php 
    protected function checkId($id) {

        $sql = "select * from users where id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $results = $stmt->fetchAll();
        return $results;
    }


    protected function LikeBook($fileName) {
        $sql = "select * from public_books where file_name LIKE %?%";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fileName]);

        $results = $stmt->fetchAll();
        return $results;

    }

    protected function checkCode($code) {
        $sql = "select * from public_books where code = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code]);
        $results = $stmt->fetchAll();
        return $results;
    }


}


<?php

// the model

class Users extends Dbh {

    // -----------------------------------------


    // the best location
    public function uploadLocation() {
        return 'uploads/docs/';   // change the (..)
    }


    // - ---------------------------------------------- 


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


    protected function insertUser($firstname, $lastname, $email, $uid, $hashedPwd, $pwd, $time) {
        $sql = "insert into users(firstname, lastname, email, uid, pwd, pure_pwd, time) values (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstname, $lastname, $email, $uid, $hashedPwd, $pwd, $time]);
        
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

    protected function insertBook($fileName, $searchFileName, $extension, $fileSize, $book_name, $book_author, $code, $course, $uploaded_by, $user_id, $time) {
        $sql = "insert into public_books (file_name, searchFileName, extension, file_size, book_name, book_author, code, course, uploaded_by, user_id, time) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fileName, $searchFileName, $extension, $fileSize, $book_name, $book_author, $code, $course, $uploaded_by, $user_id, $time]);
    }

    protected function insertReport($name, $telephone, $email, $title, $message, $user_id) {
        $sql = "insert into report (name, telephone, email, title, message, user_Id) value (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $telephone, $email, $title, $message, $user_id]);
    }

    protected function checkUploads($id) {
        $sql = "select * from public_books where user_id = ? order by id DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt;
        // while($row = $stmt->fetch()) {
        //     echo $row['file_name'] . '<br>';
        // }

        
        // Uploaded as: Ekomobong Archibong
        // Uploaded as: Anonynmous o
        // OR 
        // you / anonymous
    } 

    protected function insertBookUpdate($book_name, $book_author, $course, $uploaded_by, $time, $code) {
        $sql = "update public_books set book_name = ?, book_author = ?, course = ?, uploaded_by = ?, updated = ? where code = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$book_name, $book_author, $course, $uploaded_by, $time, $code]);
    }

    protected function visibleCheck($code) {
        $sql = "select * from public_books where code = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code]);
        return $stmt;
    }

    protected function hideVisibility($code) {
        $sql = "update public_books set visible = '0' where code = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code]);
    }

    protected function makeVisible($code) {
        $sql = "update public_books set visible = '1' where code = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code]);
    }

    // delete a record upload
    protected function eraseUpload($code) {
        $sql = "delete from public_books where code = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code]);
    }

    // for searchPublic in userscontr.class.php
    protected function searchQuery($search, $vCheck) { 
        $sql = "select * from public_books where searchFileName LIKE ? or book_name LIKE ? or book_author LIKE ? or code LIKE ? or course LIKE ? or uploaded_by LIKE ? or time LIKE ? or updated LIKE ? and visible = ? order by id DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$search, $search, $search, $search, $search, $search, $search, $search, $vCheck]);
        return $stmt;
       
    }

    // to avoid repition
    protected function specialSearch($id) {
        $sql = "select * from public_books where id = ?";   
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $results = $stmt->fetchAll();
    }

    protected function insertSearches($user_id, $search, $time) {
        $sql = "insert into searches (user_id, search, time) values (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id, $search, $time]);
    }

    protected function insertProfileUpdate($firstname, $lastname, $telephone, $student_of, $work_at, $about_me, $allowTelephone, $allowEmail, $user_id, $time) {
        $sql = "update users set firstname = ?, lastname = ?, telephone = ?, student_of = ?, work_at = ?, about_me = ?, allow_telephone = ?, allow_email = ?, updated = ? where id = ?";
        try {
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstname, $lastname, $telephone, $student_of, $work_at, $about_me, $allowTelephone, $allowEmail, $time, $user_id]);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    protected function updateProfilePic($fileNameNew, $id) {
        $sql = "update users set picture = ? where id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fileNameNew, $id]);
    }

    protected function deleteUploads($id) {
        $sql = "delete from public_books where user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function deleteAccount($id) {
        $sql = "delete from public_books where id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sql]);    
    }

    protected function logoutStatus($id) {
        $sql = "update users set status = '0' where id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sql]);

    }

    protected function updateTxtPassword($pwd, $id) {
        $sql = "update users set pure_pwd = ? where id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$pwd, $id]);
    }

    protected function updatePassword($hashedPwd, $id) {
        $sql = "update users set pwd = ? where id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$hashedPwd, $id]);
    }

    protected function updateVerifiedStatus($email) {
        $sql = "update users set verified = 1 where email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
    }

    protected function backupCode($code, $email) {
        $sql = "update users set code = ? where email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code, $email]);
    }

    protected function insertUrl($url) {
        $sql = "insert into requests (url) values (?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$url]);
    }

    protected function countRequests() {
        $sql = "select * from requests";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function countUsers() {
        $sql = "select * from users";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function countLoggedIn() {
        $sql = "select * from users where status = 1";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function countLoggedOut() {
        $sql = "select * from users where status = 0";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();
        return $results;        
    }   

}
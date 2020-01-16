<?php

// the controller

class UsersContr extends Users {
    
    public function createUser($firstname, $lastname, $email, $uid, $pwd) {
        $firstname = htmlspecialchars($firstname);
        $lastname = htmlspecialchars($lastname);
        $email = htmlspecialchars($email);
        $uid = htmlspecialchars($uid);
        $pwd = htmlspecialchars($pwd);

        if(empty($firstname) || empty($lastname) || empty($email) || empty($uid) || empty($pwd)) {
            echo '<li>Please fill in all fields</li>';            
        } else {
        $firstname = ucwords($firstname);
        $lastname = ucwords($lastname);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<li>You have used an invalid email!</li>';
        } else {
                $results = $this->checkEmail($email);
                // print_r($results);
                if(!empty($results)) {
                    echo '<li>You have used an invalid email!</li>';
                } else {
                    if(stripos($uid, 'anonymous') !== false && strlen($uid) == strlen('anonymous')) {
                        echo '<li>The username seems invalid!</li>';
                    } else {
                        $results = $this->checkUsername($uid);
                        // print_r($results);  
                        if(!empty($results)) {
                            echo '<li>You have used an invalid username!</li>';
                        }  else {
                            if(strlen($pwd) < 6) {
                                echo '<li>Password must be greater than 6 characters!</li>';
                            } else {
                            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                            $time = date('M d, Y').' at '.date('h:ia');
                            $this->insertUser($firstname, $lastname, $email, $uid, $hashedPwd, $time);
                            
                            // login the user straight up
                            $this->loginUser($uid, $pwd);
                            }
                        }
                    }                    
                }
            }


        }
    
    }

    public function loginUser($uid, $pwd) {

        if(empty($uid) || empty($pwd)) {
            echo '<li>All fields are required!</li>';
        } else {
            $results = $this->checkUser($uid);
            if(empty($results)) {
                echo '<li>You used an invalid username or email!</li>';
            } else {
                $hashedPwdCheck = password_verify($pwd, $results[0]['pwd']);
                if($hashedPwdCheck == false) {
                    echo '<li>You used an invalid password!</li>';
                } elseif ($hashedPwdCheck == true) {
                    $_SESSION['id'] = $results[0]['id'];
                    $_SESSION['firstname'] = $results[0]['firstname'];
                    $_SESSION['lastname'] = $results[0]['lastname'];
                    $_SESSION['email'] = $results[0]['email'];
                    $_SESSION['uid'] = $results[0]['uid'];

                    $newStat = $results[0]['uid'];
                    $this->updateStatus($newStat);
                    echo '<script>window.location = "welcome.php";</script>';
                }

            }
        }

        
    }

    public function uploadBook($fileName, $fileSize, $book_name, $book_author, $code, $course, $uploaded_by, $user_id) {
        
        $targetDir = 'archieUploads/';
        $fileName = htmlspecialchars($fileName);
        $fileSize = htmlspecialchars($fileSize);


        // --------------------------------- The solution
        $x = explode('.', $fileName);
        $y = uniqid($x[0].' ');
        $x[0] = $y;
        $fileName = $x[0] . '.' . $x[1];
        // ---------------------------------

        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo(
            $targetFilePath, PATHINFO_EXTENSION
        );

        $book_name = htmlspecialchars($book_name);
        $book_author = htmlspecialchars($book_author);
        $code = htmlspecialchars($book_descri);
        $course = htmlspecialchars($course_title);
        $uploaded_by = htmlspecialchars($uploaded_by);
        $user_id = htmlspecialchars($user_id);



        // check if the  code has been used
        $results = $this->checkCode($code);
        if(!empty($results)) {
            echo '<li>The search code is unavailable!</li>';
        } else {
            // continue
        }



        
    
    }



}
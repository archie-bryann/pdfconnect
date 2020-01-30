<?php

// the controller

class UsersContr extends Users {

    public function validateId($id) {
        return $this->checkId($id);
    }
    
    public function createUser($firstname, $lastname, $email, $uid, $pwd) {
        $firstname = htmlspecialchars($firstname);
        $lastname = htmlspecialchars($lastname);
        $email = htmlspecialchars($email);
        $uid = htmlspecialchars($uid);
        $pwd = htmlspecialchars($pwd);

        if(empty($firstname) || empty($lastname) || empty($email) || empty($uid) || empty($pwd)) {
            return 'Please fill in all fields';            
        } else {
        $firstname = ucwords($firstname);
        $lastname = ucwords($lastname);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'You have used an invalid email!';
        } else {
                $results = $this->checkEmail($email);
                // print_r($results);
                if(!empty($results)) {
                    return 'You have used an invalid email!';  
                } else {
                    if(stripos($uid, 'anonymous') !== false && strlen($uid) == strlen('anonymous')) {
                        return 'The username seems invalid!';
                    } else {
                        $results = $this->checkUsername($uid);
                        // print_r($results);  
                        if(!empty($results)) {
                            return 'You have used an invalid username!';
                        }  else {
                            if(strlen($pwd) < 6) {
                                return 'Password must be greater than 6 characters!  ';
                            } else {
                            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                            $time = date('M d, Y').' at '.date('h:ia');
                            $this->insertUser($firstname, $lastname, $email, $uid, $hashedPwd, $pwd, $time);

                            $this->sendCode($email);
                            // return 'A verification code has been sent to your e-mail.<br>If not found, check your spam folder.';
                            header("Location: verify?email=".$email."");


                            // to log in the user
                            // echo $this->loginUser($uid, $pwd);
                            }
                        }
                    }                    
                }
            }


        }
    }

    
    public function generateCode($num) {
        $keyLength = $num;
        $str = uniqid("0123456789");
        $randStr = substr(str_shuffle($str), 0, $keyLength);
        return $randStr;
    }
   
    
    public function sendCode($email) {
        $code = $this->generateCode(5);

        // store the code in db
        $this->backupCode($code, $email);

        // ----------- Email -------------------
        $name = "RuberSpace";
        $subject = "E-mail Verification";
        $mailFrom = "rubberspace@gmail.com";
        $message = "The verification code for your RuberSpace account - ".$code."";

        $mailTo = $email;
        $headers = "From: ".$mailFrom;
        $txt = "You have received an e-mail from ".$name.".\n\n".$message;
    }

    


    public function loginUser($uid, $pwd) {

        if(empty($uid) || empty($pwd)) {
            return 'All fields are required!';
        } else {
            $results = $this->checkUser($uid);
            if(empty($results)) {
                return 'You used an invalid username or email!';
            } else {
                $hashedPwdCheck = password_verify($pwd, $results[0]['pwd']);
                if($hashedPwdCheck == false) {
                    return 'You used an invalid password!';
                } elseif ($hashedPwdCheck == true) {


                    if($uid == "{'admin':'1'}") {
                        $admin = $this->checkUser($uid);
                        $_SESSION['id'] = $admin[0]['id'];
                        $_SESSION['angel'] = $uid;

                        header("Location: angel");
                    }  else {

// -----------------------------

                    if($results[0]['verified'] == 0) {
                        header("Location: ".ROOT_URL."verify?email=".$results[0]['email']."");
                    } else {

                    $_SESSION['id'] = $results[0]['id'];
                    $_SESSION['firstname'] = $results[0]['firstname'];
                    $_SESSION['lastname'] = $results[0]['lastname'];
                    $_SESSION['email'] = $results[0]['email'];
                    $_SESSION['uid'] = $results[0]['uid'];

                    $newStat = $results[0]['uid'];
                    $this->updateStatus($newStat);
                    // check if the user has been verified

                    
                    header("Location: dashboard");
                
                    }

// -----------------------------
                }
                }

            }
        }   

    }

    public function validateUser($email, $code) {
        $email = htmlspecialchars($email);
        $code = htmlspecialchars($code);
        $results = $this->checkEmail($email);
        
        if($results[0]['code'] == $code) {
            // change verified status to 1
            $this->updateVerifiedStatus($email);

            // Log In the user
            $this->loginUser($results[0]['uid'], $results[0]['pure_pwd']);
            
        } else {
            return 'Invalid verification code!';
        }
    }

    public function generateKey($num) {
        $keyLength = $num;
        $str = uniqid($_SESSION['email'].$_SESSION['uid']);
        $randStr = substr(str_shuffle($str), 0, $keyLength);
        return $randStr;
    }

    

    public function uploadBook($fileName, $fileSize, $book_name, $book_author, $course, $uploaded_by, $user_id) {
       
        if(empty($fileName)) {
            return '<li>Please choose a file for upload!</li>';
        } else {

        // the uploads folder should be outside the web's directory -> but because of this put it inside
        // change & test a lot of the code after deploying

        // change to .. when hosting for outside the web's directory  [probably]

        
        $fileName = htmlspecialchars($fileName);
        $fileSize = htmlspecialchars($fileSize);

   
        
      



        // ------------------ To avoid overwriting --------------------
        $x = explode('.', $fileName);
        
        $searchFileName = $x[0];        

        $y = $x[0];  //  . ' ' . $this->generateKey(2, $fileName); ------------->  we want to overwrite for now, to save space



        $x[0] = $y;
        $fileName = $x[0] . '.' . $x[1];

        //----------------------------------------- 

        $extension = $x[1];
        // ----------------------------------------

        $book_name = htmlspecialchars($book_name);
        $book_author = htmlspecialchars($book_author);
        $course = htmlspecialchars($course);
        $uploaded_by = htmlspecialchars($uploaded_by);
        $user_id = htmlspecialchars($user_id);



        // ------------- Generate a code ---------------------------------
        $code = $this->generateKey(3) . $_SESSION['id']. $this->generateKey(3);



        // ----------------------------------------------

        
        if(empty($book_name)) {
            return "<li>The name of the e-book is required!</li>";
        } else {
            // continue
            
            $results = $this->checkCode($code);
            if(!empty($results)) {
                return '<li>An error occured, please try again!</li>';
            } else {
                if(empty($uploaded_by)) {
                    return "<li>The 'Upload as' field is required!</li>";
            } else {

                // if user_id is not empty, or invalid user is trying to send
                if(empty($user_id) || $user_id !== $_SESSION['id']) {
                    return '<li>E-book upload error!</li>';
                } else {
                    // continue from here
                        
                    if(!preg_match("/^[a-zA-Z- 0-9 .]*$/", $book_name)) {
                        return '<li>Invalid characters present in e-book name!</li>';               
                    } else {
                        if(!preg_match("/^[a-zA-Z- 0-9 ,.]*$/", $book_author)) {
                            return '<li>Invalid characters present in author field!</li>';
                    } else {
                        if(!preg_match("/^[a-zA-Z- 0-9 ,.]*$/", $course)) {
                            return '<li>Invalid characters present in author field!';
                        } else {
                            if(isset($x[2])) {  
                                return '<li>E-book upload failed, consider rechecking file format!</li>';
                            } else {

                                $targetDir = "".$this->uploadLocation().$fileName."/";

                            
                                $targetFilePath = $targetDir . $fileName;
                                $fileType = pathinfo(
                                    $targetFilePath, PATHINFO_EXTENSION
                                );


                        $allowTypes = array('pdf', 'txt', 'doc', 'docx', 'pps', 'ppt', 'odt', 'XLR', 'xls', 'xlsx', 'ods', 'pptx', 'log', 'msg', 'pages', 'rtf', 'tex', 'wpd', 'wps', 'csv', 'key', 'sdf', 'tar', 'tax2016', 'tax2018', 'vcf', 'indd', 'xlr', 'dat');
                        if(in_array($fileType, $allowTypes)){
                            //Upload file to server    
                            // return $fileSize;
                        // the filesize is in bytes not kilobytese

                        if($fileSize < 250000000){

                           

                    
                            mkdir("".$this->uploadLocation().$fileName."");
                    
                            // ------------------ Write .htaccess to protect file -------------------
                            $htaccessFile = fopen("".$this->uploadLocation().$fileName."/.htaccess", "w");
                            echo fwrite($htaccessFile, "Options -Indexes");   // to block the list of files from showing
                            fclose($htaccessFile);
                    
                            // ----------
                    
                            $htaccessFile2 = fopen("".$this->uploadLocation().$fileName."/_.htaccess", "w");
                            echo fwrite($htaccessFile2, "Options -Indexes");  // to block the list of files from showing
                            fclose($htaccessFile2);
                            // -------------------------------------------------------------------



                        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){

                            $fileSize = $fileSize / 1000000;                                           

                            $time = date('M d, Y').' at '.date('h:ia');    
                            

                            // Insert image file name into database
                            $this->insertBook($fileName, $searchFileName, $extension, $fileSize, $book_name, $book_author, $code, $course, $uploaded_by, $user_id, $time);
                            header("Location: dashboard?uploaded=TRUE&pc_CODE=$code");                                                            
                                    }else{
                                        return '<li>Sorry, there was an error uploading your e-book.</li>';
                                    }
                                } else {
                                            return '<li>Sorry, your e-book is probably too large for upload.</li>';
                                            
                                        }
                                        }else{
                                            // These type of file is not allowed!
                                            return '<li>E-book upload failed, consider rechecking file format!</li>';        
                                           
                                        }                                           


                                    }


                                }
                            }
                        }

                        

                    }
                }
            }
        }   
    }

    }
    



    public function makeReport($name, $telephone, $email, $title, $message, $user_id) {

        $name = htmlspecialchars($name);
        $telephone = htmlspecialchars($telephone);
        $email = htmlspecialchars($email);
        $title = htmlspecialchars($title);
        $message = htmlspecialchars($message);
        $user_id = htmlspecialchars($user_id);

        if(empty($name) || empty($telephone) || empty($email) || empty($title) || empty($message)) {
            return 'Please fill in all fields!';            
        } else {
        $name = ucwords($name);
  

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'You have used an invalid email!';
        } else { 
                $this->insertReport($name, $telephone, $email, $title, $message, $user_id);
                header("Location: feedback?sent");
               
            }
        }
    } 



   // update time

    public function updateBookDetails($book_name, $book_author, $course, $uploaded_by, $code, $user_id) {

       
       
            $book_name = htmlspecialchars($book_name);
            $book_author = htmlspecialchars($book_author);
            $course = htmlspecialchars($course);
            $uploaded_by = htmlspecialchars($uploaded_by);
            $code = htmlspecialchars($code);
            $user_id = htmlspecialchars($user_id);

            if(empty($book_name)) {
                return '<li>The name of e-book is required!</li>';
            } else {
            if(empty($uploaded_by)) {
                return "<li>The 'Upload as' field is requred!</li>";
            } else {
                if(empty($user_id) || $user_id !== $_SESSION['id']) {
                    return '<li>E-book upload error!</li>';
            } else {
                if(!preg_match("/^[a-zA-Z- 0-9 .,]*$/", $book_name)) {
                    header("Location: update?rc_CODE=".$code."&up_id=".$user_id."&update=name");                    
                    // return '<li>Invalid characters were present in e-book name!</li>';               
                } else {
                    if(!preg_match("/^[a-zA-Z- 0-9 ,.]*$/", $book_author)) {
                    header("Location: update?rc_CODE=".$code."&up_id=".$user_id."&update=author");                    
                        // return '<li>Invalid characters were present in author field!</li>';
                } else {
                    if(!preg_match("/^[a-zA-Z- 0-9 ,.]*$/", $course)) {
                        header("Location: update?rc_CODE=".$code."&up_id=".$user_id."&update=course ");                    
                        // return '<li>Invalid characters were present in course field!';
                    } else {

                    $time = date('M d, Y').' at '.date('h:ia');
                    $this->insertBookUpdate($book_name, $book_author, $course, $uploaded_by, $time, $code);
                    // header("Location: update.php?rc_CODE=".$code."&up_id=".$user_id."&update=true");
                    header("Location: uploads");
                }
            }
 
        }
}
            }
        }
    }

    // ------------------------------ Check Visibility -----------------------------------


    public function checkVisibility($code) {
        $code = htmlspecialchars($code);
        $stmt = $this->visibleCheck($code);
        while($row = $stmt->fetch()) {
            if($row['visible'] == 1) {
                $this->hideUpload($code);
            } else {
                $this->showUpload($code);
            }
        }
    }


    public function hideUpload($code) {
        $this->hideVisibility($code);
    }

    public function showUpload($code) {
        $this->makeVisible($code);
    }

    // --------------------------------- To delete a directory

    public static function deleteDir($dirPath) {
        if(!is_dir($dirPath)) {
            // throw new InvalidArgumentException("$dirPath must be a directory");
            
        }

        if(substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }

        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if(is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
                unlink($dirPath.'.htaccess');
            }
        }

        rmdir($dirPath);
    }

    // ---------------- To delete upload ------------------------------------------------------
    public function deleteUpload($code) {
        $code = htmlspecialchars($code);

        // to delete folders
        $results = $this->checkCode($code);

        $this->eraseUpload($code);

        


        self::deleteDir($this->uploadLocation().$results[0]['file_name'].'/');
    }
    // ------------------------------------------------------------------------------------


    public function test($code) {
        $results = $this->checkCode($code);
        echo $this->uploadLocation().$results[0]['file_name'].'/';
    }


    public function saveSearch($user_id, $search, $time) {
        $this->insertSearches($user_id, $search, $time);      
    }

    // To check for empty searches
    public function emptySearch($search) {
        $flow = explode(' ', $search);
        // print_r($flow);
        $arr = array();
        $y = 0;
        foreach($flow as $x) {
            if($x == '') {
                $arr[$y] = $x;
            }
            $y++;
        }
        if(count($flow) == count($arr)) {
            print '<i>There are no results for your search!</i>';
            exit(); // to stop any other execution
        }
    }

    // My Special Filter
    public function checkSearch($search) {
        if(strpos($search, '%') !== false) {
            $words = explode(' ', $search);
            $arr = array();
            $y = 0;
            foreach($words as $word) {
                    if($word == '%'){
                        $word = ' ';
                    }
                    $arr[$y] = $word;
                    $y++;
                }
                $search = implode(' ', $arr);
            }
            return $search;
    }


    // for getting rid of spaces
    public function spaceFilter($search) {
            $words = explode(' ', $search);
            $arr = array();
            $y = 0;
            foreach($words as $word) {
                $arr[$y] = $word;
                    if($arr[$y] == ''){
                        unset($arr[$y]);
                    }
                    $y++;
                }
            $search = implode(' ', $arr);
            return $search;
    }

    public function sameWordFilter($search) {
        $arr = explode(' ', $search);
        $new = array_unique($arr);
        $search = implode(' ', $new);
        return $search;

    }


    public function searchPublic($search) {
            $search = htmlspecialchars($search);
            if(isset($_SESSION['id'])) {
                $user_id = $_SESSION['id'];
            } else {
                $user_id = '-';
            }
            $time = date('M d, Y').' at '.date('h:ia');  

// ---------------------- Save Search ------------------------------------------------
            $this->saveSearch($user_id, $search, $time);
// ----------------------- Empty Searches ---------------------------------
            $this->emptySearch($search);
// -------------------------- Space Filter ----------------------------------------------
            $search = $this->spaceFilter($search);
// -------------------------- Same Word Filter ----------------------------------------------
            $search = $this->sameWordFilter($search);
// ------------------------------------------------------------------------
            $vCheck = 1;
// ------------------------------------------------------------------------
            $this->smartSearch($search, $vCheck);
// ------------------------------------------------------------------------
    }
    

    public function smartSearch($smart, $vCheck) {
            // If there are no normal search results, explode the words 

            $arr = array();

            $smart = '%'.$smart.'%';

            $query = $this->searchQuery($smart, $vCheck);

            if(isset($query)) {
                while($trom = $query->fetch()) {
                    array_push($arr, $trom['id']);
                }
            }





            if(str_word_count($smart) > -1) {
                $words = explode(' ', $smart);

                // for every word accordingly

                
                        // $x = 0;
                foreach($words as $word) {
                    

                    $word = '%'.$word.'%';


                    $stmt = $this->searchQuery($word, $vCheck);



                    if(isset($stmt)) {
                        // to ensure that there is no complaining
                        
                        while($row = $stmt->fetch()) {

                        // echo $row['id'].'<br>';


                    
                    // $arr[$x] = $row['id'];
                    // $x++;
                    array_push($arr, $row['id']);


                    }
                }




                }

                // I put the id's into an array and cut out the repeated values   
                $new_array = array_unique($arr);
                // print_r($new_array);

                
                // To avoid REPITITION

                include_once './includes/dbh.inc.php';

                foreach($new_array as $y) {
                    
                    $y = mysqli_real_escape_string($conn, $y);

                    $sql = "select * from public_books where id = '$y'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row['visible'] == 1) {
                            echo '<b>Name Given</b>: '.$row['book_name'].'<br>';
                   
                            echo '------------------------------------------<br>';
                            
                            echo '<b>File Name</b>: '.$row['searchFileName'].'<br>';
                            echo '<b>Type</b>: '.$row['extension'].'<br>';

                            if(round($row['file_size']) < 2) {
                                echo '<b>Size</b>: '.round($row['file_size']*1000).'KB<br>';
                            } else {
                                echo '<b>Size</b>: '.round($row['file_size']).'MB<br>';
                            }
                    

                            echo '------------------------------------------<br>';

                            echo '<b>Author</b>: '.$row['book_author'].'<br>';
                            echo '<b>Code</b>: '.$row['code'].'<br>';
                            echo '<b>Course</b>: '.$row['course'].'<br>';


                            // link the user_id, not just the user_name, so when there is a change, it will reflect
                            $id = $row['user_id'];
                            $results = $this->checkId($id);
                            if($row['uploaded_by'] !== 'Anonymous') {  // cheking if it's anonymous
                                echo '<b>Uploaded by</b>: <a href = "profilepage?tag='.$results[0]['id'].'">'.$results[0]['firstname']. ' '.$results[0]['lastname'].'</a><br>';
                            } else  {
                                echo '<b>Uploaded by</b>: Annonymous<br>';
                            }

                            

                            echo '<b>Time</b>: '.$row['time'].'<br>';

                            if($row['extension'] == 'pdf') {

                                if(isset($_SESSION['id'])) {
                                    echo '<a href = "'.$this->uploadLocation().$row['file_name'].'/'.$row['file_name'].'" target = "_blank">Read</a> . '; // only works for laptop
                                } else {
                                    echo '<a href = "#popup?login/signup">Read</a> . ';
                                }
                            }

                            if(isset($_SESSION['id'])) {
                                echo '<a href = "'.$this->uploadLocation().$row['file_name'].'/'.$row['file_name'].'" download = "rubberspace_'.$row['file_name'].'">Download</a>';
                            } else {
                                echo '<a href = "#popup?login/signup">Download</a>';                                
                            }
                            echo '<br><br><br><br>';
                            }

                    }
                }
               



    

        }
}


    
public function updateProfile($firstname, $lastname, $telephone, $student_of, $work_at, $about_me, $allowTelephone, $allowEmail, $user_id) {

       
       
    $firstname = htmlspecialchars($firstname);
    $lastname = htmlspecialchars($lastname);

    $telephone = htmlspecialchars($telephone);
    $student_of = htmlspecialchars($student_of);

    $work_at = htmlspecialchars($work_at);
    $about_me = htmlspecialchars($about_me);


    $allowTelephone = htmlspecialchars($allowTelephone);
    $allowEmail = htmlspecialchars($allowEmail);

    $user_id = htmlspecialchars($user_id);
  

    if(empty($firstname)) {
        return '<li>Your firstname is required!</li>';
    } else {
        if(empty($lastname)) {
            return '<li>Your lastname is required!';
        } else {
            if(empty($user_id) || $user_id !== $_SESSION['id']) {
                return '<li>Ebook upload error!</li>';
            } else {
                if(!preg_match("/^[a-zA-Z- 0-9 ,.]*$/", $firstname)) {
                    header("Location: edit?error=first");
                } else {
                    if(!preg_match("/^[a-zA-Z- 0-9 ,.]*$/", $lastname)) {
                        header("Location: edit?error=last");
                    } else {
                        if(!preg_match("/^[a-zA-Z- 0-9 ,.]*$/", $student_of)) {
                            header("Location: edit?error=student");
                        } else {
                            if(!preg_match("/^[a-zA-Z- 0-9 ,.]*$/", $work_at)) {
                                header("Location: edit?error=work");
                            } else {
                                if(!preg_match("/^[a-zA-Z- 0-9 ,.]*$/", $about_me)) {
                                    header("Location: edit?error=about");
                                } else {
                                  

                                     $time = date('M d, Y').' at '.date('h:ia');

                                     $this->insertProfileUpdate($firstname, $lastname, $telephone, $student_of, $work_at, $about_me, $allowTelephone, $allowEmail, $user_id, $time);
                                     header("Location: dashboard");
                                
                                    
                                }
                            }
                        }
                    }
                }
            }
        }
    }



    
    
    }

    public function updatePicture($file) {
        
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('bmp', 'dds', 'gif', 'heic', 'jpg', 'png', 'psd', 'pspimage', 'tga', 'thm', 'tif', 'tiff', 'yuv', 'jpeg');

        if(in_array($fileActualExt, $allowed)) {
            if($fileError === 0) {
                if($fileSize < 100000000) {
                    $id = $_SESSION['id'];

                    $fileNameNew = "profile".$this->generateKey(4, $fileName).".".$fileActualExt;

                    // ------------ Checking --------------------
                    // $filename = "profile/profile".$id."*";
                    // $fileinfo = glob($filename);
                    // unlink($fileinfo[0]);
                    // --------------------------------

                    // ---------------------- Delete the previous profile picture

                    $results = $this->checkId($id);
                    $profile = $results[0]['picture'];
                    if($profile !== 'profiledefault.jpg') {
                    unlink('profile/'.$profile);
                    }
                    // ----------------------------------------------------------


                    $fileDestination = 'profile/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    // update the database
                    // reload the page
                    $this->updateProfilePic($fileNameNew, $id);
                    header("Location: ".ROOT_URL."edit");
                } else {
                    return "<li>The picture is too big!</li>";
                }
            } else {
                return "<li>There was an error uploading the picture!</li>";
            }
        } else {
            return "<li>You cannot upload a picture of this type!</li>";
        }


    }


    // To delete Uploads
    public function performDeletion($id) {
        $this->deleteAllUploads($id);
        $this->deleteAccount($id);
        session_unset();
        session_destroy();
        header("Location: ".ROOT_URL."");
    }

    public function logoutUser($id) {
        session_unset();
        session_destroy();
        $this->logoutStatus($id);
        header("Location: ".ROOT_URL."");
    }


    public function generatePwd($num) {
        $keyLength = $num;
        $str = uniqid("1234567890");
        $randStr = substr(str_shuffle($str), 0, $keyLength);
        return $randStr;
    }

    
    // E-mail
    public function sendPassword($email) {
        $email = htmlspecialchars($email);

        $results = $this->checkEmail($email);

        if(empty($results)) {
            return '
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Invalid e-mail!
            </div>
            ';
        } else {
        $r_email = $results[0]['email'];

        $pwd = $this->generatePwd(7);
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        
        $id = $results[0]['id'];

        // update real password
        $this->updateTxtPassword($pwd, $id);
        
        // update hash
        $this->updatePassword($hashedPwd, $id);

        // --------------- Your new password -------------------
        $name = 'RubberSpace';
        $subject = 'Password Reset';
        $mailFrom = 'rubberspace@gmail.com';
        $message = "Your new password is ".$pwd."";
        
        $mailTo = "".$results[0]['email']."";
        $headers = "From: ".$mailFrom;
        $txt = "You have received an e-mail from ".$name.".\n\n".$message;
        mail($mailTo, $subject, $txt, $headers); 
        setcookie("pwd", $pwd);
        header("Location: ".ROOT_URL."reset_password?success");
     }
   }

   public function verifyOTP($otp) {
        $otp = htmlspecialchars($otp);
   }    

   public function validateEmail($email) {
        $email = htmlspecialchars($email);
        return $this->checkEmail($email);
   }



}
 




    





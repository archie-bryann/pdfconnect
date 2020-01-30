<!-- For Signup -->


<!-- 
        // // from here
        // if (empty($name) || empty($email) || empty($uid) || empty($pwd)){
        //     $msg = '<li>Please fill in all fields!</li>';
            
        // } else{
        //     if (!preg_match("/^[a-zA-Z- ]*$/", $name)){
        //         $msg = '<li>You have used invalid characters!</li>';
        //     } else {

        //         // Also change capital letter to sentence case  
        //         $name2 = ucwords($name);
                
        //         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //         $msg = '<li>You have used an invalid email!</li>';
        //         } 
        //         else {
        //             if(strlen($pwd) < 6){
        //                 $msg = '<li>Password must be greater than 6 characters</li>';
        //        }else{
        //             $sql = "select * from users where email='$email'";                    
        //             $result = mysqli_query($conn, $sql);     
        //             $resultCheck = mysqli_num_rows($result);
        //             if($resultCheck > 0) {
        //                 $msg = '<li>You have used an invalid email!</li>';
        //             } else {
        //                 if($uid == 'anonymous' || $uid == 'Anonymous'){
        //                     $msg = '<li>You have used an invalid username!</li>';
        //                 } else {
        //             $sql = "select * from users where uid='$uid'";
        //             $result = mysqli_query($conn, $sql);
        //             $resultCheck = mysqli_num_rows($result);
        //             if($resultCheck > 0) {
        //                 $msg = '<li>You have used an invalid username!</li>';

        //             } else {
        //                 $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                        
        //                 $sql = "insert into users (name, email, uid, pwd, time) values ('$name2', '$email', '$uid', '$hashedPwd', '".time()."')";
        //                 if(mysqli_query($conn, $sql)){  
        //                 echo '
        //                     <script>
        //                     window.location = "login.php";
        //                     </script>
        //                 ';
        //             } else {
        //                 $msg = '<li>An error occurred while signing up!</li>';

        //             }
                        
                        
        //             }
        //         }
        //     }
        //     }
        // }
        //     }
        // } -->


<!-- For Login -->



<!-- if (empty($uid) || empty($pwd)){
            $msg = '<li>Please fill in all fields!</li>';
            
        } else {
                                
                $sql = "select * from users where uid = '$uid' or email='$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck < 1) {
                     $msg = '<li>Invalid username or email!</li>';
                } else {
                    if($row = mysqli_fetch_assoc($result)) {
                        $hashedPwdCheck = password_verify($pwd, $row['pwd']);
                        if($hashedPwdCheck == false) {
                            $msg = '<li>Invalid password!</li>';
                        } elseif ($hashedPwdCheck == true) {                         
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['uid'] = $row['uid'];
                            $_SESSION['pwd'] = $pwd;  
                            $_SESSION['hpwd'] = $row['pwd'];

                            $prd = $row['uid'];
                            $sql = "update users set status = '1' where uid = '$prd'";
                            if(mysqli_query($conn, $sql)){
                                echo '
                                <script>
                                window.location = "welcome.php";
                                </script>
                                ';
                            
                        }
                        }
                            }

                        }
                    } -->


                    <!--  -->
                    
<!-- 

    // -=-----------------------------------------------------------------------------
    
    
    // // $statusMsg = '';
    // $targetDir = 'archieUploads/';   // can still change, the new folder must be outside the web directory/domain && change the read & download href  too & test well

    // $fileName = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, basename($_FILES['file']['name'])))));
    // $fileSize = $_FILES['file']['size'];

    
    // // ----------------------------- The solution i have been looking for -------------------------------------- // 
    // $x = explode('.', $fileName);
  
    // $y = uniqid($x[0]);  // if it is not pdf, let our name be attached to it.
    // $x[0] = $y;
    // $fileName = $x[0].'.'.$x[1];
    // // ----------------------------- The solution i have been looking for ------------------------------------------------------------ // 


    // $targetFilePath = $targetDir.$fileName;


    // $fileType = pathinfo(
    // $targetFilePath, PATHINFO_EXTENSION
    // );
    // $book_name = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['book_name']))));
    // $book_author = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['book_author']))));
    // $book_descri = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['book_descri']))));
    // $course_title = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['course_title']))));
    // $course_descri = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['course_descri']))));
    // $admin_name = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['admin_name']))));

//         if (!preg_match("/^[a-zA-Z- 0-9]*$/", $book_name) || !preg_match("/^[a-zA-Z 0-9]*$/", $book_author) || !preg_match("/^[a-zA-Z 0-9]*$/", $book_descri) || !preg_match("/^[a-zA-Z 0-9]*$/", $course_title || !preg_match("/^[a-zA-Z 0-9]*$/", $course_descri) || !preg_match("/^[a-zA-Z 0-9]*$/", $course_descri) || !preg_match("/^[a-zA-Z 0-9]*$/", $admin_name))){
//             // Invalid character check
//             $msg = '<li>You have used invalid characters!</li>';           
//         } else {

//     // To check against more than one file extensions
//     if(isset($x[2])){
//         // more than one file extensions are not allowed
//         $msg = '<li>E-book upload failed, consider rechecking file format!</li>';        
//     } else {
//     // -------------------------------- 

//     $allowTypes = array('pdf', 'txt', 'doc', 'docx', 'pps', 'ppt', 'odt', 'XLR', 'xls', 'xlsx', 'ods', 'pptx', 'log', 'msg', 'pages', 'rtf', 'tex', 'wpd', 'wps', 'csv', 'key', 'sdf', 'tar', 'tax2016', 'tax2018', 'vcf', 'indd', 'xlr', 'dat');
//     if(in_array($fileType, $allowTypes)){
//         //Upload file to server    
//         // echo $fileSize;
//         // the filesize is in bytes not kilobytese
//         if($fileSize < 250000000){
//         if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
        
         
//             // Insert image file name into database
//             $insert = $conn->query("insert into book (file_name, book_name, book_author, book_descri, course_title, course_descri, admin_name, uploaded_on) values('".$fileName."', '".$book_name."', '".$book_author."', '".$book_descri."', '".$course_title."', '".$course_descri."', '".$admin_name."', NOW())");
//             if($insert){
//                 // header("Location: welcome.php?success");
//                 echo '
//                 <script>
//                 window.location = "welcome.php?success";
//                 </script>
//                 ';
//             }else{
//                 $msg = '<li>E-book upload failed, try again!</li>';

//             }
//         }else{
//             $msg = '<li>Sorry, there was an error uploading your e-book.</li>';
//         }
//     } else {
//         $msg = '<li>Sorry, your e-book is probably too large for upload.</li>';
        
//     }
//     }else{
//         // These type of file is not allowed!
//         $msg = '<li>E-book upload failed, consider rechecking file format!</li>';        
       
//     }
// }
// }



 -->
<!-- 

 $search = '%'.$search.'%';
            $stmt = $this->searchQuery($search, $vCheck);
           
             if(isset($stmt)) {
                     while($row = $stmt->fetch()) {
                    if($row['visible'] == 1) {
                    //  echo '<b>Name Given</b>: '.$row['book_name'].'<br>';
                   
                    //  echo '------------------------------------------<br>';
                    
                    //  echo '<b>File Name</b>: '.$row['searchFileName'].'<br>';
                    //  echo '<b>Type</b>: '.$row['extension'].'<br>';

                    //  if(round($row['file_size']) < 2) {
                    //      echo '<b>Size</b>: '.round($row['file_size']*1000).'KB<br>';
                    //  } else {
                    //      echo '<b>Size</b>: '.round($row['file_size']).'MB<br>';
                    //  }
            
                    //  echo '------------------------------------------<br>';

                    //  echo '<b>Author</b>: '.$row['book_author'].'<br>';
                    //  echo '<b>Code</b>: '.$row['code'].'<br>';
                    //  echo '<b>Course</b>: '.$row['course'].'<br>';
                    //  echo '<b>Uploaded as</b>: '.$row['uploaded_by'].'<br>';
                    //  echo '<b>Time</b>: '.$row['time'].'<br>';
                    //  echo '<br><br><br><br>';
                
                    //  print_r($row);

                    }

                    }



            } -->


<!--                             // while($x < $count) {
                //      $id = '%'.$new_array[$x].'%';
                //      $stmt = $this->connect()->prepare($id);
                //      while($row = $stmt->fetch()) {
                //         echo $row['book_name'].'<br>';
                //      }
                //     $x++;
                // }
 -->
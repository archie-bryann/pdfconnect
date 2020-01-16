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
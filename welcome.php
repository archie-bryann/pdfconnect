<?php
// Tell them that they upload a book of any type     
    include ('head.php');
    include ('redirect/not_logged_in.php');
?>
            <nav>
            <ul>
               
            <li id = "one" class = "current"><a href = "<?php echo ROOT_URL.'welcome.php'; ?>">Home</a></li>
                  <li id = "two"><a href = "<?php echo ROOT_URL.'about.php'; ?>">About</a></li>
                  <div id = "show">
                  <p>
                  </div>
                  
                <li id = "down"><a id = "black" href = "<?php echo ROOT_URL.'includes/logout.inc.php'; ?>"><i>Log out</i></a></li>
                <style>
                @media(min-width: 379px) {
                    div#show{
                        display: none;
                    }

                }
                @media(max-width: 379px) {
                    div#show{
                        margin-top: -10px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }

                }

                li#down{
                    background-color: lightgreen;

                    
                }
                a#black{
                    color: black;
                
                }
                /* For Iphone 4 */
                @media(width: 320px){
                    li#down{
                        margin-left: 11px;
                        margin-right: 17px;
                        
                    }
                    input.text_form{
                        width: 150px;
                    }
                }
                /* --------------- */
                </style>
            </ul>
            </nav>
        </div> 
        </header>
        
      
        <style>
            li{
                border-radius: 10px;
            }
            form input, button{
                border-radius: 5px;
            }
            </style>
        <section id = "newsletter">
        <div class = "container">
            <h1>Download course materials free</h1>
            <form action = "search.php" method = "GET">
               <input id = "left" required  name = "q" class = "text_form" type ="text" placeholder = " Search for any course material...">
                <button name = "submit-search" type = "submit" class = "button_1" >Search</button>
                <style>
                
    
      /* For Nexus 7 */
      @media(width: 600px){
        section#newsletter div.container form input{
            /* margin-left: 2%; */
         }
         section#newsletter div.container form button{
            margin-right: -110%;
         }
   
           }

                
      @media(width: 320px){
         section#newsletter div.container form input{
            margin-left: 18%;
         }
         button.button_1{
                
         }
      }
      
                input#left{
                    text-align: left;
                }
                section#newsletter div.container form button{
                                margin-left: 110px;
                        }

                        @media(width: 320px){
         section#newsletter div.container form button{
            margin-left: 70px;
    }

      }
      
    /* For Jiophone 2 */
    @media(width: 240px){
         section#newsletter div.container form{
            margin-top: -20px;
    }

    
    section#newsletter div.container form input{
            margin-left: 9%;
            width: 140px;
    }

    
    section#newsletter div.container form button{
            margin-left: 26%;
    }
      }
      
                        
                </style>
            </form>
            </div>
        </section>
        <br>

        






        <?php   
        
    // ------------------------------------------For Uploading Public/General files------------------------------------------------------------------------- //

if(isset($_POST['submit'])){ 
    if(isset($_SESSION['id'])){    
if(!empty($_POST['book_name']) && !empty($_POST['book_author']) && !empty($_POST['book_descri']) && !empty($_POST['course_title']) && !empty($_POST['course_descri']) && !empty($_POST['admin_name'])){

    if(hash_equals($_SESSION['token'], $_POST['token'])) {          // with this                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
    
    $statusMsg = '';
    $targetDir = '../uploads/';   // can still change, the new folder must be outside the web directory && change the read & download href  too & test well

    $fileName = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, basename($_FILES['file']['name'])))));
    $fileSize = $_FILES['file']['size'];

    
    // ----------------------------- The solution i have been looking for -------------------------------------- // 
    $x = explode('.', $fileName);
  
    $y = uniqid($x[0]);  // if it is not pdf, let our name be attached to it.
    $x[0] = $y;
    $fileName = $x[0].'.'.$x[1];
    // ----------------------------- The solution i have been looking for ------------------------------------------------------------ // 


    $targetFilePath = $targetDir.$fileName;
    $fileType = pathinfo(
    $targetFilePath, PATHINFO_EXTENSION
    );
    $book_name = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['book_name']))));
    $book_author = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['book_author']))));
    $book_descri = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['book_descri']))));
    $course_title = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['course_title']))));
    $course_descri = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['course_descri']))));
    $admin_name = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['admin_name']))));

        if (!preg_match("/^[a-zA-Z- 0-9]*$/", $book_name) || !preg_match("/^[a-zA-Z 0-9]*$/", $book_author) || !preg_match("/^[a-zA-Z 0-9]*$/", $book_descri) || !preg_match("/^[a-zA-Z 0-9]*$/", $course_title || !preg_match("/^[a-zA-Z 0-9]*$/", $course_descri) || !preg_match("/^[a-zA-Z 0-9]*$/", $course_descri) || !preg_match("/^[a-zA-Z 0-9]*$/", $admin_name))){
            // Invalid character check
            $msg = '<li>You have used invalid characters!</li>';           
        } else {

    // To check against more than one file extensions
    if(isset($x[2])){
        // more than one file extensions are not allowed
        $msg = '<li>E-book upload failed, consider rechecking file format!</li>';        
    } else {
    // -------------------------------- 

    $allowTypes = array('pdf', 'txt', 'doc', 'docx', 'pps', 'ppt', 'odt', 'XLR', 'xls', 'xlsx', 'ods', 'pptx', 'log', 'msg', 'pages', 'rtf', 'tex', 'wpd', 'wps', 'csv', 'key', 'sdf', 'tar', 'tax2016', 'tax2018', 'vcf', 'indd', 'xlr', 'dat');
    if(in_array($fileType, $allowTypes)){
        //Upload file to server    
        // echo $fileSize;
        // the filesize is in bytes not kilobytese
        if($fileSize < 250000000){
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
        
         
            // Insert image file name into database
            $insert = $conn->query("insert into book (file_name, book_name, book_author, book_descri, course_title, course_descri, admin_name, uploaded_on) values('".$fileName."', '".$book_name."', '".$book_author."', '".$book_descri."', '".$course_title."', '".$course_descri."', '".$admin_name."', NOW())");
            if($insert){
                // header("Location: welcome.php?success");
                echo '
                <script>
                window.location = "welcome.php?success";
                </script>
                ';
            }else{
                $msg = '<li>E-book upload failed, try again!</li>';

            }
        }else{
            $msg = '<li>Sorry, there was an error uploading your e-book.</li>';
        }
    } else {
        $msg = '<li>Sorry, your e-book is probably too large for upload.</li>';
        
    }
    }else{
        // These type of file is not allowed!
        $msg = '<li>E-book upload failed, consider rechecking file format!</li>';        
       
    }
}
}
} else {
    session_unset();
    session_destroy();
    echo '
        <script>
        window.location = "index.php";
        </script>
    ';
}
    
    
}else{
    $msg = '<li>All required fields must be satisfied!</li>';
}
} else {
    echo '
        <script>
        window.location = "index.php";
        </script>
    ';
}

}

// -------------------------------------------------------------------------------------------------------------------------------------- //

?>














        <section id = "main">
            <div class = "container">
                <article id = "main-col">
                    <h1 class = "page-title">Upload e-book:</h1>
                    <small><a href = "<?php echo ROOT_URL.'doc.php'; ?>">What type of e-books can I upload?</a></small><br><br>
                   <ul id = "services">
                        

        <style>
        li#special{
            background-color: green;
        }
        </style>
<li id = "special">
                              
<style>
/* For JioPhone 2 */
@media(width: 240px){
    input.text_form, select{
        width: 100px;
    }
}
</style>
            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

            <?php
                if(isset($_POST['submit']) && !empty($msg)) {
                    echo $msg;
                }
            ?>

            <?php
                // Check if e-book has uploaded and display js alert
                if(isset($_GET['success'])) {
                // header("Location: welcome.php");
                echo '<li>Your e-book has been uploaded successfully!</li>';
                }
            ?>

<li>
  
    <input required class = "text_form_8" type = "file"  name = "file" value = "<?php // echo isset($_POST['file']) ? $uid : ''; ?>"/>

    
<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>
    
  
   </li>
  
   <li>
    <input required class = "text_form" type = "text" name = "book_name" placeholder = "Name of e-book" value = "<?php echo isset($_POST['book_name']) ? $book_name: ''; ?>" /><br />
   <input id = "one2" required  class = "text_form" type = "text" name = "book_author" value = "<?php echo isset($_POST['book_author']) ? $book_author: ''; ?>" placeholder = "Author of e-book"/><br />

   </li>
        
   <li>
   <input required  class = "text_form" type = "text" name = "book_descri" value = "<?php echo isset($_POST['book_descri']) ? $book_descri: ''; ?>" placeholder = "Search Code(for friends)"/><br />
   <input  required class = "text_form" type = "text" name = "course_title" value = "<?php echo isset($_POST['course_title']) ? $course_title: ''; ?>" placeholder = "Course title(e.g.MAT 111)"/><br />
    
   </li>

   <li>
   <input  required class = "text_form" type = "text" name = "course_descri" value = "<?php echo isset($_POST['course_descri']) ? $course_descri: ''; ?>" placeholder = "Description(e.g.Algebra)"/><br />

<br>
    Post as
    <select name = "admin_name">
    <option><?php echo $_SESSION['name']; ?></option>
    <option><?php echo $_SESSION['uid']; ?></option>
    <option>Anonymous</option>
    </select>
    <br /> 
<br />
                    </li>
                    <li>
     <button required class = "button_1" type = "submit" name = "submit">UPLOAD</button>  
</form>

                        <style>
                            .r1 a{
                                color: #e8491d;
                                text-decoration: none;
                                font-size: 16px;
                                margin-left: 5px;
    
                            }
                            
                            .r1{
                                margin-left: 460px;
                                margin-top: -23px;
                            }
                            
                            
                            .r1 a:hover{
                                color:crimson;
                                font-weight: bold;
                            }
                        </style>
                        
                
                   <style>
                   .display{
                       text-align: center;
                       color: red;
                   }

                   
                   </style>

                  
                  
                    
              </aside>
                <style>
                    #sidebar img{
                        width: 50%;
                        height: 90%;
                    }
                    </style>
               </div>
               <style>
 @media(max-width: 1338px){
     article#main-col{
      
         float: none;
         text-align: center;
         width: 100%;
     }

     aside#sidebar{
        margin-top: 20px;
         text-align: center;
         width: 100%;
     }
 }

 </style>
            </section>

            
            <br><br><br>
<?php
    include ('foot.php');
?>


<?php
// Tell them that they upload a book of any type     
    include ('head.php');
    include ('redirect/not_logged_in.php');
?>
         
        </div> 
        </header>
        
      
        <?php
            include 'includes/nav2.inc.php';
        ?>

        <br>

        <?php
            $objDis = new UsersDisplay($_SESSION['id']);
            echo '<h1>Hello '; $objDis->displayFirst(); echo '</h1>';
        ?>




        <?php   
        
    // ------------------------------------------For Uploading Public/General files------------------------------------------------------------------------- //

if(isset($_POST['submit'])){ 
    if(isset($_SESSION['id'])){    
if(!empty($_POST['book_name']) && !empty($_POST['book_author']) && !empty($_POST['book_descri']) && !empty($_POST['course_title']) && !empty($_POST['course_descri']) && !empty($_POST['admin_name'])){

    if(hash_equals($_SESSION['token'], $_POST['token'])) {          // with this    
        
        

    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size']; 
    
    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author']    ;
    $code = $_POST['code'];
    $course = $_POST['course'];
    $uploaded_by = $_POST['uploaded_by'];
    $user_id = $_POST['user_id'];



    


    $newObj = new UsersContr();
    $newObj->uploadBook($fileName, $fileSize, $book_name, $book_author, $code, $course, $uploaded_by, $user_id);


    
    


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

// ------------------------------------------------------------------------------------------------------------------------------------------------------------- //

?>














        <section>
            <div>
                <article>
                    <h1>Upload e-book:</h1>
                    <small><a href = "<?php echo ROOT_URL.'docs.php'; ?>">What type of e-books can I upload?</a></small><br><br>
                   <ul>
      
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
  
    <input required type = "file"  name = "file" value = "<?php // echo isset($_POST['file']) ? $uid : ''; ?>"/>
            </li>
    
<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>
    
  
   </li>
  
   <li>
    <input required type = "text" name = "book_name" placeholder = "Name of e-book" value = "<?php echo isset($_POST['book_name']) ? $book_name: ''; ?>" /><br />
            </li>


    <li>
   <input id = "one2" required type = "text" name = "book_author" value = "<?php echo isset($_POST['book_author']) ? $book_author: ''; ?>" placeholder = "Author of e-book"/><br />
    <!--  -->
   </li>
        
   <li>
   <input required type = "text" name = "code" value = "<?php echo isset($_POST['code']) ? $book_descri: ''; ?>" placeholder = "Search Code(For friends)"/><br />
    </li>
<!-- small - for friends -->
    <li>
   <input  required type = "text" name = "course" value = "<?php echo isset($_POST['course']) ? $course_title: ''; ?>" placeholder = "Course (e.g.MAT 111 - Introduction to Algebra)"/><br />
   </li>
   <!-- Mat 111 - Introduction to Algebra. 
        Leave empty, if it does not apply to you.
-->
<!-- 
   <li>
   <input type = "text" name = "course_descri" value = "<?php // echo isset($_POST['course_descri']) ? $course_descri: ''; ?>" placeholder = "Description(e.g.Algebra)"/><br />
            </li>
             -->


<br>
    Post as:
    <select name = "uploaded_by">
    <option><?php 
    $objDis->displayName();
    ?></option>
    <option>Anonymous</option>
    </select>
    <br /> 
<br />
                    </li>
                    <li>
                    <input type = "text" name = "user_id" value = "<?php echo $_SESSION['id']; ?>" hidden>
            </li>

     <button required type = "submit" name = "submit">UPLOAD</button>  
</form>

            </section>
<?php
    include ('foot.php');
?>


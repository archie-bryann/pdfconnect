<?php
// Tell them that they upload a book of any type     
    include ('head.php');
    include ('redirect/not_logged_in.php');
        
    include 'includes/nav2.inc.php';

    $objDis = new UsersDisplay($_SESSION['id']);
    echo '<h1>Hello '.$objDis->displayFirst().'</h1>';



 ?>  













        <section>
            <div>
                <article>
                    <h1>Upload e-book:</h1>
                    <small><a href = "<?php echo ROOT_URL.'docs'; ?>">What type of e-books can I upload?</a></small><br><br>
      
    <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
    <?php

    if(isset($_POST['submit'])) {
    if(isset($_SESSION['id'])){    


    if(hash_equals($_SESSION['token'], $_POST['token'])) {   
    
    
    if(empty($_FILES['file'])) {
        echo '<li>Please choose a file for upload!</li>';
    } else {
        
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size']; 
    


    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author']    ;
    
    $course = $_POST['course'];
    
    $uploaded_by = $_POST['uploaded_by'];
    $user_id = $_POST['user_id'];

    
    $newObj = new UsersContr();
    echo $newObj->uploadBook($fileName, $fileSize, $book_name, $book_author, $course, $uploaded_by, $user_id);



}


} else {
    session_unset();
    session_destroy();
    header("Location: ".ROOT_URL."");
    // echo '
    //     <script>
    //     window.location = "index";
    //     </script>
    // ';
}
    

} else {
    header("Location: ".ROOT_URL."");
    // echo '
    //     <script>
    //     window.location = "index";
    //     </script>
    // ';
}

    }


if(isset($_GET['uploaded'])) {
    echo '<li>The file has been successfully uploaded!</li>';
    if(isset($_GET['pc_CODE'])) {
        $code = $_GET['pc_CODE'];
        echo '<li>The search code is '.$code.'</li>';
        echo '<li><a href = "whatsapp://send?text=My%20e-book%20code%20is%20'.$code.'.Log%20on%20to'.ROOT_URL.'%20and%20do%20a%20search%20the%20code.">Share on whatsapp</a></li>';  
    }
}

?>

<p id="status"></p><br>    


    <input required="required" type = "file"  name = "file" id = "file" /><br>



<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>
  
  
   <input required="required" type = "text" name = "book_name" id = "book_name" value = "<?php echo isset($_POST['book_name']) ? $book_name : ''; ?>" placeholder = "Name of e-book*"/><br />


   <input type = "text" name = "book_author" value = "<?php echo isset($_POST['book_author']) ? $book_author : ''; ?>" placeholder = "Author of e-book"/><br />
    <!--  -->
        


   <input type = "text" name = "course" value = "<?php echo isset($_POST['course']) ? $course : ''; ?>" placeholder = "Course (e.g.MAT 111 - Introduction to Algebra)"/><br />
   <!-- Mat 111 - Introduction to Algebra. 
        Leave empty, if it does not apply to you.
-->


<br>
    Upload as:
    <select name = "uploaded_by">
    <option><?php 
    echo $objDis->displayName();
    ?></option>
    <option>Anonymous</option>
    </select>
    <br /> 

<input type = "text" name = "user_id" value = "<?php echo $_SESSION['id']; ?>" hidden> 

    <button type = "submit" name = "submit" onclick = "uploadFile()">Upload</button>
</form>



            </section>






<?php
    include ('foot.php');
?>


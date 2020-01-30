<?php
// Tell them that they upload a book of any type     
    include 'head.php';
    include 'redirect/not_logged_in.php';
        
    include 'includes/nav2.inc.php';

    // validate the url
    include 'redirect/uploadCheck.php'; // redirect to 404 page


    echo '<h1>Update Details</h1>';

    $details = new UpdateFile($_GET['rc_CODE']);

    $user = new UsersDisplay($_SESSION['id']);
?>


<form action = "http://localhost/pdfconnect/update?rc_CODE=pc_a2c8eb9&up_id=8" method = "POST">
	<h4>Details of <i>'<?php echo $details->file_name(); ?>'</i></h4>

<p id="status"></p><br>    



<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>
  
      <?php

    if(isset($_POST['submit'])) {
    if(isset($_SESSION['id'])){    


    if(hash_equals($_SESSION['token'], $_POST['token'])) {   

    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author']    ;
    
    $course = $_POST['course'];
    $uploaded_by = $_POST['uploaded_by'];

    $code = $_POST['code'];
    $user_id = $_POST['user_id'];

    
    $newObj = new UsersContr();
    echo $newObj->updateBookDetails($book_name, $book_author, $course, $uploaded_by, $code, $user_id);

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


    include 'alertMsg/updateCheck.php';

?>


   <input required="required" type = "text" name = "book_name" id = "book_name" value = "<?php echo $details->book_name(); ?>" placeholder = "Name of e-book*" /><br />


   <input type = "text" name = "book_author" value = "<?php
   echo $details->book_author();
   ?>" placeholder = "Author of e-book"/><br />
    <!--  -->
        


   <input type = "text" name = "course" value = "<?php 
   echo $details->course();
   ?>" placeholder = "Course (e.g.MAT 111 - Introduction to Algebra)"/><br />
   <!-- Mat 111 - Introduction to Algebra. 
        Leave empty, if it does not apply to you.
-->


<br>
    Upload as:
    <select name = "uploaded_by">
    <option><?php 
    echo $details->uploaded_by();
    ?></option>
    <option>
    	<?php
    		if($details->uploaded_by() == $user->displayName()) {
    			echo 'Anonymous';
    		} else {
    			echo $user->displayName();
    		}
    	?>
    </option>
    </select>
    <br /> 

<input type = "text" name = "code" value = "<?php
echo $details->code();
?>" hidden>

<input type = "text" name = "user_id" value = "<?php echo $_SESSION['id']; ?>" hidden> 

    <button type = "submit" name = "submit" onclick = "uploadFile()">Save & Exit</button>

</form>

   













   



<?php
    include ('foot.php');
?>


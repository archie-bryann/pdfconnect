<?php
// Tell them that they upload a book of any type     
    include ('head.php');
    include ('redirect/not_logged_in.php');
        
    include 'includes/nav2.inc.php';

    echo '<h1>Edit Profile</h1>';

    $user = new UsersDisplay($_SESSION['id']);

?>












<!-- Show Profile Picture -->
<div>
<label><h3>Profile Picture</h3></label><br>
<img src="<?php echo $user->displayProfile(); ?>" style="border-radius: 10px" width='150px'>
</div>
<br>
<br>
<div>


<!-- Update Profile Picture Function -->
<?php
    if(isset($_POST['profile'])) {

        $file = $_FILES['file'];

        $profile = new UsersContr();
        echo $profile->updatePicture($file);
    }
?>



<!-- Update Profile Picture Form-->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" enctype = "multipart/form-data">
<p id = "status"></p>

<input type = "file" name = "file" required>
<button name = "profile" type = "submit" onclick = "uploadFile()">Change</button>
</form>
</div>
<!-- --------------------------------------------- -->


<form class = "quote" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">


<?php
    include_once 'alertMsg/editProfileCheck.php';


if(isset($_POST['submit'])){
    if(hash_equals($_SESSION['token'], $_POST['token'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $telephone = $_POST['telephone'];
        $student_of = $_POST['student_of'];
        $work_at = $_POST['work_at'];
        $about_me = $_POST['about_me'];

     
        if(isset($_POST['allowTelephone'])) {
              $allowTelephone = $_POST['allowTelephone'];
              
              if($allowTelephone == 'on') {
                  $allowTelephone = 1;
              } 
        } else {
            $allowTelephone = 0;
        }

        if(isset($_POST['allowEmail'])) {
                $allowEmail = $_POST['allowEmail'];

            if($allowEmail == 'on'){
                 $allowEmail = 1;
            }
        } else {
            $allowEmail = 0;    
        }
        $user_id = $_POST['user_id'];



        $update = new UsersContr();
        echo $update->updateProfile($firstname, $lastname, $telephone, $student_of, $work_at, $about_me, $allowTelephone, $allowEmail, $user_id);

        

        

    } else {
        header("Location: ".ROOT_URL."");
        // echo '<script>window.location = "index";</script>';
    }
    }      
?>


<div>
<label>Firstname</label><br>
<input required name = "firstname" type="text" placeholder = "Firstname" value = "<?php echo $user->displayFirst();?>">
</div>

<input name = "user_id" value = "<?php echo $_SESSION['id']; ?>" hidden>

<div>
<label>Lastname</label><br>
<input required name = "lastname" type="text" placeholder = "Lastname" value = "<?php echo $user->displayLast();
?>">
</div>


<div>
<label>Telephone</label><br>
<input name = "telephone" type="text" placeholder = "Telephone" value = "<?php echo $user->displayTelephone();?>">
</div>




<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>
  

<!-- <small>The email is available</small>      xml, javascript   -->   
<div>
<label>Place of Learning</label><br>
<input name = "student_of" type = "text" placeholder = "I am student of:" value = "<?php echo $user->displayStudent(); ?>">
</div>

<!-- <small> < > characeters are not allowed</small> -->
<div>
<label>Place of Work</label><br>
<input name = "work_at" type = "text" placeholder = "I work at" value = "<?php echo $user->displayWork();?>">
</div>


<div>
<label>About Me: </label><br>
<textarea name = "about_me" placeholder = "About Me"><?php echo $user->displayAbout();?></textarea>
</div>


<div>
<?php
    if($user->displayAllowTelephone() == 1) {
        echo '<input name = "allowTelephone" type = "checkbox" checked>';
    } else  {
        echo '<input name = "allowTelephone" type = "checkbox">';
    }
?>
Allow people to see my telephone
</div>

<div>
<?php
    if($user->displayAllowEmail() == 1) {
        echo '<input name = "allowEmail" type = "checkbox" checked>';
    } else {
        echo '<input name = "allowEmail" type = "checkbox">';
    }
?>
Allow people to see my e-mail address
</div>

<br>
<button name = "submit" type = "submit" onclick = "uploadFile()">Save & Exit</button><br><br>
</form>


    



<?php
    $updated = $user->displayUpdated();
    if(empty($updated)) {
    } else {
        echo '<p>Last updated: '.$user->displayUpdated().'</p>';

    }
?>








   



<?php
    include ('foot.php');
?>


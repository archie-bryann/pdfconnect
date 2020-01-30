    <?php
    include ('head.php');
    include ('redirect/logged_in.php');

    

?>

            <?php
                include 'includes/nav.inc.php';
            ?>
    


    <br>
    <br>
    <br>


    
    <div class="container col-11">
        <div class = "jumbotron">
  <legend><h1>Sign up</h1></legend><br>
<form class = "quote" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">


<?php
if(isset($_POST['submit'])){
    if(hash_equals($_SESSION['token'], $_POST['token'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];

        $user = new UsersContr();
        echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>'.$user->createUser($firstname, $lastname, $email, $uid, $pwd).'</div>';

        

    } else {
        header("Location: ".ROOT_URL."");
        // echo '<script>window.location = "index";</script>';
    }
    }      
?>


<!-- <div>
<label>Firstname</label><br>
<input required name = "firstname" type="text" placeholder = "Firstname" value = "<?php echo isset($_POST['firstname']) ? $firstname : ''; ?>">
</div> -->


      <div class="form-group">
      <label for="firstname">Firstname</label>
      <input required name = "firstname" type="text" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter firstname" value = "<?php echo isset($_POST['firstname']) ? $firstname : ''; ?>">
    </div>


<!-- <div>
<label>Lastname</label><br>
<input required name = "lastname" type="text" placeholder = "Lastname" value = "<?php echo isset($_POST['lastname']) ? $lastname : ''; ?>">
</div> -->



<div class="form-group">
      <label for="lastname">Lastname</label>
      <input required name = "lastname" type="text" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Enter lastname" value = "<?php echo isset($_POST['lastname']) ? $lastname : ''; ?>">
    </div>



<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>
  


<!-- <div>
<label>E-mail</label><br>
<input required name = "email" type = "email" placeholder = "E-mail Address" value = "<?php echo isset($_POST['email']) ? $email : ''; ?>">
</div> -->

    <div class="form-group">
      <label for="email">Email address</label>
      <input required name = "email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value = "<?php echo isset($_POST['email']) ? $email : ''; ?>">
    </div>


<!-- <div>
<label>Username</label><br>
<input required  name = "uid" type = "text" placeholder = "Username" value = "<?php echo isset($_POST['uid']) ? $uid : ''; ?>">
</div> -->

<div class="form-group">
      <label for="username">Username</label>
      <input required name = "uid" type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username" value = "<?php echo isset($_POST['uid']) ? $uid : ''; ?>">
    </div>

<!-- <div>
<label>Password</label><br>
<input required  id = "myInput" name = "pwd" type = "password" placeholder = "Password">
</div> -->


<div class="form-group">
      <label for="password">Password</label>
      <input required id="password" name = "pwd" type="password" class="form-control"  placeholder="Password">
</div>




<!-- <div>
<input id = "show_password" type = "checkbox" onclick = "myFunction()"><span class = "left"><small>Show Password</small></span>
</div> -->


<div class="form-check">
        <label class="form-check-label">
          <input id = "show_password" onclick = "myFunction()" class="form-check-input" type="checkbox" value="">
         Show Password
        </label>
      </div>

<script>
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>

<br>

<!-- <button name = "submit" type = "submit">Sign Up</button><br><br> -->

<button name = "submit" type="submit" class="btn btn-secondary">Sign up</button>
</form>
<br>

<!-- <a id = "signup" class = "blue" href = "login">Login to your account</a> -->

<a class = "nav-link" href = "<?php echo ROOT_URL.'login'; ?>">Login to your account</a>

</div>
</div>


               <br><br>
<?php
    include ('foot.php');
?>
<?php
    include ('head.php');
    include ('redirect/logged_in.php');
?>
           
           <?php
                include 'includes/nav.inc.php';
           ?>
  



  <br>
  <br>



 
 






      
        

    <div class="container col-11">
        <div class = "jumbotron">
  <legend><h1>Log in</h1></legend><br>

<form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">


<?php
if(isset($_POST['submit'])){

    if(hash_equals($_SESSION['token'], $_POST['token'])) {

                $uid = $_POST['uid'];
                $pwd = $_POST['pwd'];

                $login = new UsersContr();
                echo
                '<div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>'.
                $login->loginUser($uid, $pwd)
                .'</div>';


                } else{
                 header("Location: ".ROOT_URL."");    
                } 
                }
?>



<!-- <label>UsernameE-mail</label><br>

<input required name = "uid" type = "text" placeholder = "Username/Email" value = "<?php echo isset($_POST['uid']) ? $uid : ''; ?>">
 -->



<div class="form-group">
      <label for="email">Username/E-mail</label>
      <input required name = "uid" type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter username or email" value = "<?php echo isset($_POST['uid']) ? $uid : ''; ?>">
    </div>




<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>



<!-- <label>Password</label><br>
<input required id = "myInput" name = "pwd" type = "password" placeholder = "Password">
 -->


<div class="form-group">
      <label for="password">Password</label>
      <input required id="password" name = "pwd" type="password" class="form-control"  placeholder="Password">
</div>



<!-- <input id = "show_password" type = "checkbox" onclick = "myFunction()"><span class = "left"><small>Show Password</small></span> -->


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

<!-- <button name = "submit" type = "submit"><small>Login</small></button><br><br> -->

<br>
      <button name = "submit" type="submit" class="btn btn-secondary">Log in</button>
</form>

    <br>
<a class = "nav-link" href = "<?php echo ROOT_URL.'signup'; ?>">Signup for a free account</a>
<a class = "nav-link" href="<?php echo ROOT_URL.'reset_password'; ?>">Forgot your password?</a>

    </div>
    </div>




    <br>          
        
<?php
    include 'foot.php';
?>
              
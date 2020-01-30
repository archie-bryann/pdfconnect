<?php
    include ('head.php');
    include ('redirect/logged_in.php');


    // Verify page Check
    include ('redirect/verifyCheck.php');
    
    
    include 'includes/nav.inc.php';
?>

<br>
<br>



<div class="container col-11">
    <div class="jumbotron">
  <legend><h1>Verify your email</h1></legend><br>

<form action = "<?php echo $_SERVER['REQUEST_URI']; ?>" method = "POST">
<?php
    if(isset($_POST['submit'])) {
        if(hash_equals($_SESSION['token'], $_POST['token'])) {
                $email = $_GET['email'];
                $code = $_POST['code'];           
    
                $verify = new UsersContr();
                echo '<div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>'.$verify->validateUser($email, $code).'</div>';
        } else {
            header("Location: 404");
        }
    }
?>

<!-- <input name = "code" type="text" placeholder = "Enter Code"> -->


<div class="form-group">
      <label for="code">Code</label>
      <input required name = "code" type="text" class="form-control" id="code" aria-describedby="emailHelp" placeholder="Enter code">
    </div>


<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>


<!-- <button name = "submit" type = "submit">Verify</button> -->

<button name = "submit" type="submit" class="btn btn-secondary">Verify</button>

</form>


<br>
<a class = "nav-link" href="<?php echo ROOT_URL.'resend?email='.htmlspecialchars($_GET['email']); ?>">Resend code</a>
</div>
</div>

<br>

<?php
    include ('foot.php');
?>
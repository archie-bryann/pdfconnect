<?php
    include ('head.php');
    // include ('redirect/logged_in.php');

    

?>

<?php
                    if(isset($_SESSION['id'])) {
                        include 'includes/nav2.inc.php';    
                    } else {
                        include 'includes/nav.inc.php';
                    }
                ?>

<br>
<br>
<br>




    


<div class="container col-11">
    <div class="jumbotron">
  <legend><h1>Password Reset</h1></legend><br>


<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
<?php


    if(isset($_POST['submit'])) {
    if(hash_equals($_SESSION['token'], $_POST['token'])) {
        $email = $_POST['email'];

        $forgot = new UsersContr();
        echo $forgot->sendPassword($email);

    } else {
        header("Location: 404");    
    }
}

    if(isset($_GET['success'])) {
        echo '<div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        Your new password has been sent to your email!
        </div>';
    }
?>

<!-- <input name = "email" type="email" placeholder = "Enter email"> -->

<div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input required name = "email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
</div>

<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>

<!-- <button name = "submit" type = "submit">Send</button> -->
<button name = "submit" type="submit" class="btn btn-secondary">Reset</button>

</form>


<?php 
    if(!isset($_SESSION['id'])) {
        echo '<br><a class = "nav-link" href="login">Retry Login?</a>';
    } 
?>

</div>
</div>






           
               <br>
               <br>
<?php
    include ('foot.php');
?>
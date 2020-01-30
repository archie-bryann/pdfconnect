<?php
    include 'head.php';
    
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
        <div class = "jumbotron">
  <legend><h1>Send Feedback <i class = "material-icons">edit</i></h1></legend><br>
 <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
        
        <?php
    if(isset($_POST['submit'])) {
    if(hash_equals($_SESSION['token'], $_POST['token'])) {

        $name = $_POST['name'];
        $telephone =  $_POST['telephone'];
        $email =  $_POST['email'];
        $title =  $_POST['title'];   
        $message = $_POST['message'];
        $user_id = $_POST['user_id'];

    $report = new UsersContr();
    echo '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>'.$report->makeReport($name, $telephone, $email, $title, $message, $user_id).'</div>';
    
    


    } else {
        if(isset($_SESSION['id'])){
            session_unset();
            session_destroy();
            
        }
        header("Location: ".ROOT_URL."");
            
        // echo '
        //     <script>
        //     window.location = "index";
        //     </script>
        //     ';
    }
    }

        // alert
        if(isset($_GET['sent'])) {
        echo '<div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Thanks for your feedback!</div>';
    }

?>
                   
<input required type = "hidden" name = "token" value = "<?php echo $token; ?>"/>

<div class="form-group">
<label for="name">Name</label>
<?php
    if(isset($_SESSION['id'])) {
    $results = new UsersDisplay($_SESSION['id']);

        if(!empty($results->displayName())) {
            // echo '<input required readonly name = "name" type = "text" placeholder = "Name"  value = "'.$results->displayName().'">';
            echo '<input required readonly name = "name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" value = "'.$results->displayName().'">';
        } 
    }else {
            // echo '<input required name = "name" type = "text" placeholder = "Name">';
            echo '<input required name = "name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">';
        }
?>
<!-- <input required name = "name" type="text" placeholder = "Enter name"> -->
</div>

                        

<div class="form-group">
<label for="telephone">Contact</label>
<?php
if(isset($_SESSION['id'])) {
    if(!empty($results->displayTelephone())) {
        // echo '<input required readonly name = "telephone" type = "text" placeholder = "Telephone"  value = "'.$results->displayTelephone().'">';
        echo '<input required readonly name = "telephone" type="text" class="form-control" id="telephone" aria-describedby="emailHelp" placeholder="Enter telephone" value = "'.$results->displayTelephone().'">';
    } 
}else {
        // echo '<input required name = "telephone" type = "text" placeholder = "Telephone">';
        echo '<input required name = "telephone" type="text" class="form-control" id="telephone" aria-describedby="emailHelp" placeholder="Enter telephone">';
    }
?>

</div>



<div class="form-group">
<label for="email">Email</label>
<?php
if(isset($_SESSION['id'])) {

if(!empty($results->displayEmail())) {
// echo '<input required readonly name = "email" type = "e-mail" placeholder = "Your e-mail address"  value = "'.$results->displayEmail().'">';
echo '<input id = "email" required readonly name = "email" type="e-mail" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" value = "'.$results->displayEmail().'">';
} 
}else {
echo '<input id = "email" required  name = "email" type="e-mail" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">';
}
?>
</div>


<!-- <input id = "email" required readonly name = "email" type="e-mail" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" value = "'.$results->displayEmail().'"> -->


<div class="form-group">
<label for="title">Title</label>
    <input id = "title" required name = "title"  class="form-control" aria-describedby="emailHelp" type = "text" placeholder = "Enter Title" value = "<?php
        if(isset($_POST['title'])) {
            echo $title;
        } elseif(isset($_GET['title']))  {
            $getTitle = $_GET['title'];
            if(isset($getTitle)) {
            if($getTitle == 'type') {
                echo 'My e-book type is not on the list';
            }
        }
        } 
?>">
</div>



    <!-- <label>Message</label><br>

    <textarea required name = "message" placeholder = "Message"></textarea> -->

    <div class="form-group">
      <label for="message">Message</label>
      <textarea id = "message" required name = "message" class="form-control" id="exampleTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 98px;"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
    </div>

    <input hidden name = "user_id" type = "text" value = "<?php
        if(isset($_SESSION['id'])) {
            echo $_SESSION['id'];
        }
    ?>">


        <br>
    <!-- <button name = "submit" type = "submit" >Send</button> -->
<button name = "submit" type="submit" class="btn btn-secondary">Send <i style = "margin-left:4.5px;; margin-top:-2.5px;" class = "material-icons right">send</i></button>

    </form>
    
    </div>
    </div>

                   
                    


            </section>
 
    <br>
<?php
    include ('foot.php');
?>
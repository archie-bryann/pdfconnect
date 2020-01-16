<?php
    include 'head.php';
?>
            <!-- <nav>
            <ul> -->
                <?php
                    if(isset($_SESSION['id'])) {
                        include 'includes/nav2.inc.php';    
                    } else {
                        include 'includes/nav.inc.php';
                    }
                ?>
                <!-- </ul>
            </nav> -->
        </div> 
        </header>
        <section>
        <div>

        
           
               </div>
        </section>
        

            </div>
        </section>

        <section>


                <h2>Report Issue</h2>
                    <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                        <div>
                        <label>Name</label><br>
<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>
                            <input name = "name" type = "text" placeholder = "Name" value =  "<?php

                    if(isset($_SESSION['id'])) {
            $results = new UsersDisplay($_SESSION['id']);
            $results->displayName();
                    }
        ?>">
                        </div>
                        <div>
                        <label>Contact</label><br>
                            <input name = "telephone" type = "text" placeholder = "Telephone" value = "<?php
                if(isset($_SESSION['id'])) {
            $results->displayTelephone();
                }
        ?>">
                        </div>
    <div>
    <label>Email</label><br>
        <input name = "email" type = "e-mail" placeholder = "Your e-mail address" value = "<?php
            if(isset($_SESSION['id'])) {
            $results->displayEmail();
            }
        ?>">
</div>
                        <div>
                        <label>Title</label><br>
                            <input name = "title" type = "text" placeholder = "Title of message">
                        </div>
                        <div>
                        <label>Message</label><br>
                      
                            <textarea name = "message" placeholder = "Message"></textarea>
                          
                            
                            </div>
                        <button name = "submit" type = "submit">Send</button>
                        </form>
                        </div>
                    
                    <p> 
                    
                    </p>
                        </div>  

                   
                    


            </section>
            <?php
if(isset($_POST['submit'])) {
if(hash_equals($_SESSION['token'], $_POST['token'])) {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
    $name = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['name']))));
    $telephone = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['telephone']))));
    $mailFrom = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['email']))));
    $title = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['title']))));   
    $message = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['message']))));

$mailTo = "archiebryann@gmail.com";
$headers = "From: ".$mailFrom."\tPhone number: ".$phone_no;
$txt = "You have received an email from ".$name.".\n\n".$message;

mail($mailTo, $title, $txt, $headers);  // test when hosting
echo '
    <script>
    alert("Your message has been sent!");
    </script>
';
// exit();
} else {
    if(isset($_SESSION['id'])){
        session_unset();
        session_destroy();
        
    } 
    echo '
        <script>
        window.location = "index.php";
        </script>
        ';
}
}
?>
    <br>
<?php
    include ('foot.php');
?>
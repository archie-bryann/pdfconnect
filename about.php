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

    <br>
        <section>
            <div>
                <article>
                <ul>
                <li>
                    <h1>About The PDF Connect </h1>
                    <p>PDF Connect is a powerful but easy-to-use web application. PDF Connect was created to serve as as an e-library to schools and organizations, making access to e-books and related resources easier and less-strenious. PDF Connect is an e-library with <b>you</b> as the <i>librarian</i>.</p>
                    </li>
                  
                        <br>
                        <li>
                   <h1>About Ekomobong Archibong</h1>
                    <div>
                    <p>
                    <i>Ekomobong Archibong</i> is the creator of PDF Connect. A student of The University of Ibadan.
                    </p>
                    
                        </div>

                        </li>

                        <br>

                        <li>
                   <h1>About The Team</h1>
                    <div>
                    <p>
                    We ensure in the day-to-day running of PDF Connect.
                </p>
                    
                        </div>

                        

                        <br />
       
         
                 
                </ul>
                <aside>
                    <div>
                    <div>



            </section>
            <?php
if(isset($_POST['submit'])) {
if(hash_equals($_SESSION['token'], $_POST['token'])) {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
    $name = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['name']))));
    $phone_no = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_POST['phone_no']))));
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
    
<?php
    include ('foot.php');
?>
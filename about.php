<?php
    include 'head.php';
?>
            <nav>
            <ul>
                <?php
                    if(isset($_SESSION['id'])) {
                        echo '<li id = "one"><a href = "'.ROOT_URL.'welcome.php">Home</a></li>';
                    } else {
                        echo '<li><a href = "'.ROOT_URL.'">Home</a></li>';
                    }
                ?>

                <?php
                    if(isset($_SESSION['id'])) {
                        echo '<li id = "two" class = "current"><a href = "'.ROOT_URL.'about.php">About</a></li>';
                    } else {
                        echo '<li><a href = "'.ROOT_URL.'login.php">log in</a></li>';
                    }
                ?>

                <?php
                    if(isset($_SESSION['id'])){
                        echo '<li id = "down"><a id = "black" href = "'.ROOT_URL.'includes/logout.inc.php"><i>Log out</i></a></li>
                        
                        <style>
                        li#down{
                            background-color: lightgreen;
        
                            
                        }
                        a#black{
                            color: black;
                        
                        }
                        /* For Iphone 4 */
                        @media(width: 320px){
                            li#down{
                                margin-left: 11px;
                                margin-right: 17px;
                            }
                            input.text_form{
                                width: 150px;
                            }
                        }
                        /* --------------- */
                        </style>
                        ';
                    } else {
                        echo '<li class = "current"><a href = "'.ROOT_URL.'about.php">About</a></li>';
                    }
                ?>

                </ul>
            </nav>
        </div> 
        </header>
        <section id = "newsletter">
        <div class = "container">
            <h1>Download course materials free</h1>
            <?php
            if(isset($_SESSION['id'])) {
                echo '<form action = "search.php" method = "GET">
                <input required  name = "q" class = "text_form" type ="text" placeholder = " Search for any course material...">
                 <button name = "submit-search" type = "submit" class = "button_1" >Search</button>
             </form>';
            } else {
                echo '<form method = "POST" action = "login.php">
                <input readonly class = "text_form" type ="text" placeholder = " Search for course material..." name = "material_name">
                 <button type = "submit" class = "button_1" name = "fake_search">Search</button>
                 </form>';
            }
            ?>
            
                <style>


@media(width: 320px){
         section#newsletter div.container form input{
            margin-left: 8%;
         }
         button.button_1{
                
         }
      }

      
section#newsletter div.container form button{
                                margin-left: 110px;
                        }
<?php
    // Styling For Iphone
    if(!isset($_SESSION['id'])){
        echo '
        @media(width:320px){
            section#newsletter div.container form button{
                margin-left: 37%;
        }
        }
        
    /* For Jiophone 2 */
    @media(width: 240px){
       section#newsletter div.container form{
          margin-top: -20px;
  }

  
  section#newsletter div.container form input{
          margin-left: 9%;
          width: 140px;
  }

  
  section#newsletter div.container form button{
          margin-left: 26%;
  }
    }
    
        
      /* For Nexus 7 */
      @media(width: 600px){
    section#newsletter div.container form button{
                margin-left: 0px;
           }

    #newsletter .container form{
        margin-top: 1.1px;
    margin-right: 18%;
    margin-bottom: 20px;
}
           }
        ';
    } else {
        echo '
        @media(width:320px){
            section#newsletter div.container form input{
                margin-left: 17.6%;
        }
        section#newsletter div.container form button{
            margin-left: 33%;
    }
        } 

        
    /* For Jiophone 2 */
    @media(width: 240px){
       section#newsletter div.container form{
          margin-top: -20px;
  }

  
  section#newsletter div.container form input{
          margin-left: 9%;
          width: 140px;
  }

  
  section#newsletter div.container form button{
          margin-left: 26%;
  }
    }
            
    /* For Nexus 7 */
    @media(width: 600px){
  section#newsletter div.container form button{
              margin-left: 0px;
         }

  #newsletter .container form{
      margin-top: 1.1px;
  margin-right: 18%;
  margin-bottom: 20px;
}
         }

    
        ';
    }
    


?>
    
                        
                        .button_1{
                            height: 38px;
        background: #e8491d;
        border: 0;  
        padding-left: 20px;
        padding-right: 20px;
        color: #ffffff;
                        }
                        </style>
            
            </div>
        </section>
        
        <style>
                            li, video{
                                border-radius: 5px;
                            }
                            div.dark_1{
                                border-radius: 5px;

                            }
                            </style>


            </div>
        </section>

        <br>
        <br>
        <section id = "main">
            <div class = "container">
                <article id = "main-col">
                <ul id = "services">
                <li>
                    <h1 class = "page-title">About The PDF Connect </h1>
                    <p>PDF Connect is a powerful but easy-to-use web application. PDF Connect was created to serve as as an e-library to schools and organizations, making access to e-books and related resources easier and less-strenious. PDF Connect is an e-library with <b>you</b> as the <i>librarian</i>.</p>
                    </li>
                    <style>
                        p {
                            text-align: left;
                        }
                        </style>
                        <br>
                        <li>
                   <h1 class = "page-title">About Ekomobong Archibong</h1>
                    <div class = "box2">
                    <p>
                    <i>Ekomobong Archibong</i> is a student of The University of Ibadan, from the Computer Science Department.
                    </p>
                    
                        </div>

                        </li>

                        <br />
       <style>
                            div.dark{
                                border-radius: 5px;
                            }
                        </style>
                </article>  
                <style>
        form button, input, textarea{
            border-radius: 5px;
        }
        li, div.dark{
            border-radius: 5px;
        }
        </style>
         
                 
                </ul>
                <aside id = "sidebar">
                    <div class = "dark">
                    <div class = "dark">



                    <style>
                    @media(width: 333px){
                        aside#sidebar .dark .dark form input, textarea{
                            margin-left: -15px;
                        }
                    }
                    @media(max-width: 328px){
                        aside#sidebar .dark .dark form input, textarea{
                            margin-left: -20px;
                        }
                    }

                 
                    @media(width: 298px){
                        aside#sidebar .dark .dark form input, textarea{
                            margin-left: -28px;
                        }
                    }

                    aside#sidebar .dark .dark form input{
                        width: 80%;
                    }
                  
                    </style>





                <h2>Report Issue</h2>
                    <form class = "quote" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                        <div>
                        <label>Name</label><br>
<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>
                            <input name = "name" class = "text_form_2" type = "text" placeholder = "Full name">
                        </div>
                        <div>
                        <label>Contact</label><br>
                            <input name = "phone_no" class = "text_form_2" type = "text" placeholder = "Telephone">
                        </div>
                        <div>
                        <label>Email</label><br>
                            <input name = "email" class = "text_form_2" type = "e-mail" placeholder = "Your e-mail address">
                        </div>
                        <div>
                        <label>Title</label><br>
                            <input name = "title" class = "text_form_2" type = "text" placeholder = "Title of message">
                        </div>
                        <div>
                        <label>Message</label><br>
                        <!-- Size special for Iphone 4 -->
                            <textarea id = "rr" style="width: 80%; height: 148px;" name = "message" class = "text_form_2" placeholder = "Message"></textarea>
                            <!-- take care of this -->
                            
                            </div>
                        <button name = "submit" class = "button_1" type = "submit">Send</button>
                        </form>
                        </div>
                    
                    <p> 
                    
                    </p>
                        </div>  

                   
                    


               <style>

 @media(max-width: 1338px){
     article#main-col{
      
         float: none;
         text-align: center;
         width: 100%;
     }

     aside#sidebar{
        margin-top: 20px;
         text-align: center;
         width: 100%;
     }
 }

 </style>
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
    <br>
<?php
    include ('foot.php');
?>
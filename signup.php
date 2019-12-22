<?php
    include ('head.php');
    include ('redirect/logged_in.php');
?>

            <nav>
            <ul>
                <li><a href = "<?php echo ROOT_URL; ?>">Home</a></li>
                <li><a href = "<?php echo ROOT_URL.'login.php'; ?>">log in</a></li>
                <li><a href = "<?php echo ROOT_URL.'about.php'; ?>">About</a></li>

                </ul>
            </nav>
        </div>  
        </header>
        
       <style>
        form button, input{
            border-radius: 5px;
        }
        </style>
        
        <section id = "newsletter">
        <div class = "container">
            <h1>Download course materials free</h1>
            <form method = "POST">
<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>
               <input id = "left" readonly class = "text_form" type ="text" placeholder = " Search for course material..." name = "material_name">
                <button type = "submit" class = "button_1" name = "fake_search">Search</button>

                <?php
                    if(isset($_POST['fake_search'])){
    if(hash_equals($_SESSION['token'], $_POST['token'])) {
                        header("Location: login.php");
    } else {
        header("Location: index.php");
    }
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
                        @media(width: 320px){
         section#newsletter div.container form button{
            margin-left: 70px;
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
      
                
                        .button_1{
                            height: 38px;
        background: #e8491d;
        border: 0;  
        padding-left: 20px;
        padding-right: 20px;
        color: #ffffff;
                        }
                        </style>
            </form>
            </div>
        </section>
        


       
            </div>
        </section>

      
        
        <section id = "main">
            <div class = "container">
                <article id = "main-col">
                    <h1 id = "signUp">Sign up</h1>
                   
                   <ul id = "services">
   <li>
    


    
<?php
if(isset($_POST['submit'])){
    if(hash_equals($_SESSION['token'], $_POST['token'])) {


$name = strip_tags(htmlentities(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['name']))));

$email = strip_tags(htmlentities(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']))));

$uid = strip_tags(htmlentities(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['uid']))));

$pwd = strip_tags(htmlentities(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['pwd']))));

        if (empty($name) || empty($email) || empty($uid) || empty($pwd)){
            $msg = '<li>Please fill in all fields!</li>';
            
        } else{
            if (!preg_match("/^[a-zA-Z- ]*$/", $name)){
                $msg = '<li>You have used invalid characters!</li>';
            } else {

                // Also change capital letter to sentence case  
                $name2 = ucwords($name);
                $sql = "select * from users where email='$email'";
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $msg = '<li>You have used an invalid email!</li>';
                } 
                else {
                    if(strlen($pwd) < 6){
                        $msg = '<li>Password must be greater than 6 characters</li>';
               }else{
                    $sql = "select * from users where email='$email'";                    
                    $result = mysqli_query($conn, $sql);     
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0) {
                        $msg = '<li>You have used an invalid email!</li>';
                    } else {
                        if($uid == 'anonymous' || $uid == 'Anonymous'){
                            $msg = '<li>You have used an invalid username!</li>';
                        } else {
                    $sql = "select * from users where uid='$uid'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0) {
                        $msg = '<li>You have used an invalid username!</li>';

                    } else {
                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                        
                        $sql = "insert into users (name, email, uid, pwd, time) values ('$name2', '$email', '$uid', '$hashedPwd', '".time()."')";
                        if(mysqli_query($conn, $sql)){  
                        echo '
                            <script>
                            window.location = "login.php";
                            </script>
                        ';
                    } else {
                        $msg = '<li>An error occurred while signing up!</li>';

                    }
                        
                        
                    }
                }
            }
            }
        }
            }
        }
    } else {
        $msg = '
                    <script>
                    window.location = "index.php";
                    </script>
                    ';
    }

    } 
       
              
    
        
    

    ?>

<style>
/* For JioPhone 2 */
@media(width: 240px){
    form input{
        width: 140px;
    }
}
</style>


<form class = "quote" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
<div>
<?php
    if(isset($_POST['submit'])){
        if(isset($msg)){
    echo "{$msg}";
        }

    }
?>
</div>
<div>
<label>Name</label><br>
<input name = "name" type="text" placeholder = "Name" value = "<?php echo isset($_POST['name']) ? $name : ''; ?>">
</div>
<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>
  


<div>
<label>E-mail</label><br>
<input name = "email" type = "text" placeholder = "E-mail Address" value = "<?php echo isset($_POST['email']) ? $email : ''; ?>">
</div>

<!-- <small>The email is available</small>      xml, javascript   -->
<div>
<label>Username</label><br>
<input name = "uid" type = "text" placeholder = "Username" value = "<?php echo isset($_POST['uid']) ? $uid : ''; ?>">
</div>

<!-- <small>The username is available</small>     xml, javascript    --> 
<!-- <small> < > characeters are not allowed</small> -->
<div>
<label>Password</label><br>
<input id = "myInput" name = "pwd" type = "password" placeholder = "Password" >
</div>
<!-- <small> < > characeters are not allowed</small> -->

<div>
<input id = "show_password" class = "checkbox" name = "email" type = "checkbox" onclick = "myFunction()"><span class = "left"><small>Show Password</small></span>
</div>
<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
<button name = "submit" class = "button_1" type = "submit">Sign Up</button><br><br>
<a id = "signup" class = "blue" href = "login.php">Login to your account</a>
</form>

<style>
a#signup{
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; 
    color: black;

}

</style>

</li>
                    </ul>
                </article>
                <br />
              
            
                        </div>
                    
                        <style>
                            .button_2{
                                margin-left: -7px;
                            }
                        </style>
                              
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
                        </form>
                      
                        </div>
                    
                </aside>
                
               </div>
               <br><br>
<?php
    include ('foot.php');
?>
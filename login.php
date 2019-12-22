<?php
    include ('head.php');
    include ('redirect/logged_in.php');
?>
            <nav>
            <ul>
                <li><a href = "<?php echo ROOT_URL; ?>">Home</a></li>
                <li class = "current"><a href = "<?php echo ROOT_URL.'login.php'; ?>">log in</a></li>
                <li><a href = "<?php echo ROOT_URL.'about.php'; ?>">About</a></li>
                </ul>
            </nav>
        </div> 
        </header>
        
       <style>
        form button, input{
            border-radius: 5px;
        }
      
      section#newsletter div.container form input{
        width: 200px
      }
      section#newsletter div.container form button{
        
      }

      @media(width: 320px){
         section#newsletter div.container form input{
            margin-left: 8%;
         }
         section#newsletter div.container form button{
            
    }

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
             

                        .button_1{y
                            height: 38px;
        background: #e8491d;
        border: 0;  
        padding-left: 20px;
        padding-right: 20px;
        color: #ffffff;
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
    }
      
                        
                        </style>
            
            </form>
            </div>
        </section>
        

     
      
        
        <section id = "main">
            <div class = "container">
                <article id = "main-col">
                    <h1 id = "signUp">Log in</h1>
                   
                   <ul id = "services">
   <li>
                          
                            
<?php
if(isset($_POST['submit'])){

    if(hash_equals($_SESSION['token'], $_POST['token'])) {

 
$uid = strip_tags(htmlentities(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['uid']))));
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    if(!isset($_POST['remember'])){
    } else{
        $remember = $_POST['remember'];

    }

        if (empty($uid) || empty($pwd)){
            $msg = '<li>Please fill in all fields!</li>';
            
        } else {
                                
                $sql = "select * from users where uid = '$uid' or email='$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck < 1) {
                     $msg = '<li>Invalid username or email!</li>';
                } else {
                    if($row = mysqli_fetch_assoc($result)) {
                        $hashedPwdCheck = password_verify($pwd, $row['pwd']);
                        if($hashedPwdCheck == false) {
                            $msg = '<li>Invalid password!</li>';
                        } elseif ($hashedPwdCheck == true) {                         
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['uid'] = $row['uid'];
                            $_SESSION['pwd'] = $pwd;  
                            $_SESSION['hpwd'] = $row['pwd'];

                            $prd = $row['uid'];
                            $sql = "update users set status = '1' where uid = '$prd'";
                            if(mysqli_query($conn, $sql)){
                                echo '
                                <script>
                                window.location = "welcome.php";
                                </script>
                                ';
                            
                        }
                        }
                            }

                        }
                    }
                } else{
                    echo '
                    <script>
                    window.location = "welcome.php";
                    </script>
                    ';
                } 
                }
?>

<br>

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

<label>Username/E-mail</label><br>

<input name = "uid" type = "text" placeholder = "Username/Email" value = "<?php echo isset($_POST['uid']) ? $uid : ''; ?>">

<input type = "hidden" name = "token" value = "<?php echo $token; ?>"/>

<div>
<label>Password</label><br>

<input id = "myInput" name = "pwd" type = "password" placeholder = "Password">


</div>
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

<button id = "down" name = "submit" class = "button_1" type = "submit"><small>Login</small></button><br><br>

<a id = "signup" href = "signup.php">Signup for a free account</a>
</form>
</li>
                    </ul>
                </article>
                <br />
<style>
button#down{
    margin-bottom: -10px;
}

/* header a{
        color: #ffffff;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 16px;
        
    } */


a#signup{
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
    color: black;
    /* text-decoration: none; */

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

 <style>
 li{
    border-radius: 5px;
 }
 </style>
                        </form>
                        
                        
                      
                        </div>
                        <!-- For Videos -->
                      <!-- <video width = "330" controls>
      <source src = "" type = "video/mp4">
          <source src = "./videos/">
          Your browser does not support this video!!!
      </video> -->
      <!-- <style>
      video{
          margin-top: -60px;
      }
      </style>                   -->
                </aside>
               </div>
            
               <br>


    <style>
    section#main .container{
        margin-bottom: 4px;
    }
    </style>
              
<?php
    include 'foot.php';
?>
              
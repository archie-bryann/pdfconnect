<?php
    include ('head.php');
    include ('redirect/logged_in.php');
?>
           
           <?php
                include 'includes/nav.inc.php';
           ?>
        </div> 
        </header>
 
 

     
      
        
        <section>
            <div>
                <article>
                    <h1>Log in</h1>
<form class = "quote" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
<div>
<?php
if(isset($_POST['submit'])){

    if(hash_equals($_SESSION['token'], $_POST['token'])) {

                $uid = $_POST['uid'];
                $pwd = $_POST['pwd'];

                $login = new UsersContr();
                $login->loginUser($uid, $pwd);



                } else{
                    echo '
                    <script>
                    window.location = "welcome.php";
                    </script>
                    ';
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


<input id = "show_password" type = "checkbox" onclick = "myFunction()"><span class = "left"><small>Show Password</small></span>



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

<button name = "submit" type = "submit"><small>Login</small></button><br><br>

<a href = "signup.php">Signup for a free account</a>
</form>
</li>
                    </ul>
                </article>
                <br />
        
  

                    


                        </form>
                        
                        
                      
                        </div>
     
                </aside>
               </div>
            
               <br>


              
<?php
    include 'foot.php';
?>
              
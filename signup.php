    <?php
    include ('head.php');
    include ('redirect/logged_in.php');

    

?>

            <?php
                include 'includes/nav.inc.php';
            ?>
        </div>  
        </header>
    

            </div>
        </section>

      
        
        <section>
            <div>
                <article>
                    <h1>Sign up</h1>
                   

    


    



<form class = "quote" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
<?php
if(isset($_POST['submit'])){
    if(hash_equals($_SESSION['token'], $_POST['token'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];

        $user = new UsersContr();
        $user->createUser($firstname, $lastname, $email, $uid, $pwd);

        

    } else {
        $msg = '<script>window.location = "index.php";</script>';
    }
    }      
?>

<div>
<label>Firstname</label><br>
<input name = "firstname" type="text" placeholder = "Firstname" value = "<?php echo isset($_POST['firstname']) ? $firstname : ''; ?>">
</div>

<div>
<label>Lastname</label><br>
<input name = "lastname" type="text" placeholder = "Lastname" value = "<?php echo isset($_POST['lastname']) ? $lastname : ''; ?>">
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
<input id = "myInput" name = "pwd" type = "password" placeholder = "Password">
</div>
<!-- <small> < > characeters are not allowed</small> -->

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
<button name = "submit" class = "button_1" type = "submit">Sign Up</button><br><br>
<a id = "signup" class = "blue" href = "login.php">Login to your account</a>
</form>



</li>
                    </ul>
                </article>
                <br />
              
            
                        </div>
                    
                    </form>
                      
                        </div>
                    
                </aside>
                
               </div>
               <br><br>
<?php
    include ('foot.php');
?>
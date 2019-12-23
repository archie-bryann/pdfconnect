<?php
    include ('head.php');
    include ('redirect/logged_in.php');
    

?>
<nav>

            <ul>
                <li class = "current"><a href = "<?php echo ROOT_URL; ?>">Home</a></li>
                <li><a href = "<?php echo ROOT_URL.'login.php'; ?>">log in</a></li>              
                <li><a href = "<?php echo ROOT_URL.'about.php'; ?>">About</a></li>
                </ul>
            </nav>
        </div> 
        </header>
        <style>
            section#showcase .container{
                margin-top: -70px;
                margin-bottom: -65px;
            }
            </style>
        <section id = "showcase">
        <div class = "container">
        <h1>Get the best intellectual resources</h1>
        <p><i>PDF Connect provides free and unrestricted access to college e-books, a platform for uploading and downloading e-books. Do grow with us and promote the culture because <b>we believe in you.</i></b></p>
                <form method = "POST" action = "signup.php">
            <button id = "redt" type = "submit" class = "button_1" name = "getStarted">Get Started</button>                
                 </form>
<style>
/* The button */
button#redt{
    width: 150px;
    /* margin-left: 450px; */
    border-radius: 5px;
    float: none;
    margin-left: 40%;
}
    @media(max-width: 1366px){
        button#redt{
        margin-left: 40%;
    }
}

    @media(max-width: 692px){
        button#redt{
            margin-left: 30%;
        }
    }

    @media(max-width: 627px){
        button#redt{
            margin-left: 24.5%;
        }
    }

    /* Blackberrry Playbooks */
    @media(width: 600px){
        button#redt{
            margin-left: 35%;
        }
    }

    /* Microsoft Lumia 550 */
    @media(width: 640px){
        button#redt{
            margin-left: 36%;
        }
    }

    
    @media(width: 412px){
        button#redt{
            margin-left: 27.5%;
        }
    }

    /* Nokia Lumia 520 */
    @media(width: 320px){
        button#redt{
            margin-left: 21.5%;
        }
    }

/* Pixel 2 */
@media(width: 411px){
        button#redt{
            margin-left: 28%;
        }
    }

    /* Nexus 5X */
    @media(width: 480px){
        button#redt{
            margin-left: 30.5%;
        }
    }

    /* Nexus 5X */
    @media(width: 768px){
        button#redt{
            margin-left: 37.5%;
        }
    }

    /* Jiophone 2 */
    @media(width: 240px){
        button#redt{
            margin-left: 12%;
        }
    }
    
       /* Iphone 6/7/8 plus */
       @media(width: 414px){
        button#redt{
            margin-left: 27%;
        }
    }

    /* Galaxy S5 */
    @media(width: 360px){
    button#redt{
        margin-left: 24%;
    }
}

    
    
    
</style>



    <style>    
    @media(max-width: 353px){
        section#showcase .container h1{
            font-size: 50px;
        }
    }

    @media(max-width: 332px){
        section#showcase .container h1{
            ;font-size: 40px;
        }
    }

    @media(max-width: 260px){
        section#showcase .container h1{
                font-size: 30px;
        }
        section#showcase .container p{
            font-size: 20px;
        }
    }
    

    @media(max-width: 196px){
        section#showcase .container h1{
            font-size: 20px;

        }
        section#showcase .container p{
            font-size: 10px;
        }
    }

        #showcase h1{
            
            text-align: center;
            
        }
    </style>    
</div>
</section>
    
        <?php
            if(isset($_POST['fake'])){
                header("Location: login_signup.php");
                // exit();
            }
        ?>
                
        <style>
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
        </div>
                            <style>
                                </style>


                    </div>
 <?php
    include ('foot.php');
 ?>

<?php
    include 'head.php';
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
                  <!-- <h1>About</h1> -->
                <div class="jumbotron">
              <h2>About WebApp</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur ullam necessitatibus deleniti porro reprehenderit aliquam sit doloremque dolorem placeat quis.</p>
                </div>
              <br>

              <div class="jumbotron">
              <h2>About Ekomobong Archibong</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, doloremque vel quibusdam eaque possimus praesentium porro enim impedit et inventore!</p>
              </div>

              <br>

              <div class="jumbotron">
              <h1>About The Team</h1>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem assumenda ab impedit beatae! Minus repellendus tempora delectus perspiciatis, officia voluptatum.</p>
              </div>      
              </div>

              <br>
              <br>

<?php
    include ('foot.php');
?>
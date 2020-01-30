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
      
    
<?php
    include ('foot.php');
?>
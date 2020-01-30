<?php
    include ('head.php');

    if(isset($_SESSION['id'])) {
        include 'includes/nav2.inc.php';
    } else {
        include 'includes/nav.inc.php';
    }
    echo '<h1>404 Error: Page Not Found</h1>';
?>

    













   



<?php
    include ('foot.php');
?>


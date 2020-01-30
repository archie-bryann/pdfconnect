<?php
// Tell them that they upload a book of any type     
    include ('head.php');
    include ('redirect/not_logged_in.php');
        
    include 'includes/nav2.inc.php';

    echo '<h1>My uploads</h1>';

    $uploads = new UploadsView();
    $uploads->displayUploads($_SESSION['id']);
?>

    













   



<?php
    include ('foot.php');
?>


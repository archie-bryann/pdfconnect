<?php
    include ('head.php');
    include ('redirect/not_logged_in.php');

        include 'includes/nav2.inc.php';

    echo '<h1>Settings</h1>';
?>


<a href="<?php echo ROOT_URL.'reset_password'; ?>">Reset my password</a>
<a href="<?php echo ROOT_URL.'delete'; ?>">Delete my account</a>





<!-- use $_SESSION['id] -->







   



<?php
    include ('foot.php');
?>


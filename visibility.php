<?php
    include 'headerInc.php';
?>

<?php
    // check the visibility and do the opposite of what is done
    $visible = new UsersContr();
    $visible->checkVisibility($_GET['uc_CODE']);
    header("Location: uploads.php");
?>






<?php
    include 'headerInc.php';
?>

<?php
    // check the visibility and do the opposite of what is done
    $delete = new UsersContr();
    $delete->deleteUpload($_GET['uc_CODE']);
    header("Location: uploads.php");
?>






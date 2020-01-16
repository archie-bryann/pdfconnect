<?php
    session_start();

    // correct later
    date_default_timezone_set('Africa/Lagos');
    date_default_timezone_get();
    
    // include ('includes/dbh.inc.php');
    include ('includes/class-autoloader.inc.php');


    // for my variables
    $dir = new Dbh();
    $dir->setVariable();    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width = device-width">
    <meta name = "description" content = "">
    <meta name = "keywords" content = "">
    <meta name = "author" content = "Ekomobong Archibong">
    <title>PDF Connect</title>
    <!-- <link rel = "stylesheet" href = "bootstrap-lumen.css"> -->
    <link rel = "stylesheet" href = 'animate.min.css'>

    <link rel = "icon" type = "image/png" href = "">
    <link rel = "apple-icon-touch" type = "image/png" href = "">
    </head>
    <a href = "<?php echo ROOT_URL; ?>"><h1>PDF Connect</h1></a>

<?php
// CSRF Token
    if(empty($_SESSION['token'])) {
        $_SESSION['token'] = (bin2hex(random_bytes(32)));       
    }
    $token = $_SESSION['token'];

?>
    



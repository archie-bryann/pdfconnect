    <form method = "POST" action = "<?php $_SERVER['PHP_SELF'] ?>">
    <button name = "logout">Logout</button>
    </form>

<?php

    include 'headerInc.php';

    
    include 'redirect/angelProtect.php';
    $user = new UsersDisplay($_SESSION['id']);

    echo '<h1>Hello '.$user->displayFirst().'</h1>';


    $angel = new AngelView();

    echo '<br>';

    echo '<h2>Total number of visits: </h2>';  // ip addresses

    // store the ipaddress of the users


    echo '<h2>Total number of page requests: '.$angel->displayRequests().'</h2>';

    
    echo '<br>';
    
    echo '<h2>Total number of users: '.$angel->displayUsers().'</h2>';


    echo '<h4>Logged in users: '.$angel->displayLoggedIn().'</h4>';

    echo '<h4>Logged out users: '.$angel->displayLoggedOut().'</h4>';

    // requests for all users and do requests at the bottom of the page
?>




<?php
    if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: ".ROOT_URL."");
    }
?>

<?php
// Tell them that they upload a book of any type     
    include ('head.php');
    // include ('redirect/not_logged_in.php');

    // Check for valid user
    include 'redirect/checkProfile.php';
    
 

        
    include 'includes/nav2.inc.php';

    echo '<h1>Profile Page</h1>';

    $user = new UsersDisplay($_GET['tag']);

    // redirect profile_user to edit
    include 'redirect/denyUserProfile.php';  
    

       
 

    echo "<img src = '".$user->displayProfile()."' style = 'border-radius: 10px' width='150px'>";

    echo '<br>';

    echo '<b>Name</b>:'.$user->displayName();

    
    echo '<br>';
    
    if($user->displayAllowTelephone() == 1) {
        if(!empty($user->displayTelephone())) {
        echo '<b>Telephone</b>:'.$user->displayTelephone();
        echo '<br>';
        }
    }



    if($user->displayAllowEmail() == 1) {
        echo '<b>Email</b>:'.$user->displayEmail();
        echo '<br>';
    }


    if(!empty($user->displayStudent())) {
    echo 'I study at <b>'.$user->displayStudent().'</b>';
    echo '<br>';      
    }

    if(!empty($user->displayWork())) {
        echo 'I work at <b>'.$user->displayWork().'</b>';
        echo '<br>';
    }


    if(!empty($user->displayAbout())) {
    echo '<b>About Me</b>: '.$user->displayAbout();
    }


    include ('foot.php');
?>


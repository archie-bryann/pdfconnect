<?php
    include 'headerInc.php';
        
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size']; 
    


    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author']    ;
    
    $course = $_POST['course'];
    
    $uploaded_by = $_POST['uploaded_by'];
    $user_id = $_POST['user_id'];

    $token = $_POST['token'];
    
    $newObj = new UsersContr();
    echo $newObj->uploadBook($fileName, $fileSize, $book_name, $book_author, $course, $uploaded_by, $user_id, $token);

    





<?php
    session_start();
    include ('includes/dbh.inc.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width = device-width">
    <meta name = "description" content = "The PDF Connect">
    <meta name = "keywords" content = ">www.thepdfconnect.com, The PDF Connect, provides, free,  unrestricted, access, college e-books, platform, uploading, downloading, e-books, types, Do, grow, promote, culture, we, believe, in, you, search, Search, course, materials, course materials, books, facebook, twitter, get the best intellectual resources, an Ekomobong Archibong, Download course materials free, upload e-book of any type, Name, Author, Description/Search Code, Course, Course description, Uploaded by, Date, Read, Download, About PDF Content, Search for ny course material,About Ekomobong Archibong, The University of Ibadan, UI, Google">
    <meta name = "author" content = "Ekomobong Archibong">
    <title>The PDF Connect</title>
    <link rel = "stylesheet" href = "./css/style.css">
    <link rel = "icon" type = "image/png" href = "img/try.png">
    <link rel = "apple-icon-touch" type = "image/png" href = "img/try.png">
    </head>
    <style>
    header{
        background-color: #3a4b53;
    }
    </style>
    <body>
    <header> 
        <div class = "container">
            <div id = "branding">
            <h1><span class = "white">The </span><span class = "highlight">PDF </span><span class = "white">Connect</span></h1>
<style>
.white{
    color: rgb(244, 230, 232);
}
</style>
                </div>

<?php
// CSRF Token
    if(empty($_SESSION['token'])) {
        $_SESSION['token'] = (bin2hex(random_bytes(32)));       // can use this to hide stuff(this is a method of hashing)
    }
    $token = $_SESSION['token'];
    // echo $token;
?>
    



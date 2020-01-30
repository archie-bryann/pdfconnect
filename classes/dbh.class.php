<?php

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "pdfconnect";

    public function connect() {
        $dsn = "mysql:host=" . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }


    // start it at head
    public function setVariable() {
        define('ROOT_URL', 'http://localhost/pdfconnect/');
        define('colour1', 'bg-dark');       // bg-primary
        define('colour2', 'bg-secondary');
        
        define('links', 'grey lighten-2');

        define('white', 'white');

    }


    // CHANGE THE FOLLOWING TO:

    // Change 'includes/logout.inc.php';

    // change 'classes/users.class.php' => uploadLocation to OUTSIDE WEB'S DIRECTORY  (..)
   
}


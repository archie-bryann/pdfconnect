<?php
    spl_autoload_register('myAutoLoader');

    function myAutoLoader($classname) {
        $path = 'classes/';
        $ext = '.class.php';

        $fullPath = $path . $classname . $ext;

        if(!file_exists($fullPath)) {
            return false;
        }        

        include_once $path . $classname . $ext;
    }
?>
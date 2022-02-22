<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    require __DIR__ . '/vendor/autoload.php';

    session_start();
    if(isset($_SESSION['auth'])) { 
        include "src/html/welcome.php"; 
    }
    else {
        include "src/html/main.php";
    }
?>

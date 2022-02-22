<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    require  __DIR__ . '/../../vendor/autoload.php';
    use \Project\Logout\Logout;

    session_start();

    // Проверка на AJAX-запрос
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest')
    {
        echo "Bad request!";
        die;
    }

    //Выполнение выхода пользователя
    if($_POST['type'] == 1) {
        $logout = new Logout();
        echo $logout->logoutUser();
    } 
?>
<?php

    require  __DIR__ . '/../../vendor/autoload.php';
    use \Project\Login\Login;
    session_start();
    // Проверка на AJAX-запрос
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest')
    {
        echo "Bad request!";
        die;
    }
    // Выполнение авторизации
    if($_POST['type'] == 1) {
        $login = new Login();
        echo $login->loginUser($_POST);
    } 
?>

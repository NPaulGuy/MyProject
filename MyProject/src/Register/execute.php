<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    require  __DIR__ . '/../../vendor/autoload.php';

    use \Project\Register\Register;

    session_start();
    // Проверка на AJAX-запрос
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest')
    {
        echo "Bad request!";
        die;
    }
    //Выполнение регистрации
    if($_POST['type'] == 1) {
        $register = new Register();
        echo $register->registerUser($_POST);
    } 
?>

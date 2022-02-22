<?php
    
    namespace Project\Login;
    use \Project\DB\DB;
    class Login {
        
        public function loginUser($userData) {
            $login = $userData['login'];
            $password = $userData['password'];
            $db = new DB();
            $dbUserData = $db->read($login);
            if(!$dbUserData) {
                return json_encode(array("statusCode" => 201, "errorField" => "login",
                "text" => "There is no such user!"));
            }
            else if(!password_verify($password,$dbUserData['password'])){
                return json_encode(array("statusCode" => 201, "errorField" => "password",
                "text" => "Wrong password!"));
            }
            else {
                $_SESSION['auth'] = true;
                $_SESSION['login'] = $dbUserData['login'];
                $_SESSION['name'] = $dbUserData['name'];
                $_SESSION['email'] = $dbUserData['email'];
                return json_encode(array("statusCode" => 200));
            }
        }
    }
?>

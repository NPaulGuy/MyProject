<?php
    
    namespace Project\Register;
    use \Project\DB\DB;
    use \Project\Validation\LoginValidator;
    use \Project\Validation\PasswordValidator;
    use \Project\Validation\EmailValidator;
    use \Project\Validation\NameValidator;


    class Register {
        public function registerUser($userData) {
            $login = $userData['login'];
            $password = $userData['password'];
            $confirmPassword = $userData['confirmPassword'];
            $email = $userData['email'];
            $name = $userData['name'];

            $loginValidator = new LoginValidator();
            $passwordValidator = new PasswordValidator();
            $emailValidator = new EmailValidator();
            $nameValidator = new NameValidator();
            $registerUser = new Register();
            #var_dump($userData);
            if(!$loginValidator->isValid($login)) {
                return json_encode(array("statusCode" => 201, "errorField" => "login", 
                    "text" => "Invalid login!" ));
            } 
            else if(!$passwordValidator->isValid($password) 
                || !$passwordValidator->isEqual($password, $confirmPassword)) {
                
                return json_encode(array("statusCode" => 201, "errorField" => "password",
                    "text" => "Invalid password or passwords are not equal!"));
            }
            else if(!$emailValidator->isValid($email)) {
                return json_encode(array("statusCode" => 201, "errorField" => "email",
                    "text" => "Invalid e-mail!"));
            }
            else if(!$nameValidator->isValid($name)) {
                return json_encode(array("statusCode" => 201, "errorField" => "name",
                    "text" => "Invalid name!"));
            }
            else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $user = array("login" => $login, "password" => $password, 
                    "email" => $email, "name" => $name); 
                $db = new DB();
                if(!$db->create($user)) {
                    return json_encode(array("statusCode" => 201, "errorField" => "default")); 
                }
                else {
                    echo json_encode(array("statusCode" => 200));
                }
            }
        } 
    }
?>

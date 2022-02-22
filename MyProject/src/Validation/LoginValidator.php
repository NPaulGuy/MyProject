<?php
    namespace Project\Validation;
    use \Project\Validation\Validator;

    class LoginValidator implements Validator {
        
        public function isValid($value) {
            $value = htmlspecialchars($value);
            if($value !== trim($value) && strpos($value, ' ') == false) {
                return false;
            }
            return strlen($value) >= 6;
        }
    }
?>

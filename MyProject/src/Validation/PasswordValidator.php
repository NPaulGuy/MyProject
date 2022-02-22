<?php

    namespace Project\Validation;
    use \Project\Validation\Validator;

    class PasswordValidator implements Validator {
        
        private $pattern = "#^[a-zA-Z0-9]{6,}$#";

        public function isValid($value) {
            $value = htmlspecialchars($value);
            return preg_match($this->pattern, $value); 
             
        }

        public function isEqual($value1, $value2) {
            return $value1 == $value2;
        }
    }
?>

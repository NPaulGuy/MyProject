<?php
    namespace Project\Validation;
    use \Project\Validation\Validator;
    
    class EmailValidator implements Validator {
        
        public function isValid($value) {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }
    }
?>

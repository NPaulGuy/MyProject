<?php
    namespace Project\Validation;
    use \Project\Validation\Validator;
    
    class NameValidator implements Validator {

        private $pattern = "#^[a-zA-Z]{2}$#";

        public function isValid($value) {
            return preg_match($this->pattern, $value);
        }
    }
?>

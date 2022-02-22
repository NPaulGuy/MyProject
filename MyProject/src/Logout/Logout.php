<?php
    
    namespace Project\Logout;

    class Logout {
        public function logoutUser() {
            session_unset();
            return json_encode(array("statusCode" => 200));
        }
    }
?>

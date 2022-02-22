<?php

    namespace Project\DB;

    class DB {
        
        public function create($user) {
            if(!$this->isUserExists($user)) {
                $data = $this->getJsonAsArray();
                if($data['users']) {
                    $newData = $data;
                    $newData['users'][] = $user;
                }
                else {
                    $newData = array("users" => [$user]);
                }
                $this->putArrayAsJson($newData);
                return true;
            }
            else {
                return false;
            }
        }

        public function read($login) {
            $data = $this->getJsonAsArray();
            foreach($data['users'] as $userData) {
                if($userData['login'] == $login) {
                    return $userData;
                }
            }
            return false;
        }
        public function update($login, $newParams) {
            $data = $this->getJsonAsArray(); 
            foreach($data['users'] as $userData) {
                if($userData['login'] == $login) {
                    foreach($userData as $paramName => $value) {
                        $userData[$paramName] = $value;
                    }
                    $this->putArrayAsJson($data);
                    return true;
                }
            }
            return false;
        }
        public function delete($user) {
            if($this->isUserExists($user)) {
                $data = $this->getJsonAsArray();
                $userNumber = array_search($user, $data['users']);
                array_splice($data, $userNumber, 1);

                $this->putArrayAsJson($data);
                return true;
            }
            else {
                return false;
            }
        }

        private function isUserExists($user) {
            $data = $this->getJsonAsArray();
            if(!$data['users']) {
                return false;
            }
            foreach($data['users'] as $userData) {
                if($userData['login'] == $user['login'] || $userData['email'] == $user['email']) {
                    return true;
                }
            }
            return false;
        }
        
        private function getJsonAsArray() {
            $json = file_get_contents('../DB/users.json');
            $file = json_decode($json, true);
            return $file;
        }
        
        private function putArrayAsJson($data) {
            $json = json_encode($data);
            return file_put_contents('../DB/users.json',$json);
        }
    }
?>

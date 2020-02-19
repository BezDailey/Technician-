<?php 
    class Technician {
        private $techID, $firstName, $lastName, $email, $phone, $password;
        
        public function __construct($techID, $firstName, $lastName, $email, $phone, $password) {
            $this->techID = $techID;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->phone = $phone;
            $this->password = $password;
        }

        public function getFullName() {
            $name = $this->firstName . " " . $this->lastName;
            return $name;
        }

        public function getEmail() {
            $email = $this->email;
            return $email;
        }

        public function getPhone() {
            $phone = $this->phone;
            return $phone;
        }

        public function getPassword() {
            $password = $this->password;
            return $password;
        }

        public function getTechID() {
            $techID = $this->techID;
            return $techID;
        }
    }
?>
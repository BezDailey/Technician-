<?php
    class Field {
        private $name;
        private $message = "";
        private $hasError = false;
        private $value;

        public function __construct($name, $value) {
            $this->name = $name;
            $this->value = $value;
        }

        public function getName() { return $this->name;}
        public function getMessage() { return $this->message;}
        public function hasError() {return $this->hasError;}
        public function getValue() {return $this->value;}

        public function setErrorMessage($message) {
            $this->message = $message;
            $this->hasError = true;
        }

        public function clearErrorMessage() {
            $this->message = '';
            $this->hasError = false;
        }

        public function getHTML() {
            $message = htmlspecialchars($this->message);
            if($this->hasError()) {
                return '<span class="error">' . $message . '</span>';
            } else {
                return '<span>' . $message . '</span>';
            }
        }
    }
?>
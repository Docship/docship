<?php

    final class Validate {

        protected function __construct() {}

        public function isEmptyString($str){

            $result = (empty($str))? true: false;

            return $result;
        }

        public function isValidName($name){
            $result = true;

            if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
                $result = false;
            }

            return $result;
        }

        public function isInvalidEmail($email) {

            $result = true;
    
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $result = false;
            }
    
            return $result;
        }
    }
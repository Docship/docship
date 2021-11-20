<?php

    final class Validate {

        protected function __construct() {}

        public function isEmptyString($str){

            $result = (empty($str))? true: false;

            return $result;
        }

        public function isValidName($name){
            $result = true;

            if(!preg_match("/^[a-z\d]{5,12}$/", $name)){
                $result = false;
            }
            return $result;
        }

        public function isValidEmail($email) {

            $result = true;
    
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $result = false;
            }
    
            return $result;
        }

        public function isValidTelephone($telephone){

            return (strlen($telephone)!=10)?false:true;
        }

        public function isStringMatching($str1 , $str2){

            return ($str1==$str2)?true:false;
        }

        public function isValidPassward($pwd){
            return (strlen($pwd)<8 && !preg_match("/^[\w@-]{8,20}$/" , $pwd))?false:true;
        }

        public function checkPatientRegistrationData(&$data){

            $result = true;

            if($this->isEmptyString($data['fname']) || !$this->isValidName($data['fname'])){
                $result = false;
                $data['fname_err'] = "Invalid Input format";
            }
            if($this->isEmptyString($data['lname']) || !$this->isValidName($data['lname']) ){
                $result = false;
                $data['lname_err'] = "Invalid Input format";
            }
            if($this->isEmptyString($data['email']) || !$this->isValidEmail($data['email'])){
                $result = false;
                $data['email_err'] = "Invalid Email format";
            }
            if($this->isEmptyString($data['telephone']) || !$this->isValidTelephone($data['telephone'])){
                $result = false;
                $data['telephone_err'] = "Invalid Phone Number format";
            }
            if($this->isEmptyString($data['passward']) ||!$this->isValidPassward($data['passward'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if($this->isEmptyString($data['repassward']) ||!$this->isValidPassward($data['repassward'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if(!$this->isStringMatching($data['passward'] , $data['repassword'])){
                $result = false;
                $data['passward_err'] = "Passward and Repassward are not matching each other.";
            }

            return $result;
        }

        public function checkLoginData(&$data){
            $result = true;

            if($this->isEmptyString($data['email']) || !$this->isValidEmail($data['email'])){
                $result = false;
                $data['email_err'] = "Invalid Email format";
            }
            if($this->isEmptyString($data['passward']) ||!$this->isValidPassward($data['passward'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            return $result;

        }
    }
<?php

    final class Validate {

        public function __construct() {}

        public function isEmptyString($str){

            $result = (empty($str))? true: false;

            return $result;
        }

        public function isValidName($name){
            $result = true;

            if(!preg_match("/^[a-z\d]{3,12}$/", $name)){
                $result = false;
            }
            return true;
        }

        public function isValidEmail($email) {

            $result = true;
    
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $result = false;
            }
    
            return $result;
        }

        public function isValidTelephone($telephone){

            return (strlen($telephone)==10)?true:false;
        }

        public function isStringMatching($str1 , $str2){

            return ($str1==$str2)?true:false;
        }

        public function isValidPassward($pwd){
            return (strlen($pwd)<8 && !preg_match("/^[\w@-]{8,20}$/" , $pwd))?false:true;
        }

        public function isValidTime($working_time){
            //validate the time
        }

        public function isValidGender($gender){
            return ($gender=="Male" || $gender=="Female");
        }

        public function isValidNic($nic){
            //nic validation
            //if length == 10 then first 9 must be numerical and last one must be wither V or X or (valid letter)
            //if length == 12 all must be numerical
        }

        public function isValidDate($date){
            //validate the date
        }

        //patient registration validation
        public function checkPatientRegistrationData(&$data){

            $result = true;

            if($this->isEmptyString($data['fname']) || !$this->isValidName($data['fname'])){
                $result = false;
                $data['fname_err'] = "Invalid Input format for First name";
            }
            if($this->isEmptyString($data['lname']) || !$this->isValidName($data['lname']) ){
                $result = false;
                $data['lname_err'] = "Invalid Input format for Last name";
            }
            if($this->isEmptyString($data['email']) || !$this->isValidEmail($data['email'])){
                $result = false;
                $data['email_err'] = "Invalid Email format";
            }
            if(!$this->isValidDate($data['bday'])){
                $result = false;
                $data['bday_err'] = "Invalid Birth date";
            }
            if($this->isEmptyString($data['telephone']) || !$this->isValidTelephone($data['telephone'])){
                $result = false;
                $data['telephone_err'] = "Invalid Phone Number format";
            }
            if($this->isEmptyString($data['gender']) || !$this->isValidGender($data['gender'])){
                $result = false;
                $data['gender_err'] = "Invalid gender";
            }
            if($this->isEmptyString($data['password']) ||!$this->isValidPassward($data['password'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if($this->isEmptyString($data['repassword']) ||!$this->isValidPassward($data['repassword'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if(!$this->isStringMatching($data['password'] , $data['repassword'])){
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
            if($this->isEmptyString($data['password']) ||!$this->isValidPassward($data['password'])){
                $result = false;
                $data['passw0rd_err'] = "Invalid Password format";
            }
            return $result;

        }


        //doctor registration validation
        public function checkDoctorRegistrationData(&$data){

            $result = true;

            if($this->isEmptyString($data['fname']) || !$this->isValidName($data['fname'])){
                $result = false;
                $data['fname_err'] = "Invalid Input format for First name";
            }
            if($this->isEmptyString($data['lname']) || !$this->isValidName($data['lname']) ){
                $result = false;
                $data['lname_err'] = "Invalid Input format for Last name";
            }
            if($this->isEmptyString($data['email']) || !$this->isValidEmail($data['email'])){
                $result = false;
                $data['email_err'] = "Invalid Email format";
            }
            if($this->isEmptyString($data['password']) ||!$this->isValidPassward($data['password'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if($this->isEmptyString($data['repassword']) ||!$this->isValidPassward($data['repassword'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if(!$this->isStringMatching($data['password'] , $data['repassword'])){
                $result = false;
                $data['passward_err'] = "Passward and Repassward are not matching each other.";
            }
            if(!$this->isValidDate($data['bday'])){
                $result = false;
                $data['bday_err'] = "Invalid Birth date";
            }
            if($this->isEmptyString($data['gender']) || !$this->isValidGender($data['gender'])){
                $result = false;
                $data['gender_err'] = "Invalid gender";
            }
            if($data['charge_amount']<0.0){
                $result = false;
                $data['charge_amount_err'] = "Charge amount cannot be lesser than 0.00";
            }
            if($this->isEmptyString($data['category']) || !$this->isValidName($data['category']) ){
                $result = false;
                $data['category_err'] = "Invalid Input format for category";
            }
            if($this->isEmptyString($data['college']) || !$this->isValidName($data['college']) ){
                $result = false;
                $data['college_err'] = "Invalid Input format for college";
            }
            if(!$this->isValidTime($data['working_from'])){
                $result = false;
                $data['working_from_err'] = "Invalid Input format for college 'Working From' time";
            }
            if(!$this->isValidTime($data['working_to'])){
                $result = false;
                $data['working_to_err'] = "Invalid Input format for college 'Working To' time";
            }
            if($this->isEmptyString($data['nic']) || !$this->isValidNic($data['nic']) ){
                $result = false;
                $data['nic_err'] = "Invalid Input format for nic";
            }
            if($data['discount']<0.0){
                $result = false;
                $data['discount_err'] = "Discount cannot be lesser than 0.00";
            }
            if($this->isEmptyString($data['telephone']) || !$this->isValidTelephone($data['telephone'])){
                $result = false;
                $data['telephone_err'] = "Invalid Phone Number format";
            }

            return $result;
        }


        //admin registration validation
        public function checkAdminRegistrationData(&$data){

            $result = true;

            if($this->isEmptyString($data['fname']) || !$this->isValidName($data['fname'])){
                $result = false;
                $data['fname_err'] = "Invalid Input format for First name";
            }
            if($this->isEmptyString($data['lname']) || !$this->isValidName($data['lname']) ){
                $result = false;
                $data['lname_err'] = "Invalid Input format for Last name";
            }
            if($this->isEmptyString($data['email']) || !$this->isValidEmail($data['email'])){
                $result = false;
                $data['email_err'] = "Invalid Email format";
            } 
            if($this->isEmptyString($data['password']) ||!$this->isValidPassward($data['password'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if($this->isEmptyString($data['repassword']) ||!$this->isValidPassward($data['repassword'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if(!$this->isStringMatching($data['password'] , $data['repassword'])){
                $result = false;
                $data['passward_err'] = "Passward and Repassward are not matching each other.";
            }
            if($this->isEmptyString($data['telephone']) || !$this->isValidTelephone($data['telephone'])){
                $result = false;
                $data['telephone_err'] = "Invalid Phone Number format";
            }

            return $result;
        }

        
    }
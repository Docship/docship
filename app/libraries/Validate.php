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

        public function isValidGovRegNo($gov_registration_no_err){
            //gov_registration_no_err validation
        }

        public function isValidDate($date){
            //validate the date
        }

        public function isValidBank($bank_name){
            //put some banks in list
            //check if the given bank is in the list
        }

        public function isValidBankBranch($bank_branch, $bank_name){
            //put {bank(key): branches(values)} in a dictionary
            //and check if the given branch is available for the given bank
        }

        public function isValidBankAccNo($bank_acc_no, $bank_name, $bank_branch){
            //make multiple dictionaries and name their varaible name as bank name
            //make a dictionary as {bankbranch(key): list[prefix, sufix, length](value)}
            //check if bank acc no's prefix, sufix, length is relevent to bank and branch and check length
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
            if($this->isEmptyString($data['gov_registration_no']) || !$this->isValidGovRegNo($data['gov_registration_no']) ){
                $result = false;
                $data['gov_registration_no_err'] = "Invalid Input format for Government Registration No.";
            }
            if($data['discount']<0.0){
                $result = false;
                $data['discount_err'] = "Discount cannot be lesser than 0.00";
            }
            if($this->isEmptyString($data['telephone']) || !$this->isValidTelephone($data['telephone'])){
                $result = false;
                $data['telephone_err'] = "Invalid Phone Number format";
            }


            
            if($this->isEmptyString($data['bank_name']) || !$this->isValidBank($data['bank_name'])){
                $result = false;
                $data['bank_name_err'] = "Invalid Bank name";
            }
            if($this->isEmptyString($data['bank_branch']) || !$this->isValidBankBranch($data['bank_branch'], $data['bank_name'])){
                $result = false;
                $data['bank_branch_err'] = "Invalid Bank branch";
            }
            if($this->isEmptyString($data['bank_acc_no']) || !$this->isValidBankAccNo($data['bank_acc_no'], $data['bank_name'], $data['bank_branch'])){
                $result = false;
                $data['bank_acc_no_err'] = "Invalid Bank account no";
            }
            if($this->isEmptyString($data['total_income']) || $data['total_income']!=0.0){
                $result = false;
                $data['total_income_err'] = "Total income must be 0.0 at the time of the registration.";
            }
            if($this->isEmptyString($data['current_arrears']) || $data['current_arrears']!=0.0){
                $result = false;
                $data['current_arrears_err'] = "Current arrears must be 0.0 at the time of the registration.";
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
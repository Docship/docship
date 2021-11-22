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
            if(strlen($nic)==10){
                $first_letters = substr($nic, 0, strlen($nic)-1);
                $last_letter = substr($nic,strlen($nic)-1);
                $last_letter_valid = $lastLetter==="V" || $lastLetter==="v" || $lastLetter==="X" || $lastLetter==="x";
                if(is_numeric($first_letters) && last_letter_valid){
                    return true;
                }else{
                    return false;
                }
            }if(strlen($nic)==12){
                if(is_numeric($nic)){
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function isValidGovRegNo($gov_registration_no_err){
            return true; //for the instance
            //gov_registration_no_err validation
        }

        public function isValidDate($date){
            //validate the date
        }

        public function isValidBank($bank_name){
            //put some banks in list
            //check if the given bank is in the list

            //$banks = ['BOC', 'Peoples', 'NSB', 'Commercial', 'Sampath'];
            //if $bank_name in $banks return true 
            //else return false

            $banks = array("BOC", "Peoples Bank", "NSB", "Commercial Bank", "Sampath Bank");

            if (in_array($bank_name, $banks)){
                return true;
            }else{
                return false;
            }
        }

        public function isValidBankBranch($bank_branch, $bank_name){
            //put {bank(key): branches(values)} in a dictionary
            //and check if the given branch is available for the given bank

            //$bank_branches = {'BOC' : ['Colombo', 'Negombo', 'Kaluthara', 'Galle'],
            //                 'Peoples': ['Colombo', 'Negombo', 'Kaluthara'],
            //                 'NSB': 'Colombo', 'Negombo', 'Mathara'],
            //                 'Commercial': 'Colombo', 'Negombo', 'Galle'],
            //                 'Sampath' : 'Colombo', 'Negombo', 'Kandy']};
            //
            //if $bank_branch in $bank_branches[$bank_name] return true
            //else return false

        
            $bank_branches = array(
                'BOC' => array('Colombo', 'Negombo', 'Kaluthara', 'Galle'),
                'Peoples' => array('Colombo', 'Negombo', 'Kaluthara'),
                'NSB' => array('Colombo', 'Negombo', 'Mathara'),
                'Commercial Bank' => array('Colombo', 'Negombo', 'Galle'),
                'Sampath Bank' => array('Colombo', 'Negombo', 'Kandy')
            );
            
            if (isset($bank_branches[$bank_name])){
                if (in_array($bank_branch, $bank_branches[$bank_name])){
                    return true;
                }else{
                   return false;
                }
            }else{
                return false;
            }



        }

        public function isValidBankAccNo($bank_acc_no, $bank_name, $bank_branch){
            return true;
            //make multiple dictionaries and name their varaible name as bank name
            //make a dictionary as {bankbranch(key): list[prefix, sufix, length](value)}
            //check if bank acc no's prefix, sufix, length is relevent to bank and branch and check length

            //$BOC_banks = {'Colombo':['001','002',10], 'Negombo':['003','004',10], 
            //              'Kaluthara':['005','006',10], 'Galle':['007','008',10]};
            //$Peoples_banks = {'Colombo':['009','010',9], 'Negombo':['011','012',9], 
            //              'Kaluthara':['013','014',9]};
            //$NSB_banks = {'Colombo':['010','002',10], 'Negombo':['001','113',10], 
            //              'Mathara':['001','150',10]};
            //$Commercial_banks = {'Colombo':['101','002',8], 'Negombo':['111','002',8], 
            //              'Galle':['001','222',8]};
            //$Sampath_banks = {'Colombo':['081','072',12], 'Negombo':['701','902',12], 
            //              'Kandy':['420','097',12]};
            //
            //
            //switch($bank_name){
            //  case 'BOC':
            //      $bank_dictonary = $BOC_banks;
            //      break;
            //  case 'Peoples':
            //      $bank_dictonary = $Peoples_banks;
            //      break;
            //  case 'NSB':
            //      $bank_dictonary = $NSB_banks;
            //      break;
            //  case 'Commercial':
            //      $bank_dictonary = $Commercial_banks;
            //      break;
            //  case 'Sampath':
            //      $bank_dictonary = $Sampath_banks;
            //      break;
            //  defalut:
            //      return false;
            //}
            //
            // $branch = $Sampath_banks[$bank_branch];
            //
            // $prefix = $branch[0];
            // $suffix = $branch[1];
            // $lengthOfAccNo = $branch[2];
            //
            // if $bank_acc_no starts with prefix 
            //          && $bank_acc_no ends with suffix 
            //              && len($bank_acc_no)=$lengthOfAccNo then return true
            // else return false;
            //}
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
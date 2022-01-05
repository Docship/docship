<?php

    final class Validate {

        public function __construct() {}

        public static function isEmptyString($str){

            $result = (empty($str))? true: false;

            return $result;
        }

        public static function isValidName($name){
            $result = false;

            if((preg_match('/^[a-zA-Z0-9]{3,20}$/', $name))){
                $result = true;
            }
            return $result;
        }

        public static function isValidCollege($name){
            $result = false;

            if((preg_match('/^[a-z\d\s]+$/', $name))){
                $result = true;
            }
            return $result;
        }

        public static function isValidEmail($email) {

            $result = true;
    
            if(!filter_var($email, FILTER_VALIDATE_EMAIL) 
                    && !preg_match("/^([a-zA-Z\d\.-]+)(@[a-zA-Z\d-]+)\.([a-zA-Z]+)(\.[a-zA-Z]+)?$/" , $email)){
                $result = false;
            }
    
            return $result;
        }

        public static function isValidTelephone($telephone){

            return (strlen($telephone)==10  && preg_match("/^\d{10}$/" , $telephone) )?true:false;
        }

        public static function isStringMatching($str1 , $str2){

            return ($str1==$str2)?true:false;
        }

        public static function isValidPassward($pwd){
            return (strlen($pwd)<8 && !preg_match("/^[\w@-]{8,20}$/" , $pwd))?false:true;
        }

        public static function isValidTimeFormate($time){
            //validate the time
            //format = 10.21 AM 
            return (!preg_match("/^1?\d.\d\d\s[AP]M$/" , $time))?false:true;
            //return is_object(DateTime::createFromFormat('h:i a', $time));
        }

        public static function isValidTime($time){
            //validate the time
            //format = 10.21 AM 
            //return (!preg_match("/^[0-1]\d\.[0-1]\d (A|P)M/" , $working_time))?false:true;
            return is_object(DateTime::createFromFormat('h:i a', $time));
        }

        public static function isValidGender($gender){
            return ($gender=="Male" || $gender=="Female");
        }

        public static function isValidNic($nic){
            if(strlen($nic)==10){
                $first_letters = substr($nic, 0, strlen($nic)-1);
                $last_letter = substr($nic,strlen($nic)-1);
                $last_letter_valid = $last_letter==="V" || $last_letter==="v" || $last_letter==="X" || $last_letter==="x";
                if(is_numeric($first_letters) && $last_letter_valid){
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

        public static function isValidGovRegNo($gov_registration_no_err){
            return true; //for the instance
            //gov_registration_no_err validation
        }

        public static function isValidDate($date){
            //validate the date
            //format = yyyy-MM-dd
            $date_arr = explode('-', $date);
            $year  = $date_arr[0];
            $month = $date_arr[1];
            $day   = $date_arr[2];

            return checkdate($month, $day, $year);
        }

        public static function getDateNumber($date){
            $weekday = date('l', strtotime($date));
            $map = array(
            "Monday" => 1,
            "Tuesday" => 2,
            "Wednesday" => 3,
            "Thursday" => 4,
            "Friday" => 5,
            "Saturday" => 6,
            "Sunday" => 7
            );

            return $map[$weekday];
        }

        public static function isTimeBetween($t1 , $t2 , $t3){
            $t1 =  date("H:i", strtotime($t1)); 
            $t2 =  date("H:i", strtotime($t2)); 
            $t3 =  date("H:i", strtotime($t3)); 
            $start = strtotime($t1);
            $end = strtotime($t2);
            $time = strtotime($t3);
            
            if($time >= $start && $time <= $end) {
                return true;
            } else {
                return false;
            }
        }

        public static function isValidBank($bank_name){
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

        public static function isValidBankBranch($bank_branch, $bank_name){
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

        public static function isValidBankAccNo($bank_acc_no, $bank_name, $bank_branch){
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

        public static function isValidAmount($amount){
            /*
            // To convert this number to a string:
            $amountString = (string)$amount;
            // Try to convert the string to a float
            $floatVal = floatval($amountString);
            // If the parsing succeeded and the value is not equivalent to an int
            return ($floatVal && intval($floatVal) != $floatVal); //$amount is a float
            */

            
            $amountString = (string)$amount;
            if(!preg_match("/^\d+(\.\d\d?)?$/" , $amountString)){
                return false;
            }
            return true;
        
        }


        //patient registration validation
        public static function checkPatientRegistrationData(&$data){

            $result = true;

            if(self::isEmptyString($data['fname']) || !self::isValidName($data['fname'])){
                $result = false;
                $data['fname_err'] = "Please enter a valid name";
            }
            if(self::isEmptyString($data['lname']) || !self::isValidName($data['lname']) ){
                $result = false;
                $data['lname_err'] = "Please enter a valid name";
            }
            if(self::isEmptyString($data['email']) || !self::isValidEmail($data['email'])){
                $result = false;
                $data['email_err'] = "Please enter a valid email";
            }
            if(!self::isValidDate($data['bday'])){
                $result = false;
                $data['bday_err'] = "Please enter a valid date";
            }
            if(self::isEmptyString($data['telephone']) || !self::isValidTelephone($data['telephone'])){
                $result = false;
                $data['telephone_err'] = "Please enter a valid telephone number";
            }
            if(self::isEmptyString($data['gender']) || !self::isValidGender($data['gender'])){
                $result = false;
                $data['gender_err'] = "Please enter a valid gender";
            }
            if(self::isEmptyString($data['password']) ||!self::isValidPassward($data['password'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if(self::isEmptyString($data['repassword']) ||!self::isValidPassward($data['repassword'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if(!self::isStringMatching($data['password'] , $data['repassword'])){
                $result = false;
                $data['repassward_err'] = "Passward and Repassward are not matching each other.";
            }

            return $result;
        }


        public static function checkLoginData(&$data){
            $result = true;

            if(self::isEmptyString($data['email']) || !self::isValidEmail($data['email'])){
                $result = false;
                $data['email_err'] = "Please enter a valid email";
            }
            if(self::isEmptyString($data['password']) ||!self::isValidPassward($data['password'])){
                $result = false;
                $data['passw0rd_err'] = "Invalid Password format";
            }
            return $result;

        }


        //doctor registration validation
        public static function checkDoctorRegistrationData(&$data){

            $result = true;

            if(self::isEmptyString($data['fname']) || !self::isValidName($data['fname'])){
                $result = false;
                $data['fname_err'] = "Invalid Input format for First name";
            }
            if(self::isEmptyString($data['lname']) || !self::isValidName($data['lname']) ){
                $result = false;
                $data['lname_err'] = "Invalid Input format for Last name";
            }
            if(self::isEmptyString($data['email']) || !self::isValidEmail($data['email'])){
                $result = false;
                $data['email_err'] = "Invalid Email format";
            }
            if(self::isEmptyString($data['password']) ||!self::isValidPassward($data['password'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if(self::isEmptyString($data['repassword']) ||!self::isValidPassward($data['repassword'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if(!self::isStringMatching($data['password'] , $data['repassword'])){
                $result = false;
                $data['passward_err'] = "Passward and Repassward are not matching each other.";
            }
            if(!self::isValidDate($data['bday'])){
                $result = false;
                $data['bday_err'] = "Invalid Birth date";
            }
            if(self::isEmptyString($data['gender']) || !self::isValidGender($data['gender'])){
                $result = false;
                $data['gender_err'] = "Invalid gender";
            }
            if($data['charge_amount']<0.0){
                $result = false;
                $data['charge_amount_err'] = "Charge amount cannot be lesser than 0.00";
            }
            if(self::isEmptyString($data['category']) || !self::isValidName($data['category']) ){
                $result = false;
                $data['category_err'] = "Invalid Input format for category";
            }
            if(self::isEmptyString($data['college']) || !self::isValidCollege($data['college']) ){
                $result = false;
                $data['college_err'] = "Invalid Input format for college";
            }
            if(!self::isValidTimeFormate($data['working_from'])){
                $result = false;
                $data['working_from_err'] = "Invalid Input format for college 'Working From' time";
            }
            if(!self::isValidTimeFormate($data['working_to'])){
                $result = false;
                $data['working_to_err'] = "Invalid Input format for college 'Working To' time";
            }
            if(self::isEmptyString($data['nic']) || !self::isValidNic($data['nic']) ){
                $result = false;
                $data['nic_err'] = "Invalid Input format for nic";
            }
            if(self::isEmptyString($data['gov_registration_no']) || !self::isValidGovRegNo($data['gov_registration_no']) ){
                $result = false;
                $data['gov_registration_no_err'] = "Invalid Input format for Government Registration No.";
            }
            if($data['discount']<0.0){
                $result = false;
                $data['discount_err'] = "Discount cannot be lesser than 0.00";
            }
            if(self::isEmptyString($data['telephone']) || !self::isValidTelephone($data['telephone'])){
                $result = false;
                $data['telephone_err'] = "Invalid Phone Number format";
            }


            
            if(self::isEmptyString($data['bank_name']) || !self::isValidBank($data['bank_name'])){
                $result = false;
                $data['bank_name_err'] = "Invalid Bank name";
            }
            if(self::isEmptyString($data['bank_branch']) || !self::isValidBankBranch($data['bank_branch'], $data['bank_name'])){
                $result = false;
                $data['bank_branch_err'] = "Invalid Bank branch";
            }
            if(self::isEmptyString($data['bank_acc_no']) || !self::isValidBankAccNo($data['bank_acc_no'], $data['bank_name'], $data['bank_branch'])){
                $result = false;
                $data['bank_acc_no_err'] = "Invalid Bank account no";
            }
            if(self::isEmptyString($data['total_income']) || $data['total_income']!=0.0){
                $result = false;
                $data['total_income_err'] = "Total income must be 0.0 at the time of the registration.";
            }
            if(self::isEmptyString($data['current_arrears']) || $data['current_arrears']!=0.0){
                $result = false;
                $data['current_arrears_err'] = "Current arrears must be 0.0 at the time of the registration.";
            }



            return $result;
        }


        //admin registration validation
        public static function checkAdminRegistrationData(&$data){

            $result = true;

            if(self::isEmptyString($data['fname']) || !self::isValidName($data['fname'])){
                $result = false;
                $data['fname_err'] = "Invalid Input format for First name";
            }
            if(self::isEmptyString($data['lname']) || !self::isValidName($data['lname']) ){
                $result = false;
                $data['lname_err'] = "Invalid Input format for Last name";
            }
            if(self::isEmptyString($data['email']) || !self::isValidEmail($data['email'])){
                $result = false;
                $data['email_err'] = "Invalid Email format";
            } 
            if(self::isEmptyString($data['password']) ||!self::isValidPassward($data['password'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if(self::isEmptyString($data['repassword']) ||!self::isValidPassward($data['repassword'])){
                $result = false;
                $data['passward_err'] = "Invalid Passward formt";
            }
            if(!self::isStringMatching($data['password'] , $data['repassword'])){
                $result = false;
                $data['passward_err'] = "Passward and Repassward are not matching each other.";
            }
            if(self::isEmptyString($data['telephone']) || !self::isValidTelephone($data['telephone'])){
                $result = false;
                $data['telephone_err'] = "Invalid Phone Number format";
            }

            return $result;
        }

        public static function checkAppointmentData(&$data){
            $result = true;

            if($data['time']=="" || !self::isValidTimeFormate($data['time'])){
                $result = false;
                $data['time_err'] = "invalid input";
            }
            if($data['date']=="" || !self::isValidDate($data['date'])){
                $result = false;
                $data['date_err'] = "invalid input";
            }
            if($data['charge']=="" || !self::isValidAmount($data['charge'])){
                $result = false;
                if(!($data['doctor']=="" || $data['doctor']=="Doctor")) $data['amount_err'] = "Invalid amount";
            }
            if($data['doctor']=="" || $data['doctor']=="Doctor"){
                $result = false;
                $data['doctor_err'] = "Select doctor";
            }

            return $result;
        }

        
    }
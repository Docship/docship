<?php

    class DoctorModel {

        private $DB;

        public function __construct(){
            $this->DB = LibFactory::getInstance()->getLibrary('Database');
        }


        public function isExistByEmail($email){

            $sql = "SELECT * FROM `doctor` WHERE email='$email'";
            $result = $this->DB->selectAll($sql);
            
            if(($result!=-1)){
                if(sizeof($result)>0){
                    // exist
                    return 1;
                }else {
                    // not exist
                    return 0;
                }
            }else {
                // db error
                return -1;
            }
        }

        public function isExistByNIC($nic){

            $sql = "SELECT * FROM `doctor` WHERE nic='$nic'";
            $result = $this->DB->selectAll($sql);

            
            
            if(($result!=-1)){
                if(sizeof($result)>0){
                    // exist
                    return 1;
                }else {
                    // not exist
                    return 0;
                }
            }else {
                // db error
                return -1;
            }
        }

        public function isExistById($id){

            $sql = "SELECT * FROM `doctor` WHERE id='$id'";
            $result = $this->DB->selectAll($sql);
            
            if(!is_null($result)){
                if(sizeof($result)>0){
                    // exist
                    return 1;
                }else {
                    // not exist
                    return 0;
                }
            }else {
                // db error
                return -1;
            }
        }

        public function findById($id){

            $sql = "SELECT * FROM `doctor` WHERE id='$id'";
            $result = $this->DB->selectAll($sql);
            
            $output = array();
            
            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "invalid_id";
                    $output['value'] = [];
                    // email not exist
                    return $output;
                }else {
                    $output['value'] = $result[0];
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function findByNICAll($nic){

            $sql = "SELECT * FROM `doctor` WHERE nic='$nic'";
            $result = $this->DB->selectAll($sql);
            
            $output = array();
            
            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "invalid_nic";
                    $output['value'] = [];
                    // email not exist
                    return $output;
                }else {
                    $output['value'] = $result;
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function findByEmailAll($email){

            $sql = "SELECT * FROM `doctor` WHERE email='$email'";
            $result = $this->DB->selectAll($sql);
            
            $output = array();
            
            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "invalid_email";
                    $output['value'] = [];
                    // email not exist
                    return $output;
                }else {
                    $output['value'] = $result;
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function findByEmailAndPassword($email, $pwd){
            $sql = "SELECT * FROM `doctor` WHERE email='$email'";
            $result = $this->DB->selectOne($sql);

            $output = array();
            
            if($result!=-1){
                if(is_null($result)){
                    $output['error'] = "invalid_email";
                    $output['value'] = [];
                    // email not exist
                    return $output;
                }
                $doctor = $result;
                $password = $doctor['pwd'];
                $pwdmatch = password_verify($pwd , $password);
                if($pwdmatch){
                    // patient
                    $output['value'] = $doctor;
                    // email not exist
                    return $output;
                }else {
                    // pwd not match with email
                    $output['error'] = "wrong_password";
                    $output['value'] = [];
                    // email not exist
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function insert($data){

            $sql_user = "INSERT INTO `user`(`role`) VALUES ('doctor')";
            $result1 = $this->DB->insert($sql_user , [] , "user");
            sleep(0.5);
            if($result1==0){
                $user_result = $this->DB->getLast("user");

                if($user_result!=-1 && !empty($user_result)){
                    $user = $user_result[0];
                    $uid = $user['id'];

                    
                    $firstname = ucwords($data['fname']);
                    $lastname = ucwords($data['lname']);
                    $email = $data['email'];
                    $pwd = $data['hash_pwd'];
                    $bday = $data['bday'];
                    $gender = $data['gender'];
                    $charge_amount = $data['charge_amount'];
                    $category = $data['category'];
                    $college = $data['college'];
                    $working_from = $data['working_from_24hrs'];
                    $working_to = $data['working_to_24hrs'];
                    $working_days = $data['working_days'];
                    $nic = $data['nic'];
                    //$gov_registration_no = $data['gov_registration_no'];
                    $discount = $data['discount'];
                    $telephone = $data['telephone'];
                    $bank_name = $data['bank_name'];
                    $bank_branch = $data['bank_branch'];
                    $bank_acc_no = $data['bank_acc_no'];
                    $total_income = $data['total_income'];
                    $current_arrears = $data['current_arrears'];

                    $sql = "INSERT INTO `doctor` (user_id ,firstname, lastname, email, pwd, bday, gender, charge_amount, category, 
                        working_from, working_to, working_days, nic, discount, telephone, bank_name, 
                            bank_branch, bank_acc_no, total_income, current_arrears , college) 
                                VALUES ($uid , '$firstname' , '$lastname' , '$email' , '$pwd' , 
                                    '$bday' , '$gender' ,$charge_amount, '$category', '$working_from', 
                                        '$working_to', '$working_days' , '$nic', $discount, '$telephone', 
                                            '$bank_name', '$bank_branch', '$bank_acc_no', $total_income, $current_arrears , '$college')";

                    $result = $this->DB->insert($sql , [] , 'doctor');

                    return $result;
                }else {
                    return -1;
                }
            }else {
                return $result1;
            }

            $firstname = $data['fname'];
            $lastname = $data['lname'];
            $email = $data['email'];
            $pwd = $data['hash_pwd'];
            $bday = $data['bday'];
            $gender = $data['gender'];
            $charge_amount = $data['charge_amount'];
            $category = $data['category'];
            $college = $data['college'];
            $working_from = $data['working_from_24hrs'];
            $working_to = $data['working_to_24hrs'];
            $working_days = $data['working_days'];
            $nic = $data['nic'];
            //$gov_registration_no = $data['gov_registration_no'];
            $discount = $data['discount'];
            $telephone = $data['telephone'];
            $bank_name = $data['bank_name'];
            $bank_branch = $data['bank_branch'];
            $bank_acc_no = $data['bank_acc_no'];
            $total_income = $data['total_income'];
            $current_arrears = $data['current_arrears'];

            $sql = "INSERT INTO `doctor` (firstname, lastname, email, pwd, bday, gender, charge_amount, category, 
                        working_from, working_to, working_days, nic, discount, telephone, bank_name, 
                            bank_branch, bank_acc_no, total_income, current_arrears , college) 
                                VALUES ('$firstname' , '$lastname' , '$email' , '$pwd' , 
                                    '$bday' , '$gender' ,$charge_amount, '$category', '$working_from', 
                                        '$working_to', '$working_days' , '$nic', $discount, '$telephone', 
                                            '$bank_name', '$bank_branch', '$bank_acc_no', $total_income, $current_arrears , '$college')";
            /*
            $data1 = array();
            $data1['sql'] = $sql;
            include_once '../app/views/' . "admin/dumy" . '.php';
            return;
            */
            $result = $this->DB->insert($sql , [] , 'doctor');

            return $result;

        }

        public function isDoctorWroking($id , $date , $time=null){
            $sql = "SELECT * FROM `doctor` WHERE id='$id'";
            $result = $this->DB->selectOne($sql);

            $output = array();

            if(!is_null($result)){
                $doctor = $result;

                if(empty($doctor)){
                    $output['error'] = "not exist doctor";
                    $output['value'] = false;
                    return $output;
                }else {
                    $working_days = $doctor['working_days'];
                    $day = Date::getDateNumber($date);

                    if(strpos($working_days, strval($day))){
                        $r = Date::isTimeBetween($doctor['working_from'] , $doctor['working_to'] , $time);
                        if($r==true){
                            $output['value'] = true;
                            return $output;
                        }else {
                            $output['error'] = "not exist time";
                            $output['value'] = false;
                            return $output;
                        }
                    }else {
                        $output['error'] = "not exist day";
                        $output['value'] = false;
                        return $output;
                    }
                }
            }else {
                $output['error'] = "system error";
                return $output;
            }

        }

        public function getAll(){
            $sql = "SELECT * FROM `doctor` WHERE 1";
            $result = $this->DB->selectAll($sql);
            return $result;
        }

        public function delete($id){
            $sql = "DELETE FROM `doctor` WHERE id='$id'";
            $result = $this->DB->delete($sql);
            return $result;
        }


    }
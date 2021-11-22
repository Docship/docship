<?php

    class AdminModel {

        private $DB;

        public function __construct(){
            $this->DB = LibFactory::getInstance()->getLibrary('Database');
        }


        public function isExistByEmail($email){

            $sql = "SELECT * FROM `admin` WHERE email='$email'";
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

        public function findByEmailAndPassword($email, $pwd){
            $sql = "SELECT * FROM `admin` WHERE email='$email'";
            $result = $this->DB->selectOne($sql);

            $output = array();
            
            if(!is_null($result)){
                if(empty($result)){
                    $output['error'] = "invalid_email";
                    $output['value'] = [];
                    // email not exist
                    return $output;
                }
                $patient = $result;
                $password = $patient['pwd'];
                $pwdmatch = password_verify($pwd , $password);
                if($pwdmatch){
                    // patient
                    $output['value'] = $patient;
                    // email not exist
                    return $output;
                }else {
                    // pwd not match with email
                    $output['error'] = "wrong_password";
                    // email not exist
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

    }
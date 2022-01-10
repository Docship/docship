<?php

    class PatientModel {

        private $DB;

        public function __construct(){
            $this->DB = LibFactory::getInstance()->getLibrary('Database');
        }


        public function isExistByEmail($email){

            $sql = "SELECT * FROM `patient` WHERE email='$email'";
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
            $sql = "SELECT * FROM `patient` WHERE email='$email'";
            $result = $this->DB->selectAll($sql);

            $output = array();
            
            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "invalid_email";
                    $output['value'] = [];
                    // email not exist
                    return $output;
                }
                $patient = $result[0];
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

        public function findById($id){
            $sql = "SELECT * FROM `patient` WHERE id='$id'";
            $result = $this->DB->selectAll($sql);
            $output = [];
            
            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "invalid_id";
                    $output['value'] = [];
                    // email not exist
                    return $output;
                }
                $patient = $result[0];
                $output['value'] = $patient;
                return $output;
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function findByemail($email){
            $sql = "SELECT * FROM `patient` WHERE email='$email'";
            $result = $this->DB->selectAll($sql);
            $output = [];
            
            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "invalid_email";
                    $output['value'] = [];
                    // email not exist
                    return $output;
                }
                $patient = $result[0];
                $output['value'] = $patient;
                return $output;
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function insert($data){

            $firstname = ucwords($data['fname']);
            $lastname = ucwords($data['lname']);


            $sql_user = "INSERT INTO `user`(`role`, `firstname`, `lastname`) VALUES ('patient' , '$firstname' , '$lastname')";
            $result1 = $this->DB->insert($sql_user , [] , "user");
            sleep(0.5);
            if($result1==0){
                $user_result = $this->DB->getLast("user");

                if($user_result!=-1 && !empty($user_result)){
                    $user = $user_result[0];
                    $uid = $user['id'];

                    
                    $email = $data['email'];
                    $pwd = $data['hash_pwd'];
                    $bday = $data['bday'];
                    $gender = $data['gender'];
                    $telephone = $data['telephone'];

                    $sql = "INSERT INTO `patient` (user_id , firstname, lastname, email, pwd, bday, gender, telephone) VALUES ($uid , '$firstname' , '$lastname' , '$email' , '$pwd' , '$bday' , '$gender' , '$telephone')";

                    $result = $this->DB->insert($sql , [] , 'patient');

                    return $result;
                }else {
                    return -1;
                }
            }else {
                return $result1;
            }


        } 

        public function update($data){

            $id = $data['id'];
            $firstname = $data['fname'];
            $lastname = $data['lname'];
            $email = $data['email'];
            $pwd = $data['hash_pwd'];
            $bday = $data['bday'];
            $gender = $data['gender'];
            $telephone = $data['telephone'];

            $sql = "UPDATE `patient` SET `firstname`=$firstname,`lastname`=$lastname,`email`=$email,`pwd`=$pwd,`bday`=$bday,`gender`=$gender,`telephone`=$telephone WHERE id=$id";

            $result = $this->DB->update($sql , [] , 'patient');

            return $result;

        }



        public function getAll(){
            $sql = "SELECT * FROM `patient` WHERE 1";
            $result = $this->DB->selectAll($sql);
            return $result;
        }

        public function delete($id){
            $sql = "DELETE FROM `patient` WHERE id='$id'";
            $result = $this->DB->delete($sql);
            return $result;
        }

        public function getUID($id){
            $sql = "SELECT * FROM `patient` WHERE id='$id'";

            $result = $this->DB->selectAll($sql);
            $output = [];
            
            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "invalid_email";
                    $output['value'] = [];
                    // email not exist
                    return $output;
                }
                $patient = $result[0];
                $output['value'] = $patient;
                return $output;
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }


        }

        
    }
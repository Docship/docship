<?php

    class PatientModel {

        private $DB;

        protected function __construct(){
            $DB = LibFactory::getInstance()->getLibrary('Database');
        }


        public function isPatientExist($email , $pwd){

            $sql = "SELECT * from patient where email=:email and pwd=:pwd";
            $stmt = $this->DB->query($sql);

            $lst = array(
                array(':email' , $email),
                array(':pwd' , $pwd)
            );
            $result = $this->DB->bindMultiple($stmt , $lst);
            if($result!=ERR_DB){
                $stmt = $result;

                $output = $this->DB->rowCount($stmt);
                if($output!=ERR_DB && $output>0){
                    return PASS;
                }else if($output==ERR_DB){
                    return ERR_DB;
                }else {
                    return FAIL;
                }
                
            }else return ERR_DB;

            
        }

        // $data is associative array
        public function insertPatient($data){

            $sql = "INSERT INTO patient (firstname, lastname, email, pwd, bday, gender, telephone) VALUES (:firstname , :lastname , :email , :pwd , :bday , :gender , :telephone)";

            $stmt = $this->DB->query($sql);

            $lst = array(
                array(':firstname' , $data['fname']),
                array(':lastname' , $data['lname']),
                array(':email' , $data['email']),
                array(':pwd' , $data['pwd']),
                array(':bdat' , $data['bday']),
                array(':gender' , $data['gender']),
                array(':telephone' , $data['telephone'])
            );
            $result = $this->DB->bindMultiple($stmt , $lst);

            if($result!=ERR_DB){
                $stmt = $result;
                $this->DB->execute($stmt);
                return PASS;
            }else {
                return ERR_DB;
            }


        }

        public function getPatientByEmailAndPassward($email , $pwd){
            $sql = "SELECT * from patient where email=:email and pwd=:pwd";
            $stmt = $this->DB->query($sql);

            $lst = array(
                array(':email' , $email),
                array(':pwd' , $pwd)
            );
            $result = $this->DB->bindMultiple($stmt , $lst);
            if($result!=ERR_DB){
                $stmt = $result;
                $obj = $this->DB->singleResult($stmt);

                if(!is_null($obj) && $obj!=ERR_DB){
                    $patient = $obj;
                    return $patient;
                }else if(is_null($obj)){
                    return NULL;
                }else {
                    return ERR_DB;
                }
                
            }else return ERR_DB;
        }
    }
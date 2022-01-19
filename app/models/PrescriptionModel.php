<?php

    class PrescriptionModel {

        private $DB;

        public function __construct(){
            $this->DB = LibFactory::getInstance()->getLibrary('Database');
        }


        public function isExistById($id){

            $sql = "SELECT * FROM `prescription` WHERE id='$id'";
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
            $sql = "SELECT * FROM `prescription` WHERE id='$id'";
            $result = $this->DB->selectOne($sql);

            $output = array();
            
            if(!is_null($result)){
                if(empty($result)){
                    $output['error'] = "invalid_id";
                    $output['value'] = [];
                    // prescription not exist
                    return $output;
                }else{
                    // prescription exist
                    $output['value'] = $result;
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function insert($data){

            $patient_id  = $data['patient_id '];
            $description = $data['description'];
            $issue_date = $data['issue_date'];    

            $sql = "INSERT INTO `prescription` (`patient_id` , `description`, `issue_date`) 
                        VALUES ('$patient_id ' , '$description' ,'$issue_date')";

            $result = $this->DB->insert($sql , [] , 'prescription');

            return $result;

        }

        public function findByPatientId($patientid){
            $sql = "SELECT * FROM `prescription` WHERE patient_id=$patientid";
            $result = $this->DB->selectAll($sql);

            $output = array();
            /*
            include_once '../app/views/' . "pages/dumy" . '.php';
            die();
            */

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "empty";
                    $output['value'] = [];
                    // prescriptions not exist
                    return $output;
                }else{
                    // prescriptions exist
                    $output['value'] = $result;
                    return $output;
                }
                
            }else {
                // db error
                $output['error'] = "system_error";
                return $output; 
            }
        }

        public function findByDoctorId($doctorid){
            $sql = "SELECT * FROM `prescription` WHERE doctor_id=$doctorid";
            $result = $this->DB->selectAll($sql);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "empty";
                    $output['value'] = [];
                    // prescriptions not exist
                    return $output;
                }else{
                    // prescriptions exist
                    $output['value'] = $result;
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function getAll(){
            $status = false;
            $sql = "SELECT * FROM `prescription`";
            $result = $this->DB->selectAll($sql);
            return $result;
        }

        public function getLimited($limit){
            $status = false;
            $sql = "SELECT * FROM `prescription` WHERE `is_exit`='$status' LIMIT '$limit'";
            $result = $this->DB->selectAll($sql);
            return $result;
        }
    }
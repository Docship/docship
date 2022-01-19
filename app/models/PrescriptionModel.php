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

        public function findByIdForDoctor($id){
            $sql = "SELECT * FROM `prescription` WHERE id='$id'";

            $sql1 = "SELECT prescription.id , prescription.doctor_id , prescription.subject , prescription.description , prescription.issue_date , patient.firstname , patient.lastname FROM prescription INNER JOIN patient ON prescription.patient_id = patient.id WHERE prescription.id=$id";

            $result = $this->DB->selectAll($sql1);

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

        public function findByIdForPatient($id){
            $sql = "SELECT * FROM `prescription` WHERE id='$id'";

            $sql1 = "SELECT prescription.id , prescription.doctor_id , prescription.subject , prescription.description , prescription.issue_date , doctor.firstname , doctor.lastname , doctor.telephone FROM prescription INNER JOIN doctor ON prescription.doctor_id = doctor.id WHERE prescription.id=$id";

            $result = $this->DB->selectAll($sql1);

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

        public function insert($data){

            $patient_id  = $data['patient_id '];
            $description = $data['description'];
            $issue_date = $data['issue_date'];
            $doctor_id = $data['doctor_id'];
            $subject = $data['subject'];    

            $sql = "INSERT INTO `prescription` (`patient_id` , `doctor_id` , `description`, `issue_date` , `subject`) 
                        VALUES ('$patient_id' , '$doctor_id' , '$description' ,'$issue_date' , '$subject')";

            $result = $this->DB->insert($sql , [] , 'prescription');

            return $result;

        }

        public function update($data){

            $patient_id  = $data['patient_id'];
            $description = $data['desc'];
            $issue_date = $data['issue_date'];
            $subject = $data['subject'];
            $doctor_id = $data['doctor_id'];
            $id = $data['id'];

            $sql = "UPDATE `prescription` SET `doctor_id`=$doctor_id,`patient_id`=$patient_id,`subject`='$subject',`description`='$description',`issue_date`='$issue_date' WHERE id=$id";

            

            $result = $this->DB->update($sql , [] , 'prescription');

            return $result;
        }

        public function findByPatientId($patientid){
            $sql = "SELECT * FROM `prescription` WHERE patient_id=$patientid";

            $sql1 = "SELECT prescription.id , prescription.doctor_id , prescription.subject , prescription.description , prescription.issue_date , doctor.firstname FROM prescription INNER JOIN doctor ON
            prescription.doctor_id = doctor.id WHERE prescription.patient_id=$patientid";

            $result = $this->DB->selectAll($sql1);

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
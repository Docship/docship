<?php

    class AppointmentModel {

        private $DB;

        public function __construct(){
            $this->DB = LibFactory::getInstance()->getLibrary('Database');
        }


        public function isExistById($id){

            $sql = "SELECT * FROM `appointment` WHERE id='$id'";
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
            $sql = "SELECT * FROM `appointment` WHERE id='$id'";
            $result = $this->DB->selectOne($sql);

            $output = array();
            
            if(!is_null($result)){
                if(empty($result)){
                    $output['error'] = "invalid_id";
                    $output['value'] = [];
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
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

            $patient_id = $data['patient_id'];
            $doctor_id = $data['doctor_id'];
            $time = $data['time'];
            $date = $data['date'];
            $receipt_id = $data['receipt_id'];
            $prescription_id  = $data['prescription_id'];
            $is_paid  = $data['is_paid'];
            $status  = $data['status'];
            $description = $data['description'];
            

            $sql = "INSERT INTO `appointment` (patient_id, doctor_id, time, date, 
                        receipt_id, prescription_id, is_paid, status, description) 
                            VALUES ('$patient_id' , '$doctor_id' , '$time' , '$date' , 
                                '$receipt_id' , '$prescription_id' , '$is_paid' , '$status' , '$description')";

            $result = $this->DB->insert($sql);

            return $result;

        }
    }
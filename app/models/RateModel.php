<?php

    class RateModel {

        private $DB;

        public function __construct(){
            $this->DB = LibFactory::getInstance()->getLibrary('Database');
        }

        public function getTotalRateCountByDoctor($doctor_id){
            
            $sql = "SELECT * FROM `rate` WHERE `doctor_id`=$doctor_id";

            $result = $this->DB->selectAll($sql);


            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "empty";
                    $output['value'] = 0;
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
                    $output['value'] = sizeof($result);
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }

            return $output;
        }

        public function getTotalRatingByDoctor($doctor_id){
            
            $sql = "SELECT AVG(value) FROM rate WHERE `doctor_id`=$doctor_id";

            $result = $this->DB->execute($sql);


            $output = array();

            if($result!=-1){
                $output['value'] = $result;
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }

            return $output;
        }

        public function insert($data){

            $value = $data['value'];
            $doctor_id = $data['doctor_id'];
            $patient_id = $data['patient_id'];

            $sql = "INSERT INTO `rate`(`patient_id`, `doctor_id`, `value`) VALUES ($patient_id,$doctor_id,$value)";

            $result = $this->DB->insert($sql , [] , 'rate');

            return $result;
        }

        

    }
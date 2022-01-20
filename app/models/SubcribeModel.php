<?php

    class SubcribeModel {

        private $DB;

        public function __construct(){
            $this->DB = LibFactory::getInstance()->getLibrary('Database');
        }

        public function isDoctorSubcribed($doctor_id , $patient_id){
            
            $sql = "SELECT * FROM `subcriber` WHERE `doctor_id`=$doctor_id AND `patient_id`=$patient_id";

            $result = $this->DB->selectAll($sql);


            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "empty";
                    $output['value'] = 1; // false
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
                    $output['value'] = 0; // true
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }

            return $output;
        }


        public function insert($data){

            $doctor_id = $data['doctor_id'];
            $patient_id = $data['patient_id'];

            $sql = "INSERT INTO `subcriber`(`patient_id`, `doctor_id`) VALUES ($patient_id,$doctor_id)";

            $result = $this->DB->insert($sql , [] , 'rate');

            return $result;
        }

        public function delete($data){
            $doctor_id = $data['doctor_id'];
            $patient_id = $data['patient_id'];
            $sql = "DELETE FROM `subcriber` WHERE `doctor_id`=$doctor_id AND `patient_id`=$patient_id";
            $result = $this->DB->delete($sql);
            return $result;
        }

        

    }
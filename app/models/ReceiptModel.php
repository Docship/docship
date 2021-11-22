<?php

    class ReceiptModel {

        private $DB;

        public function __construct(){
            $this->DB = LibFactory::getInstance()->getLibrary('Database');
        }


        public function isExistById($id){

            $sql = "SELECT * FROM `receipt` WHERE id='$id'";
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
            $sql = "SELECT * FROM `receipt` WHERE id='$id'";
            $result = $this->DB->selectOne($sql);

            $output = array();
            
            if(!is_null($result)){
                if(empty($result)){
                    $output['error'] = "invalid_id";
                    $output['value'] = [];
                    // receipt not exist
                    return $output;
                }else{
                    // receipt exist
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

            $appointment = $data['appointment'];
            $discount = $data['discount'];
            $amount = $data['amount'];
            $current_paid = $data['current_paid'];
            $issue_date = $data['issue_date'];
            $description = $data['description'];
            $is_complete = $data['is_complete'];
        

            $sql = "INSERT INTO `receipt` (appointment, discount, amount, current_paid, issue_date, description, is_complete) VALUES ('$appointment' , '$discount' , '$amount' , '$current_paid' , '$issue_date' , '$description' ,'$is_complete')";

            $result = $this->DB->insert($sql);

            return $result;

        }
    }
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

            $id = $data['id'];
            $patient_id = $data['patient_id'];
            $bank_name = $data['bank_name'];
            $bank_branch = $data['bank_branch'];
            $bank_acc_no = $data['bank_acc_no'];
            $discount = $data['discount'];
            $amount = $data['amount'];
            $issue_date = $data['issue_date'];
            $expiry_date = $data['expiry_date'];
            $description = $data['description'];
            $total = $data['total'];
            $is_complete = $data['is_complete'];
        

            $sql = "INSERT INTO `receipt` (id , patient_id, bank_name, bank_branch, bank_acc_no, 
                        discount, amount, issue_date, expiry_date, description, total, is_complete) 
                            VALUES ('$id' , '$patient_id' , '$bank_name' , '$bank_branch' , '$bank_acc_no' , 
                                '$discount' , '$amount' , $issue_date , $expiry_date , '$description' ,$total ,$is_complete)";



            $result = $this->DB->insert($sql , [] , 'receipt');

            
            /*
            $data1 = array();

            $data1['data'] = $data;
            $data1['sql'] = $sql;
            $data1['result'] = $result;

            include_once '../app/views/' . "pages/dumy" . '.php';
            
            */
            
            return $result;

        }

        public function delete($id){
            $sql = "DELETE FROM `receipt` WHERE id='$id'";
            $result = $this->DB->delete($sql);

            return $result;
        }

        public function getLastRowId(){
            $sql = "SELECT * FROM `receipt` ORDER BY id DESC LIMIT 0, 1";

            $result = $this->DB->selectAll($sql);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    //$output['error'] = "empty";
                    $output['value'] = 0;
                    return $output;
                }else{
                    
                    $output['value'] = $result[0]['id'];
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }


    }
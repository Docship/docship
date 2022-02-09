<?php

    class UserModel {

        private $DB;

        public function __construct(){
            $this->DB = LibFactory::getInstance()->getLibrary('Database');
        }

        public function findById($id){
            $sql = "SELECT * FROM `user` WHERE id='$id'";
            $result = $this->DB->selectAll($sql);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "invalid_id";
                    $output['value'] = [];
                    // appointment not exist
                    return $output;
                }else{
                    // appointment exist
                    $output['value'] = $result[0];
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        

    }
<?php

    class MessageModel {

        private $DB;

        public function __construct(){
            $this->DB = LibFactory::getInstance()->getLibrary('Database');
        }

        public function insert($data){

            $sender = $data['sender_id'];
            $receiver = $data['receiver_id'];
            $msg = $data['msg'];

            $sql = "INSERT INTO `message`(`sender`, `receiver`, `text`) VALUES ($sender , $receiver, '$msg')";

            $result = $this->DB->insert($sql , [] , 'message');

            return $result;
        }

        public function getBySenderAndReceiver($sender, $receiver){

            $sql = "SELECT * FROM message
            WHERE (sender = {$sender} AND receiver = {$receiver})
                OR (sender = {$receiver} AND receiver = {$sender}) ORDER BY id";


            $result = $this->DB->selectAll($sql);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "empty";
                    $output['value'] = [];
                    return $output;
                }else{
                    
                    $output['value'] = $result;
                    return $output;
                }
            }else {
                // db error
                $output['error'] = "system_error";
                return $output;
            }
        }

        public function getChatBotId(){

            $sql = "SELECT * FROM `user` WHERE role='chat_admin'";

            $result = $this->DB->selectAll($sql);

            $output = array();

            if($result!=-1){
                if(empty($result)){
                    $output['error'] = "empty";
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
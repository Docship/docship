<?php
  class Message extends Controller {

    public function __construct(){
     
    }

    // handle ajax call here
    public function send($params){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            

            
            

            //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = array();


            //$data['msg'] = trim($_POST['message']);
            $param = file_get_contents( "php://input" );
            $data['msg'] = json_decode( $param);

            if(empty($params)){
                echo json_encode(array('status' => "fail"));
            }else {

               
                $role = $params;

                $model = $this->model("message");

                $chat_botID = $model->getChatBotId()['value'];

                if($chat_botID<1){
                    echo json_encode(array('status' => "fail"));
                }
                else if($role == 'admin'){

                }
                else if($role == 'patient' || $role == 'doctor'){
                    $user_result = $this->model($_SESSION['role'])->findById($_SESSION['user_id']);
                    $sender_id = $user_result['value']['user_id'];
                    $data['sender_id'] = $sender_id;
                    $data['receiver_id'] = $chat_botID;

                    $result = $model->insert($data);

                    if($result==0){
                        echo json_encode(array('status' => "success"));
                    }else {
                        echo json_encode(array('status' => "fail"));
                    }

                }
            }
            
        }
    }

    public function load($params){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //echo json_encode(array('status' => "success" , 'messages' => ""));

            

            if(empty($params)){
                echo json_encode(array('status' => "fail" , 'messages' => ""));
            }else {

               
                $role = $params;

                $model = $this->model("message");

                $chat_botID = $model->getChatBotId()['value'];

                if($chat_botID<1){
                    echo json_encode(array('status' => "fail" , 'messages' => ""));
                }
                else if($role == 'admin'){

                }
                else if($role == 'patient' || $role == 'doctor'){
                    
                    $result = $this->createChatMessages($chat_botID);

                    if($result!=""){
                        if($result=="None"){
                            echo json_encode(array('status' => "success" , 'messages' => ""));
                        }else {
                            echo json_encode(array('status' => "success" , 'messages' => $result));
                        }
                        //echo json_encode(array('status' => "success" , 'messages' => $result));
                    }else {
                        echo json_encode(array('status' => "fail" , 'messages' => ""));
                    }

                }
            }
            
        }
    }

    private function createChatMessages($chat_botID){

        // get current user uid
        $user_result = $this->model($_SESSION['role'])->findById($_SESSION['user_id']);

        if(isset($user_result['value']) && !empty($user_result['value'])){

            $uid = $user_result['value']['user_id'];

            $msg_result = $this->model('message')->getBySenderAndReceiver($uid , $chat_botID);

            //echo json_encode(array('status' => "success" , 'messages' => $msg_result));

            if(isset($msg_result['value']) && !empty($msg_result['value'])){
                $output = "";
                $messages = $msg_result['value'];
                foreach($messages as $message){
                    if($message['sender']==$uid){
                        $output .= '<p class="from-me">'. $message['text'] .'</p>';
                    }else {
                        $output .= '<p class="from-them">'. $message['text'] .'</p>';
                    }
                }
                return $output;
            }else {
                return "None";
            }

        }

        return "";
    }
  }
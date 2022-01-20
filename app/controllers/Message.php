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
            $data['msg'] = json_decode($param);

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
                    
                    
                    $data['sender_id'] = $chat_botID;
                    //$data['receiver_id'] = intval($user_id);

                    $result = $model->insert($data);

                    if($result==0){
                        echo json_encode(array('status' => "success" , 'user_id' => $params));
                    }else {
                        echo json_encode(array('status' => "fail"));
                    }
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

    public function send_admin($params){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = array();


            //$data['msg'] = trim($_POST['message']);
            $param = file_get_contents( "php://input" );
            $data['msg'] = json_decode($param);

            if(empty($params)){
                echo json_encode(array('status' => "fail"));
            }else {

                $user_id = $params;

                $model = $this->model("message");

                $chat_botID = $model->getChatBotId()['value'];

                if($chat_botID<1){
                    echo json_encode(array('status' => "fail"));
                    return;
                }
                $data['sender_id'] = $chat_botID;
                $data['receiver_id'] = intval($user_id);

                $result = $model->insert($data);

                if($result==0){
                    echo json_encode(array('status' => "success"));
                }else {
                    echo json_encode(array('status' => "fail"));
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
                    $url_components = parse_url($_POST['url']);
                    parse_str($url_components['query'], $params);
                    $user_id = $params['user'];

                    $result = $this->createChatMessagesAdmin($_SESSION['user_uid'] , intval($user_id));

                    echo json_encode(array('status' => "success" , 'messages' => $result));
                   
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

    public function load_admin($params){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //echo json_encode(array('status' => "success" , 'messages' => ""));

            
            if(empty($params)){
                echo json_encode(array('status' => "fail" , 'messages' => ""));
            }else {

                $user_id = $params;

                $model = $this->model("message");

                $chat_botID = $model->getChatBotId()['value'];

                if($chat_botID<1){
                    echo json_encode(array('status' => "fail" , 'messages' => ""));
                }
                $result = $this->createChatMessagesAdmin($_SESSION['user_uid'] , intval($user_id));

                echo json_encode(array('status' => "success" , 'messages' => $result));
                
            }
            
        }
    }

    // chat message load for admin
    public function chat($user_id){
        $chat_botID = $this->model('message')->getChatBotId()['value'];
        if(isset($_SESSION['role']) && !($_SESSION['role'] == 'chat_admin') && $_SESSION['user_id'] != $chat_botID){
            redirect('pages/prohibit?user='.$_SESSION['role']);
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        }else {
           $messages = $this->createChatMessagesAdmin($_SESSION['user_uid'] , intval($user_id));
           $data = array();
           $data['messages'] = $messages;

           $result_user = $this->model('user')->findById($user_id);
           $data['user'] = $result_user['value'];
           $this->view('admin/messages' , $data);

        }
    }

    public function admin_panel(){
        $chat_botID = $this->model('message')->getChatBotId()['value'];
        if(isset($_SESSION['role']) && !($_SESSION['role'] == 'chat_admin') && $_SESSION['user_id'] != $chat_botID){
            echo json_encode(array('status' => "fail" , 'messages' => '<p>System failure</p>'));
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $result = $this->model('message')->getSendersForChatBot();
            $data = array();
            if(isset($result['value'])){
                $data['users'] = $result['value'];
                $output = $this->createChatPanelForAdmin($data['users']);
                echo json_encode(array('status' => "success" , 'messages' => $output));
            }else {
                echo json_encode(array('status' => "success" , 'messages' => '<p>System failure</p>'));
            }
        }else {
            

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

    private function createChatMessagesAdmin($chat_botID , $user_id){
        $result_msg = $this->model('message')->getBySenderAndReceiver($chat_botID , $user_id);


        if(isset($result_msg['value']) && !empty($result_msg['value'])){
            $output = "";
            $messages = $result_msg['value'];
            foreach($messages as $message){
                if($message['sender']==$chat_botID){
                    $output .= '<p class="from-me">'. $message['text'] .'</p>';
                }else {
                    $output .= '<p class="from-them">'. $message['text'] .'</p>';
                }
            }
            
            return $output;
        }else {
            return "";
        }
    }

    private function createChatPanelForAdmin($users){
        $output = "";
        foreach($users as $user){
                $output.= '<a class="row align-items-center py-2 border-bottom mx-0 text-decoration-none" href="'.URLROOT.'/message/chat/'.$user['id'].'">
                <div class="col-2 p-0 d-flex justify-content-center">
                    <img src="'.URLROOT.'/img/user.png" alt="" width="45px" height="45px" class="rounded-circle" />
                </div>
                <div class="col-9 px-4">
                    <p class="my-0 lh-1 font-weight-bold text-dark">'.$user['firstname'].' '.$user['lastname'].'</p>
                    <p class="my-0 lh-1 fw-light text-dark">'.$user['role'].'</p>
                </div>
            </a> ';
        }

        if(empty($output)){
            $output = '<p>No any message available in the System.</p>';
        }

        return $output;
    }

  }
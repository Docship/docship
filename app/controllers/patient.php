<?php

    class Patient extends Controller{

        public function index(){
            if($_SESSION['role'] != 'patient'){
                redirect('pages/prohibite?user='.$_SESSION['role']);
            }

            $data = array();
            $appointments_result1 = $this->model('Appointment')->findByPatientId($_SESSION['user_id']);
            if(isset($appointments_result1['value'])){
                if(empty($appointments_result1['value'])){
                    $data['appointments'] = [];
                    $data['appointments_size'] = 0;
                }else {
                    $data['appointments'] = array_slice($appointments_result1['value'], 0, 3);
                    $data['appointments_size'] = sizeof($appointments_result1['value']);
                }
            }else {
                $data['db_err_1'] = "appointments limited searching failed"; 
            }

            $prescriptions_result1 = $this->model('Prescription')->findByPatientId($_SESSION['user_id']);
            if(isset($prescriptions_result1['value'])){
                if(empty($prescriptions_result1['value'])){
                    //$data['appointments'] = [];
                    $data['prescriptions_size'] = 0;
                }else {
                    //$data['appointments'] = array_slice($prescriptions_result1['value'], 0, 3);
                    $data['prescriptions_size'] = sizeof($prescriptions_result1['value']);
                }
        
            }else {
                $data['db_err_2'] = "prescriptions limited searching failed"; 
            }
            
            $arrears = $this->model('receipt')->getTotalReceiptSumByPatient($_SESSION['user_id']);
            $data['arrears'] = number_format((float)$arrears, 2, '.', '');

            

            $this->view('patient/index', $data);
        }

        /*
        public function showRegister(){
            redirect('patient/register') ;
        }
        */

        public function register(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'patient'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    'role'=> 'patient',
                    'fname'=> ucwords(trim($_POST['fname'])),
                    'lname'=> ucwords(trim($_POST['lname'])),
                    'email' => trim($_POST['email']),
                    'bday'=> trim($_POST['bday']),
                    'telephone'=> trim($_POST['telephone']),
                    'gender'=> trim($_POST['gender']),
                    'password'=>trim($_POST['password']),
                    'repassword'=>trim($_POST['repassword']),
                    'password_err' => '',
                    'repassword_err' => '',
                    'role_err'=>'',
                    'fname_err'=>'',
                    'lname_err'=>'',
                    'email_err'=>'',
                    'telephone_err' => '',
                    'bday_err'=>'',
                    'gender_err'=>'',
                    'isExist' => false
                  ];

                //$validate = $this->getValidation();
                $result = Validate::checkPatientRegistrationData($data);

                if($result==true){
                    $data['hash_pwd']=password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

                    $patientModel = $this->model('Patient');

                    $result = $patientModel->isExistByEmail($data['email']);

                    if($result==0){

                        $result = $patientModel->insert($data);

                        if($result!=-1){
                            redirect('user/login');
                        }else {
                            $data['db_err'] = 'Error Occured in System!';
                            $this->view('patient/appointment' , $data) ;
                        }

                    }elseif($result==1) {
                        $data['email_err'] = "Already account exist for this email";
                        //$this->view('patient/dumy', $data);
                        $this->view('patient/register' , $data) ;
                    } else {
                        $data['db_err'] = 'Error Occured in System! patient existance checking fail';
                        //$this->view('patient/dumy', $data);
                        $this->view('patient/register' , $data) ;
                    }
                }else {
                    //invalid input data
                    $this->view('patient/register' , $data) ;
                }




            } else {
                // request is not post request
                $data =[
                    'role'=> '',
                    'fname'=> '',
                    'lname'=> '',
                    'email' => '',
                    'bday'=> '',
                    'telephone'=> '',
                    'gender'=> '',
                    'password'=>'',
                    'repassword'=>'',
                    'password_err' => '',
                    'repassword_err' => '',
                    'role_err'=>'',
                    'fname_err'=>'',
                    'lname_err'=>'',
                    'email_err'=>'',
                    'telephone_err' => '',
                    'bday_err'=>'',
                    'gender_err'=>'',
                    'isExist' => false
                  ];

                $this->view('patient/register' , $data) ;
            }
        }

        public function appointments(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'patient'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            }

            else {

                //$result = $this->model('Appointment');

                //$result = $this->model('Message');



                $result = $this->model('Doctor')->getAll();
                $data = array();
                if($result==-1){
                    //$data['db_err'] = "system failure";
                    //$this->view('patient/messages' , $data);
                }else {
                    $data['doctors'] = $result;
                    //$this->view('patient/messages' , $data);
                }

                $appointments_result = $this->model('Appointment')->findByPatientId($_SESSION['user_id']);

                if(isset($appointments_result['value'])){
                    $data['appointments'] = $appointments_result['value'];
                }else {
                    //$data['appointments'] = null;
                }


                $this->view('patient/appointments' , $data) ;
            }

        }

        public function appointment(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'patient'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            }

            else {
                $data = array();
                $this->view('patient/appointment' , $data) ;
            }

        }



        public function prescriptions(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'patient'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            }

            else {

                $result = $this->model('Prescription')->findByPatientId($_SESSION['user_id']);
                $data = array();
                $prescriptions = array();

                if(isset($result['value'])){
                    $prescriptions_init = $result['value'];
                    $resultDoc = $this->model('Doctor')->getAll();
                    foreach($prescriptions_init as $prescription){
                        $resultDoc = $this->model('Doctor')->findById($prescription['doctor_id']);
                        $doc = $resultDoc['value'];
                        $prescription['doctor'] = $doc;
                        $prescription += array('doctor' => $doc);
                        array_push($prescriptions,$prescription);
                    }

                }

                $data['prescriptions'] = $prescriptions;

                //$this->view('pages/dumy' , $data);

                $this->view('patient/prescriptions' , $data);
            }
        }

        public function message(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'patient'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }
            else {
                $messages = $this->createChatMessages();
                $data = array();
                $data['messages'] = $messages;
                $this->view('patient/messages' , $data);
            }

        }

        public function update(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'patient'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST'){


                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


                $data =[
                    'role'=> 'patient',
                    'fname'=> ucwords(trim($_POST['fname'])),
                    'lname'=> ucwords(trim($_POST['lname'])),
                    'email' => trim($_POST['email']),
                    'bday'=> trim($_POST['bday']),
                    'telephone'=> trim($_POST['telephone']),
                    'gender'=> trim($_POST['gender']),
                    'password'=>trim($_POST['password']),
                    'repassword'=>trim($_POST['repassword']),
                    'password_err' => '',
                    'repassword_err' => '',
                    'role_err'=>'',
                    'fname_err'=>'',
                    'lname_err'=>'',
                    'email_err'=>'',
                    'telephone_err' => '',
                    'bday_err'=>'',
                    'gender_err'=>'',
                    'isExist' => false
                  ];

                //$validate = $this->getValidation();
                $result = Validate::checkPatientUpdateData($data);

                if($result==true){
                    $data['hash_pwd']=password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

                    $patientModel = $this->model('Patient');

                    $data['id'] = $_SESSION['user_id'];

                    $result = $patientModel->findByEmailAll($data['email']);


                    if(isset($result['value'])){
                        $result_email = $result['value'];
                        if(empty($result_email)){
                            $result = $patientModel->update($data);

                            if($result!=-1){
                                redirect('patient/update');
                            }else {
                                $data['db_err'] = 'Error Occured in System!';
                                $data['result'] = $result;
                                $this->view('patient/update', $data);
                            }
     
                        }else if(sizeof($result_email)==1){
                            if($result_email[0]['id']==$_SESSION['user_id']){
                                $result = $patientModel->update($data);

                                if($result!=-1){
                                    redirect('patient/update');
                                    //or else redirect to user admin!?
                                }else {
                                    $data['db_err'] = 'Error Occured in System!';
                                    $data['result'] = $result;
                                    $this->view('patient/update', $data);
                                }

                            }else {
                                $data['email_err'] = "email exist";
                                $this->view('patient/update', $data);
                            }
                        }else if(sizeof($result_email)>1){
                            $data['email_err'] = "email exist";
                            $this->view('patient/update', $data);
                        }else {
                            $data['db_err'] = 'Error Occured in System!';
                            //$data['result'] = $result;
                            $this->view('patient/update', $data);
                        }

                    }else {
                        $data['db_err'] = 'Error Occured in System! patient existance checking fail by email';
                        //$this->view('doctor/dumy', $data);
                        $this->view('patient/update', $data);
                    }
                }else {
                    //invalid input data
                    $this->view('patient/update', $data);
                }

            } else {
                $data = array();
                $result = $this->model('Patient')->findById($_SESSION['user_id']);
                if (isset($result['value'])) {
                    if (isset($result['error'])){
                        $data['isExist'] = false;
                    }else{
                        $patient = $result['value'];
                        $data =[
                            'role'=> 'patient',
                            'fname'=> ucwords(trim($patient['firstname'])),
                            'lname'=> ucwords(trim($patient['lastname'])),
                            'email' => trim($patient['email']),
                            'bday'=> trim($patient['bday']),
                            'telephone'=> trim($patient['telephone']),
                            'gender'=> trim($patient['gender']),
                            'password'=>"",
                            'repassword'=>"",
                            'isExist' => false
                          ];
                    }
                }else{
                    $data['db_err'] = "System Error";
                }
                
                $this->view('patient/update', $data) ;


            }


        }

        public function doctors($type){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'patient'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            }

            else {

                if($type=='subcribe'){
                    $result = $this->model('subcribe')->getSubcribedDoctorsByPatient($_SESSION['user_id']);
                    $data = array();
                    if($result==-1){
                        //$data['db_err'] = "system failure";
                        //$this->view('patient/messages' , $data);
                    }else {
                        $doctors = array();
                        $model = $this->model('subcribe');
                    
                        foreach($result['value'] as $doctor){
                            
                            $result_avg = $this->model('rate')->getTotalRatingByDoctor($doctor['user_id']);
                            $doc = $doctor;
                            $doc['is_sub'] = 0; // 0 is true, 1 is false
                            $doc['rating'] = round($result_avg['value']);
                            array_push($doctors,$doc);
                            
                        }
                        $data['doctors'] = $doctors;
                        //$this->view('patient/messages' , $data);
                }

                    $this->view('patient/doctors' , $data) ;
                    //$this->view('pages/dumy' , $data) ;
                }else {
                    $result = $this->model('Doctor')->getAll();
                    $data = array();
                    if($result==-1){
                        //$data['db_err'] = "system failure";
                        //$this->view('patient/messages' , $data);
                    }else {
                        $doctors = array();
                        $model = $this->model('subcribe');
                    
                        foreach($result as $doctor){
                            $result_sub = $model->isDoctorSubcribed($doctor['id'] , $_SESSION['user_id']);
                            $result_avg = $this->model('rate')->getTotalRatingByDoctor($doctor['user_id']);
                            $doc = $doctor;
                            $doc['is_sub'] = $result_sub['value']; // 0 is true, 1 is false
                            $doc['rating'] = round($result_avg['value']);
                            $doctor = $doctor + array('is_sub' => $result_sub['value']);
                            array_push($doctors,$doc);
                            
                        }
                        $data['doctors'] = $doctors;
                        //$this->view('patient/messages' , $data);
                    }

                    $this->view('patient/doctors' , $data) ;
                }

            }


        }


        public function delete(){
            if ($_SESSION['role'] != 'admin') {
                redirect('pages/prohibite?user=' . $_SESSION['role']);
            }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = array();
                $params = file_get_contents( "php://input" );
                $params = json_decode( $params); 
                $model = $this->model('patient');
                if(!empty($params)){
                    foreach($params as $id){
                        $condition = $this->isAppointmentAvailable($id);
                        if($condition==0){
                            echo json_encode(array('success' => 1 , 'msg'=>"Patient Id : " . $id ." has upcoming appointments"));
                            return;
                        }
                        $result = $model->delete($id);
                        if($result!=0){
                            $data['cancel_err_id'] = $id;
                            echo json_encode(array('success' => 1 , 'msg'=>"Patient Id : " . $id ." deletion fail.")); // 1 means false
                            return;
                        }
                    }
                }else {
                    //redirect('patient/index');
                }
    
                echo json_encode(array('success' => 0)); // 0 -> true
            }
    
            else {
                
    
            }
    
        }

        public function appointments_confirmed(){
            if(isset($_SESSION['role']) && $_SESSION['role'] != 'patient'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            }

            else {

                $appointments_result = $this->model('Appointment')->getConfirmedByPatient($_SESSION['user_id']);

                if(isset($appointments_result['value'])){
                    $data['appointments'] = $appointments_result['value'];
                }else {
                    //$data['appointments'] = null;
                }


                $this->view('patient/appointments_confirmed' , $data) ;


            }
        }

        private function createChatMessages(){

            $model = $this->model("message");

            $chat_botID = $model->getChatBotId()['value'];

            // get current user uid
            $user_result = $this->model($_SESSION['role'])->findById($_SESSION['user_id']);
    
            if(isset($user_result['value']) && !empty($user_result['value'])){
    
                $uid = $user_result['value']['user_id'];
    
                $msg_result = $model->getBySenderAndReceiver($uid , $chat_botID);
    
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
                    return "";
                }
    
            }
    
            return "";
        }

        private function isAppointmentAvailable($id){
            $result = $this->model('appointment')->findByPatientId($id);

            if(isset($result['value']) && !empty($result['value'])){
                return 0;
            }
            return 1;
        }


    }

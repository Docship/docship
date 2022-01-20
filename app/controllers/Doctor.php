<?php

    class Doctor extends Controller{

        public function index(){
            if($_SESSION['role'] != 'doctor'){
                redirect('pages/prohibite?user='.$_SESSION['role']);
            }

            $data = array();
            $appointments_result1 = $this->model('Appointment')->findByDoctorId($_SESSION['user_id']);
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

            $prescriptions_result1 = $this->model('Prescription')->findByDoctorId($_SESSION['user_id']);
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

            $doc_result = $this->model('doctor')->findById($_SESSION['user_id']);

            if(isset($doc_result['value']) && !empty($doc_result['value'])){
                
                $data['income'] = number_format((float)$$doc_result['value']['total_income'], 2, '.', '') ;
            }

            $this->view('doctor/index', $data);
        }

        public function showRegister(){
            redirect('doctor/register?user='.$_SESSION['role']) ;
        }
        /*
        public function register(){

            if($_SESSION['role'] != 'admin'){
                redirect('pages/prohibite?user='.$_SESSION['role']);
            }

            elseif($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    'role'=> 'doctor',
                    'fname'=> trim($_POST['fname']),
                    'lname'=> trim($_POST['lname']),
                    'email' => trim($_POST['email']),
                    'password'=>trim($_POST['password']),
                    'repassword'=>trim($_POST['repassword']),
                    'bday'=> trim($_POST['bday']),
                    'gender'=> trim($_POST['gender']),
                    'charge_amount'=> trim($_POST['charge_amount']),
                    'category'=> trim($_POST['category']),
                    'college'=> trim($_POST['college']),
                    'working_from'=> trim($_POST['working_from']),
                    'working_to'=> trim($_POST['working_to']),
                    'nic'=> trim($_POST['nic']),
                    'gov_registration_no'=> trim($_POST['gov_registration_no']),
                    'discount'=> trim($_POST['discount']),
                    'telephone'=> trim($_POST['telephone']),
                    'bank_name'=> trim($_POST['bank_name']),
                    'bank_branch'=> trim($_POST['bank_branch']),
                    'bank_acc_no'=> trim($_POST['bank_acc_no']),
                    'total_income'=> trim($_POST['total_income']),
                    'current_arrears'=> trim($_POST['current_arrears']),


                    'role_err'=>'',
                    'fname_err'=>'',
                    'lname_err'=>'',
                    'email_err'=>'',
                    'password_err' => '',
                    'repassword_err' => '',
                    'bday_err'=>'',
                    'gender_err'=>'',
                    'charge_amount_err'=>'',
                    'category_err'=>'',
                    'college_err'=>'',
                    'working_from_err'=>'',
                    'working_to_err'=>'',
                    'nic_err'=>'',
                    'gov_registration_no_err'=>'',
                    'discount_err'=>'',
                    'telephone_err' => '',
                    'bank_name_err' => '',
                    'bank_branch_err' => '',
                    'bank_acc_no_err' => '',
                    'total_income_err' => '',
                    'current_arrears_err' => '',

                    'isExist' => false
                  ];

                $validate = $this->getValidation();
                $result = $validate->checkDoctorRegistrationData($data);

                if($result==true){
                    $data['hash_pwd']=password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

                    $doctorModel = $this->model('Doctor');

                    $result = $doctorModel->isExistByEmail($data['email']);

                    if($result==0){

                        $result = $doctorModel->insert($data);

                        if($result!=-1){
                            redirect('admin/index?user=admin');
                            //or else redirect to user admin!?
                        }else {
                            $data['db_err'] = 'Error Occured in System!';
                            $data['result'] = $result;
                            $this->view('doctor/register', $data);
                        }

                    }if($result==1) {
                        $data['isExist'] = true;
                        //$this->view('doctor/dumy', $data);
                        $this->view('doctor/register', $data);
                    } else {
                        $data['db_err'] = 'Error Occured in System! doctor existance checking fail';
                        //$this->view('doctor/dumy', $data);
                        $this->view('doctor/register', $data);
                    }
                }else {
                    //invalid input data
                    $this->view('doctor/register', $data);
                }




            } else {
                // request is not post request
                $data =[
                    'role'=>'',
                    'fname'=>'',
                    'lname'=>'',
                    'email'=>'',
                    'password' => '',
                    'repassword' => '',
                    'bday'=>'',
                    'gender'=>'',
                    'charge_amount'=>'',
                    'category'=>'',
                    'college'=>'',
                    'working_from'=>'',
                    'working_to'=>'',
                    'nic'=>'',
                    'gov_registration_no'=> '',
                    'discount'=> '',
                    'telephone'=> '',
                    'bank_name'=> '',
                    'bank_branch'=> '',
                    'bank_acc_no'=> '',
                    'total_income'=> '',
                    'current_arrears'=> '',


                    'role_err'=>'',
                    'fname_err'=>'',
                    'lname_err'=>'',
                    'email_err'=>'',
                    'password_err' => '',
                    'repassword_err' => '',
                    'bday_err'=>'',
                    'gender_err'=>'',
                    'charge_amount_err'=>'',
                    'category_err'=>'',
                    'college_err'=>'',
                    'working_from_err'=>'',
                    'working_to_err'=>'',
                    'gov_registration_no_err'=>'',
                    'discount_err'=>'',
                    'telephone_err' => '',
                    'bank_name_err'=> '',
                    'bank_branch_err'=> '',
                    'bank_acc_no_err' => '',
                    'total_income_err' => '',
                    'current_arrears_err' => '',

                    'isExist' => false
                  ];

                $this->view('doctor/register' , $data) ;
            }
        }
        */

        public function appointments(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'doctor'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            }

            else {

                $appointments_result = $this->model('Appointment')->findByDoctorId($_SESSION['user_id']);

                if(isset($appointments_result['value'])){
                    $data['appointments'] = $appointments_result['value'];
                }else {
                    //$data['appointments'] = null;
                }


                $this->view('doctor/appointments' , $data) ;
            }

        }

        public function prescriptions(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'doctor'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            }

            else {

                $result = $this->model('Prescription')->findByDoctorId($_SESSION['user_id']);
                $data = array();

                if(isset($result['value'])){
                    $data['prescriptions'] = $result['value'];
                }


                $this->view('doctor/prescriptions' , $data);
            }
        }

        public function message(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'doctor'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }
            else {
                $messages = $this->createChatMessages();
                $data = array();
                $data['messages'] = $messages;
                $this->view('doctor/messages' , $data);
            }

        }

        public function update(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'doctor'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    'role'=> 'doctor',
                    'fname'=> trim($_POST['fname']),
                    'lname'=> trim($_POST['lname']),
                    'email' => trim($_POST['email']),
                    'password'=>trim($_POST['password']),
                    'repassword'=>trim($_POST['repassword']),
                    'bday'=> trim($_POST['bday']),
                    'gender'=> trim($_POST['gender']),
                    'charge_amount'=> trim($_POST['charge']),
                    'category'=> trim($_POST['category']),
                    'college'=> trim($_POST['college']),
                    'working_from'=> trim($_POST['working_from']),
                    'working_to'=> trim($_POST['working_to']),
                    'working_days'=> trim($_POST['days']),
                    'nic'=> trim($_POST['nic']),
                    'discount'=> trim($_POST['discount']),
                    'telephone'=> trim($_POST['telephone']),
                    'bank_name'=> trim($_POST['bank']),
                    'bank_branch'=> trim($_POST['branch']),
                    'bank_acc_no'=> trim($_POST['account_no']),


                    'role_err'=>'',
                    'fname_err'=>'',
                    'lname_err'=>'',
                    'email_err'=>'',
                    'password_err' => '',
                    'repassword_err' => '',
                    'bday_err'=>'',
                    'gender_err'=>'',
                    'charge_amount_err'=>'',
                    'category_err'=>'',
                    'college_err'=>'',
                    'working_from_err'=>'',
                    'working_to_err'=>'',
                    'working_days_err'=> '',
                    'nic_err'=>'',
                    'gov_registration_no_err'=>'',
                    'discount_err'=>'',
                    'telephone_err' => '',
                    'bank_name_err' => '',
                    'bank_branch_err' => '',
                    'bank_acc_no_err' => '',
                    'total_income_err' => '',
                    'current_arrears_err' => '',

                    'isExist' => false
                  ];

                //$validate = $this->getValidation();
                $result = Validate::checkDoctorEditData($data);

                if($result==true){
                    $data['hash_pwd']=password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

                    $doctorModel = $this->model('Doctor');

                    $data['id'] = $_SESSION['user_id'];

                    $result = $doctorModel->findByEmailAll($data['email']);

                    if(isset($result['value']) && !empty($result['value'])){
                        $result_email = $result['value'];
                        if(empty($result_email)){
                            $result_nic = $doctorModel->findByNICAll($data['nic']);
                            if(isset($result_nic['value']) && !empty($result_nic['value'])){
                                $result_doc_nic = $result_nic['value'];
                                if(empty($result_doc_nic)){
                                    $data['working_from_24hrs'] = date("H:i", strtotime($data['working_from']));
                                    $data['working_to_24hrs'] = date("H:i", strtotime($data['working_to']));
                                    $result = $doctorModel->update($data);

                                
                                    if($result!=-1){
                                        redirect('doctor/update');
                                        //or else redirect to user admin!?
                                    }else {
                                        $data['db_err'] = 'Error Occured in System!';
                                        $data['result'] = $result;
                                        $this->view('doctor/update', $data);
                                    }
                                }else if(sizeof($result_doc_nic)==1){
                                    $d1 = $result_doc_nic[0];
                                    if($d1['nic'] == $data['nic'] && $d1['id'] == $_SESSION['user_id']){
                                        $data['working_from_24hrs'] = date("H:i", strtotime($data['working_from']));
                                        $data['working_to_24hrs'] = date("H:i", strtotime($data['working_to']));
                                        $result = $doctorModel->update($data);

                                    
                                        if($result!=-1){
                                            redirect('doctor/update');
                                            //or else redirect to user admin!?
                                        }else {
                                            $data['db_err'] = 'Error Occured in System!';
                                            //$data['result'] = $result;
                                            $this->view('doctor/update', $data);
                                        }
                                    }else {
                                        $data['nic_err'] = "NIC exist";
                                        $this->view('doctor/update', $data);
                                    }
                                }else if(sizeof($result_doc_nic)>1){
                                    $data['nic_err'] = "NIC exist";
                                    $this->view('doctor/update', $data);
                                }else {
                                    $data['db_err'] = 'Error Occured in System!';
                                    //$data['result'] = $result;
                                    $this->view('doctor/update', $data);
                                }
                            }else {
                                $data['db_err'] = 'Error Occured in System!';
                                //$data['result'] = $result;
                                $this->view('doctor/update', $data);
                            }
                        }else if(sizeof($result_email)==1){
                            if($result_email[0]['id']==$_SESSION['user_id']){
                                $result_nic = $doctorModel->findByNICAll($data['nic']);
                                if(isset($result_nic['value']) && !empty($result_nic['value'])){
                                    $result_doc_nic = $result_nic['value'];
                                    if(empty($result_doc_nic)){
                                        $data['working_from_24hrs'] = date("H:i", strtotime($data['working_from']));
                                        $data['working_to_24hrs'] = date("H:i", strtotime($data['working_to']));
                                        $result = $doctorModel->update($data);

                                    
                                        if($result!=-1){
                                            redirect('doctor/update');
                                            //or else redirect to user admin!?
                                        }else {
                                            $data['db_err'] = 'Error Occured in System!';
                                            $data['result'] = $result;
                                            $this->view('doctor/update', $data);
                                        }
                                    }else if(sizeof($result_doc_nic)==1){
                                        $d1 = $result_doc_nic[0];
                                        if($d1['nic'] == $data['nic'] && $d1['id'] == $_SESSION['user_id']){
                                            $data['working_from_24hrs'] = date("H:i", strtotime($data['working_from']));
                                            $data['working_to_24hrs'] = date("H:i", strtotime($data['working_to']));
                                            $result = $doctorModel->update($data);

                                        
                                            if($result!=-1){
                                                redirect('doctor/update');
                                                //or else redirect to user admin!?
                                            }else {
                                                $data['db_err'] = 'Error Occured in System!';
                                                //$data['result'] = $result;
                                                $this->view('doctor/update', $data);
                                            }
                                        }else {
                                            $data['nic_err'] = "NIC exist";
                                            $this->view('doctor/update', $data);
                                        }
                                    }else if(sizeof($result_doc_nic)>1){
                                        $data['nic_err'] = "NIC exist";
                                        $this->view('doctor/update', $data);
                                    }else {
                                        $data['db_err'] = 'Error Occured in System!';
                                        //$data['result'] = $result;
                                        $this->view('doctor/update', $data);
                                    }
                                }else {
                                    $data['db_err'] = 'Error Occured in System!';
                                    //$data['result'] = $result;
                                    $this->view('doctor/update', $data);
                                }

                            }else {
                                $data['email_err'] = "email exist";
                                $this->view('doctor/update', $data);
                            }
                        }else if(sizeof($result_email)>1){
                            $data['email_err'] = "email exist";
                            $this->view('doctor/update', $data);
                        }else {
                            $data['db_err'] = 'Error Occured in System!';
                            //$data['result'] = $result;
                            $this->view('doctor/update', $data);
                        }



                    }else {
                        $data['db_err'] = 'Error Occured in System! doctor existance checking fail by email';
                        //$this->view('doctor/dumy', $data);
                        $this->view('doctor/update', $data);
                    }
                }else {
                    //invalid input data
                    $this->view('doctor/update', $data);
                }
            }

            else {

                $result = $this->model('doctor')->findById($_SESSION['user_id']);
                $data = array();

                if($result!=-1 && !empty($result['value'])){
                    $doctor = $result['value'];
                    $date_to = new DateTime($doctor["working_to"]);
                    $date_from = new DateTime($doctor["working_from"]);
                    $data =[
                        'role'=> 'doctor',
                        'fname'=> trim($doctor['firstname']),
                        'lname'=> trim($doctor['lastname']),
                        'email' => trim($doctor['email']),
                        'bday'=> trim($doctor['bday']),
                        'gender'=> trim($doctor['gender']),
                        'charge_amount'=> trim($doctor['charge_amount']),
                        'category'=> trim($doctor['category']),
                        'college'=> trim($doctor['college']),
                        'working_from'=> $date_from->format('h.i A'),
                        'working_to'=> $date_to->format('h.i A'),
                        'working_days'=> trim($doctor['working_days']),
                        'nic'=> trim($doctor['nic']),
                        'discount'=> trim($doctor['discount']),
                        'telephone'=> trim($doctor['telephone']),
                        'bank_name'=> trim($doctor['bank_name']),
                        'bank_branch'=> trim($doctor['bank_branch']),
                        'bank_acc_no'=> trim($doctor['bank_acc_no'])
                      ];
                    //$this->view('pages/dumy', $data);
                }
                $this->view('doctor/update' , $data) ;


            }


        }

        public function appointments_confirmed(){
            if(isset($_SESSION['role']) && $_SESSION['role'] != 'doctor'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            }

            else {

                $appointments_result = $this->model('Appointment')->getConfirmedByDoctor($_SESSION['user_id']);

                if(isset($appointments_result['value'])){
                    $data['appointments'] = $appointments_result['value'];
                }else {
                    //$data['appointments'] = null;
                }

                $this->view('doctor/appointments_confirmed' , $data) ;


            }
        }

        public function payment($id){
            if(isset($_SESSION['role']) && !($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'chat_admin')){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    'role'=> 'doctor',
                    'value'=> trim($_POST['payment']),
                    'value_err' => ""
                ];

                $result = Validate::validatePayment($data);

                if($result){
                    $result = $this->model('doctor')->findById($id);

                    $doctor = $result['value'];

                    $payment_old = $doctor['total_income'];

                    $total_payment = $data['value'] + $payment_old;

                    $total_payment = number_format((float)$total_payment, 2, '.', ''); // round the payment to two decimal

                    $result_doc_pay = $this->model('doctor')->addPayment($id , $total_payment);

                    if($result_doc_pay==0){

                    }else {
                        // update fail
                    }
                }else {
                    $this->view('doctor/payment' , $data) ;
                }
            }

            else {

                $result = $this->model('doctor')->findById($id);

                $data = array();

                if(isset($result['value']) && !empty($result['value'])){
                    $data['doctor'] = $result['value'];
                }

                $this->view('doctor/payment' , $data) ;


            }
        }

        public function delete(){
            if (!($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'chat_admin')) {
                redirect('pages/prohibite?user=' . $_SESSION['role']);
            }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = array();
                $params = file_get_contents( "php://input" );
                $params = json_decode( $params); 
                $model = $this->model('doctor');
                if(!empty($params)){
                    foreach($params as $id){
                        $condition = $this->isAppointmentAvailable($id);
                        if($condition==0){
                            echo json_encode(array('success' => 1 , 'msg'=>"Doctor Id : " . $id ." has upcoming appointments"));
                            return;
                        }
                        $result = $model->delete($id);
                        if($result!=0){
                            $data['cancel_err_id'] = $id;
                            echo json_encode(array('success' => 1 , 'msg'=> "Id ".$id ." is invalid")); // 1 means false
                            return;
                        }
                    }
                }else {
                    //redirect('patient/index');
                }
    
                echo json_encode(array('success' => 0 , 'msg'=>"success")); // 0 -> true
            }
    
            else {
                
    
            }
    
        }

        public function subcribe(){
            if ($_SESSION['role'] != 'patient') {
                echo json_encode(array('success' => 1));
            }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = array();
                $params = file_get_contents( "php://input" );
                $params = json_decode( $params); 
                $model = $this->model('subcribe');
                if(!empty($params)){
                    $data = array();
                    $data['doctor_id'] = $params;
                    $data['patient_id'] = $_SESSION['user_id'];
                    $result = $model->insert($data);
                    if($result==0){
                        echo json_encode(array('success' => 0 ));
                    }else {
                        echo json_encode(array('success' => 1));
                    }
                }else {
                    echo json_encode(array('success' => 1));
                }
    
                 // 0 -> true
            }
    
            else {
                
    
            }
    
        }

        public function unsubcribe(){
            if ($_SESSION['role'] != 'patient') {
                echo json_encode(array('success' => 1));
            }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = array();
                $params = file_get_contents( "php://input" );
                $params = json_decode( $params); 
                $model = $this->model('subcribe');
                if(!empty($params)){
                    $data = array();
                    $data['doctor_id'] = $params;
                    $data['patient_id'] = $_SESSION['user_id'];
                    $result = $model->delete($data);
                    if($result==0){
                        echo json_encode(array('success' => 0 ));
                    }else {
                        echo json_encode(array('success' => 1));
                    }
                }else {
                    echo json_encode(array('success' => 1));
                }
    
                 // 0 -> true
            }
    
            else {
                
    
            }
    
        }

        public function detail($param){
            $id = $param[0];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            }
            else {

                if($id==0){
                    //
                }
                
                $result = $this->model('doctor')->findById($id);
                $data = array();

                if($result!=-1 && !empty($result['value'])){
                    $data['doctor'] = $result['value'];
                    $result_avg = $this->model('rate')->getTotalRatingByDoctor($data['doctor']['user_id']);
                    $data['doctor']['rating'] = round($result_avg['value']);
                    if($_SESSION['role'] == 'patient'){
                        $result_sub = $this->model('subcribe')->isDoctorSubcribed($data['doctor']['id'] , $_SESSION['user_id']);
                        $data['doctor']['is_sub'] = $result['value'];
                    }
                    $this->view('doctor/profile', $data);
                }
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
            $result = $this->model('appointment')->findByDoctorId($id);

            if(isset($result['value']) && !empty($result['value'])){
                return 0;
            }
            return 1;
        }
    }

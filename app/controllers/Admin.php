<?php

    class Admin extends Controller{

        public function index(){

            if($_SESSION['role'] != 'admin'){
                redirect('pages/prohibite?user='.$_SESSION['role']);
            }

            $this->view('admin/index', []);
        }

        //extra - admin doesn't need to be registered explicitly
        public function showRegister(){
            redirect('doctor/register?user=admin');
        }

        //extra - admin doesn't need to be registered explicitly
        public function register(){

            if($_SESSION['role'] != 'admin'){
                redirect('pages/prohibite?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    'role'=> 'admin',
                    'fname'=> trim($_POST['fname']),
                    'lname'=> trim($_POST['lname']),
                    'email' => trim($_POST['email']),
                    'password'=>trim($_POST['password']),
                    'repassword'=>trim($_POST['repassword']),
                    'telephone'=> trim($_POST['telephone']),


                    'role_err'=>'',
                    'fname_err'=>'',
                    'lname_err'=>'',
                    'email_err'=>'',
                    'password_err' => '',
                    'repassword_err' => '',
                    'telephone_err' => '',

                    'isExist' => false
                  ];

                //$validate = $this->getValidation();
                $result = Validate::checkAdminRegistrationData($data);

                if($result==true){
                    $data['hash_pwd']=password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

                    $adminModel = $this->model('Admin');

                    $result = $adminModel->isExistByEmail($data['email']);

                    if($result==0){

                        $result = $adminModel->insert($data);

                        if($result!=-1){
                            redirect('admin/index?user=admin');
                            //or else redirect to user admin!?
                        }else {
                            $data['system_err'] = 'Error Occured in System!';
                            $data['result'] = $result;
                            $this->view('admin/register', $data);
                        }

                    }if($result==1) {
                        $data['isExist'] = true;
                        $this->view('admin/doctor_register', $data);
                    } else {
                        $data['system_err'] = 'Error Occured in System! admin existance checking fail';

                        $this->view('admin/register', $data);
                    }
                }else {
                    //invalid input data
                    $this->view('admin/register', $data);
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
                    'telephone' => '',


                    'role_err'=>'',
                    'fname_err'=>'',
                    'lname_err'=>'',
                    'email_err'=>'',
                    'password_err' => '',
                    'repassword_err' => '',
                    'telephone_err' => '',
                    'isExist' => false
                  ];

                $this->view('admin/register' , $data);
            }
        }

        public function doctor_register(){

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
                    'charge_amount'=> trim($_POST['charge']),
                    'category'=> trim($_POST['category']),
                    'college'=> trim($_POST['college']),
                    'working_from'=> trim($_POST['working_from']),
                    'working_to'=> trim($_POST['working_to']),
                    'working_days'=> trim($_POST['working_days']),
                    'nic'=> trim($_POST['nic']),
                    'gov_registration_no'=> trim($_POST['gov_registration_no']),
                    'discount'=> trim($_POST['discount']),
                    'telephone'=> trim($_POST['telephone']),
                    'bank_name'=> trim($_POST['bank_name']),
                    'bank_branch'=> trim($_POST['bank_branch']),
                    'bank_acc_no'=> trim($_POST['bank_acc_no']),
                    'total_income'=> 0.0,
                    'current_arrears'=> 0.0,


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
                $result = Validate::checkDoctorRegistrationData($data);

                if($result==true){
                    $data['hash_pwd']=password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

                    $doctorModel = $this->model('Doctor');

                    $result = $doctorModel->isExistByEmail($data['email']);

                    if($result==0){

                        $data['working_from_24hrs'] = date("H:i", strtotime($data['working_from']));
                        $data['working_to_24hrs'] = date("H:i", strtotime($data['working_to']));
                        $result = $doctorModel->insert($data);

                        if($result!=-1){
                            redirect('admin/doctors');
                            //or else redirect to user admin!?
                        }else {
                            $data['db_err'] = 'Error Occured in System!';
                            $data['result'] = $result;
                            $this->view('admin/doctor_register', $data);
                        }

                    }if($result==1) {
                        $data['isExist'] = true;
                        //$this->view('doctor/dumy', $data);
                        $this->view('admin/doctor_register', $data);
                    } else {
                        $data['db_err'] = 'Error Occured in System! doctor existance checking fail';
                        //$this->view('doctor/dumy', $data);
                        $this->view('admin/doctor_register', $data);
                    }
                }else {
                    //invalid input data
                    $this->view('admin/doctor_register', $data);
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
                    'working_days'=> '',
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
                    'working_days_err'=>'',
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

                  $this->view('admin/doctor_register', $data);
            }
        }

        public function appointments(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'admin'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            }

            else {

                $appointments_result = $this->model('Appointment')->getAll();

                if($appointments_result!=-1){
                    $data['appointments'] = $appointments_result;
                }else {
                    //$data['appointments'] = null;
                }


                $this->view('admin/appointments' , $data) ;
            }

        }

        public function doctors(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'admin'){
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

                $this->view('admin/doctors' , $data) ;
            }

        }

        public function message(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'admin'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //
            }
            else {
                $this->view('admin/messages');
            }

        }

        /*
        public function update(){


            if(isset($_SESSION['role']) && $_SESSION['role'] != 'admin'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            }

            else {

                $result = $this->model('Admin');

                $this->view('admin/update') ;


            }

        }
        */

        public function patients(){

            if(isset($_SESSION['role']) && $_SESSION['role'] != 'admin'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            }

            else {

                //$result = $this->model('Appointment');

                //$result = $this->model('Message');



                $result = $this->model('Patient')->getAll();
                $data = array();
                if($result==-1){
                    //$data['db_err'] = "system failure";
                    //$this->view('patient/messages' , $data);
                }else {
                    $data['patients'] = $result;
                    //$this->view('patient/messages' , $data);
                }

                $this->view('admin/patients' , $data) ;
            }

        }
}

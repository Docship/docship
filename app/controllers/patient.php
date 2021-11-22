<?php

    class Patient extends Controller{

        public function index(){

            if($_SESSION['role'] != 'patient'){
                redirect('pages/prohibit?user='.$_SESSION['role']);
            }

            $this->view('patient/index', []);
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
                    'fname'=> trim($_POST['fname']),
                    'lname'=> trim($_POST['lname']),
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
                    'isExist' => false
                  ];

                $validate = $this->getValidation();
                $result = $validate->checkPatientRegistrationData($data);

                if($result==true){
                    $data['hash_pwd']=password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

                    $patientModel = $this->model('Patient');

                    $result = $patientModel->isExistByEmail($data['email']);

                    if($result==0){

                        $result = $patientModel->insert($data);

                        if($result!=-1){
                            redirect('user/login?user=patient');
                        }else {
                            $data['db_err'] = 'Error Occured in System!';
                            $data['result'] = $result;
                            $this->view('patient/register', $data);
                        }
                        
                    }if($result==1) {
                        $data['isExist'] = true;
                        //$this->view('patient/dumy', $data);
                        $this->view('patient/register', $data);
                    } else {
                        $data['db_err'] = 'Error Occured in System! patient existance checking fail';
                        //$this->view('patient/dumy', $data);
                        $this->view('patient/register', $data);
                    }
                }else {
                    //invalid input data
                    $this->view('patient/register', $data);
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
                    'isExist' => false
                  ];
                
                $this->view('patient/register' , $data) ;
            }
        }
    }
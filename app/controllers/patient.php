<?php

    class Patient extends Controller{

        public function index(){}

        public function register(){

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

                if($result){
                    $data['hash_pwd']=password_hash(trim($_POST['passward']), PASSWORD_DEFAULT);

                    $patientModel = $this->model('Patient');

                    $result = $patientModel->isPatientExist($data['email'] , $data['hash_pwd']);

                    if($result==PASS){

                        $result = $patientModel->insertPatient($data);
                        if($result==FAIL){
                            $params = array(
                                'registration' => 'success',
                                'user' => 'patient'
                            );
                            redirect('user/login' , $params);
                        }else {
                            $data['system_err'] = 'Error Occured in System!';
                            $this->view('patient/register', $data);
                        }
                        
                    }else if($result==PASS) {
                        $data['isExist'] = true;
                        $this->view('patient/register', $data);
                    } else {
                        $data['system_err'] = 'Error Occured in System!';
                        $this->view('patient/register', $data);
                    }
                }




            } else {
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
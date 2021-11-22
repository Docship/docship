<?php

    class Admin extends Controller{

        public function index(){
            $this->view('admin/index', []);
        }

        //extra - admin doesn't need to be registered explicitly
        public function showRegister(){
            redirect('admin/register') ;
        }

        //extra - admin doesn't need to be registered explicitly
        public function register(){

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

                $validate = $this->getValidation();
                $result = $validate->checkAdminRegistrationData($data);

                if($result==true){
                    $data['hash_pwd']=password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

                    $adminModel = $this->model('Admin');

                    $result = $adminModel->isExistByEmail($data['email']);

                    if($result==0){

                        $result = $adminModel->insert($data);

                        if($result==1){
                            redirect('user/login?user=admin');
                            //or else redirect to user admin!?
                        }else {
                            $data['system_err'] = 'Error Occured in System!';
                            $data['result'] = $result;
                            $this->view('admin/register', $data);
                        }
                        
                    }if($result==1) {
                        $data['isExist'] = true;
                        //$this->view('doctor/dumy', $data);
                        $this->view('admin/register', $data);
                    } else {
                        $data['system_err'] = 'Error Occured in System! admin existance checking fail';
                        //$this->view('doctor/dumy', $data);
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
                
                $this->view('admin/register' , $data) ;
            }
        }
    }
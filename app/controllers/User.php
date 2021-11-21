<?php

    class User extends Controller{

        public function __construct(){}

        public function index(){
            $data = array(
                'error_message' => 'Error occurred in System. Please try again.'
            );
            
            $this->view('error/error', $data);
        }

        public function login(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    'role' => trim($_POST['role']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                    'isExist' => true      
                  ];

                $validate = $this->getValidation();
                $result = $validate->checkLoginData($data);
                
                if($result){
                    $data['hash_pwd'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    $role = ucwords($data['role']);
                    $model = $this->model($role);
                    
                    $result = $model->findByEmailAndPassword($data['email'] , $data['password']);

                    if(!isset($result['value'])){
                        $data['system_err'] = 'Error Occured in System!';
                        $data['error_message'] = "Error Occured in System!";
                        //$this->view('error/error', $data);
                        $this->view('user/login?error=system_fail' , $data);

                    }else {
                        if(sizeof($result['value'])==0) {
                            $data['isExist'] = false;
                            $data['result'] = $result;
                            $data['role'] = $role;
                            $data['error_message'] = "No such user exists!";
                            //$this->view('error/error', $data);
                            $this->view('user/login?error=invalid_password' , $data);
                        } else {
                            $user = $result['value'];
                            $this->createUserSession($user , $role);
                            redirect(lcfirst($role).'/index?user='.lcfirst($role));
    
                        }
                    }
                    
                    
                }else {
                    // invalid input data
                    $this->view('user/login?data=invalid' , $data) ; 
                }

            }else {
                // request is not post
                $data =[ 
                    'role' => '',   
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'isExist' => true         
                  ];
                
                $this->view('user/login' , $data) ; 
            }
        }

        private function createUserSession($user , $role){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['fname'] =$user['firstname'];
            $_SESSION['lname'] =$user['lastname'];
            $_SESSION['role'] = $role;
        }

        public function logout(){
            
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['fname']);
            unset($_SESSION['lname']);
            unset($_SESSION['role']);
            session_destroy();
            redirect('users/login');
        }

        public function showLogin(){
            redirect('user/login'); 
        }

    }
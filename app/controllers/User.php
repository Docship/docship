<?php

    class User extends Controller{

        protected function __construct(){}

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
                    $data['hash_pwd']=password_hash(trim($_POST['passward']), PASSWORD_DEFAULT);

                    $role = ucwords($data['role']);
                    $model = $this->model($role);
                    $method = 'get' . $role . 'ByEmailAndPassward';
                    $result = call_user_func_array([$model , $method] , array('email' => $data['email'] , 'pwd' => $data['hash_pwd']));

                    if($result==ERR_DB){
                        $data['system_err'] = 'Error Occured in System!';
                        $this->view('user/login', $data);

                    }else if($result==NULL) {
                        $data['isExist'] = false;
                        $this->view('user/login', $data);
                    } else {
                        $user = $result;
                        $this->createUserSession($user , $role);

                        $params = array(
                            'login' => 'success',
                            'user' => lcfirst($role)
                        );
                        redirect(lcfirst($role).'/dashboard' , $params);

                    }
                }

            }else {
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

            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['fname'] = $user->firstname;
            $_SESSION['lname'] = $user->lastname;
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
    }
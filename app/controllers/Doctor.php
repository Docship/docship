<?php

    class Doctor extends Controller{

        public function index(){
            $this->view('doctor/index', []);
        }

        public function showRegister(){
            redirect('doctor/register') ;
        }

        public function register(){

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
                    'charge_amount'=> trim($_POST['charge_amount']),
                    'category'=> trim($_POST['category']),
                    'college'=> trim($_POST['college']),
                    'working_from'=> trim($_POST['working_from']),
                    'working_to'=> trim($_POST['working_to']),
                    'nic'=> trim($_POST['nic']),
                    //doctor's government registration no
                    'discount'=> trim($_POST['discount']),
                    'telephone'=> trim($_POST['telephone']),
                    
                    
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
                    //doctor's government registration no error
                    'discount_err'=>'',
                    'telephone_err' => '',
                    
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

                        if($result==1){
                            redirect('user/login?user=doctor');
                            //or else redirect to user admin!?
                        }else {
                            $data['system_err'] = 'Error Occured in System!';
                            $data['result'] = $result;
                            $this->view('doctor/register', $data);
                        }
                        
                    }if($result==1) {
                        $data['isExist'] = true;
                        //$this->view('doctor/dumy', $data);
                        $this->view('doctor/register', $data);
                    } else {
                        $data['system_err'] = 'Error Occured in System! doctor existance checking fail';
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
                    //doctor's government registration no
                    'discount'=>'',
                    'telephone' => '',

                    
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
                    //doctor's government registration no error
                    'discount_err'=>'',
                    'telephone_err' => '',
                    'isExist' => false
                  ];
                
                $this->view('doctor/register' , $data) ;
            }
        }
    }
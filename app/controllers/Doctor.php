<?php

    class Doctor extends Controller{

        public function index(){
            if($_SESSION['role'] != 'doctor'){
                redirect('pages/prohibite?user='.$_SESSION['role']);
            }

            $this->view('doctor/index', []);
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
    }
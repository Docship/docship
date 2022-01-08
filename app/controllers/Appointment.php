<?php

class Appointment extends Controller
{

    public function index()
    {
        redirect('error/error_page');
    }

    public function add()
    {
        if ($_SESSION['role'] != 'patient') {
            redirect('pages/prohibite?user=' . $_SESSION['role']);
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'date' => trim($_POST['date']),
                'category' => trim($_POST['category']),
                'doctor' => trim($_POST['doctor']),
                'charge' => trim((string)$_POST['charge']),
                'time' => trim($_POST['time']),

                'status' => 'PENDING',
                'date_err' => '',
                'category_err' => '',
                'doctor_err' => '',
                'amount_err' => '',
                'time_err' => '',

                'isExist' => false
            ];

            //$validate = $this->getValidation();
            $result = Validate::checkAppointmentData($data);

            if ($result == true) {

                $data['time_24hrs'] = date("H:i", strtotime($data['time']));
                // check existance of doctor data
                $result_doc = $this->model('Doctor')->findById($data['doctor']);

                //$data['result'] = $result_doc['value'];


                if (isset($result_doc['value'])) {

                    if (sizeof($result_doc['value']) <= 0) {
                        $data['doctor_err'] = 'Invalid doctor';
                        $this->view('patient/appointment', $data);
                    }
                    if ($result_doc['value']['category'] != $data['category']) {
                        $data['category_err'] = 'Invalid category for selected doctor';
                    }
                    if ($result_doc['value']['charge_amount'] != $data['charge']) {
                        $data['amount_err'] = 'Invalid charge amount';
                    }
                    if (!empty($data['amount_err']) || !empty($data['category_err'])) {
                        //$this->view('patient/appointments', $data);
                        $this->viewAppointmentForm($data);
                    } else {
                        // check validity of date and time with doctor database
                        $result1 = $this->isDoctorWroking($data['doctor'], $data['date'], $data['time_24hrs']);
                        if (!isset($result1['error'])) {
                            $result2 = $this->isDoctorAvailable($data['doctor'], $data['date'], $data['time_24hrs']);
                            if($result2==0){
                                $receipt_id = $this->addReceiptToAppointment($data);
                                if($receipt_id!=-1){
                                    $data['receipt_id'] = $receipt_id;
                                    $data['patient_id'] = $_SESSION['user_id'];
                                    $result = $this->model('appointment')->insert($data);
                                    if($result!=-1){
                                        $this->view('patient/receipt', $data);
                                    }else {
                                        // delete the receipt now
                                        $return_del = $this->model('Receipt')->delete($receipt_id);
                                        /*
                                            we can check deletion failures here
                                        */
                                        $data['db_err'] = 'System error';
                                        $this->viewAppointmentForm($data);
                                        //$this->view('patient/appointment', $data);
                                    }
                                }elseif ($receipt_id==-1) {
                                    // if receipt insertion return 0 as insert item id
                                    $data['receipt_err'] = 'Receipt generating error';
                                    //$this->view('patient/appointment', $data);
                                    $this->viewAppointmentForm($data);
                                }else {
                                    $data['db_err'] = 'System error';
                                    //$this->view('patient/appointment', $data);
                                    $this->viewAppointmentForm($data);
                                }
                                
                            }elseif($result2==1){
                                // doctor has appointment already.
                                $data['isExist'] = true;
                                //$this->view('patient/appointment', $data);
                                $this->viewAppointmentForm($data);
                            }else {
                                $data['db_err'] = 'System error';
                                $this->viewAppointmentForm($data);
                                //$this->view('patient/appointment', $data);
                            }
                        }elseif($result1['error']=='not exist time'){
                            $data['time_err'] = 'This Time is not available for selected doctor.';
                            //$this->view('patient/appointment', $data);
                            $this->viewAppointmentForm($data);
                        }elseif($result1['error']=='not exist day'){
                            $data['day_err'] = 'Doctor is not available for given date.';
                            //$this->view('patient/appointment', $data);
                            $this->viewAppointmentForm($data);
                        }elseif($result1['error']=='system error'){
                            $data['db_err'] = 'System error';
                            $this->viewAppointmentForm($data);
                            //$this->view('patient/appointment', $data);
                        }
                    }
                } else {
                    //doctor not exist
                    $data['doctor_err'] = 'Invalid doctor selected';
                    $this->viewAppointmentForm($data);
                    //$this->view('patient/appointments', $data);
                }
            } else {
                // invalid input
                $doctors = $this->model('Doctor')->getAll();

                if($doctors==-1 || empty($doctors)){
                    // no doctors in the system
                    $data["empty_doctors"] = "<p>No any doctors in the system.<br/>You can't add appointments now.</p>p";
                    $this->view('patient/appointments', $data);
                }else {
                    $data["doctors"] = $doctors;

                    $this->view('patient/appointment', $data);
                }
                //$this->view('patient/appointment', $data);
            }
        }else {
            //get request

            $data = array();

            /*

            // get doctor
            $doctors = $this->model('Doctor')->getAll();

            if($doctors==-1 || empty($doctors)){
                // no doctors in the system
                $data["empty_doctors"] = "<p>No any doctors in the system.<br/>You can't add appointments now.</p>p";
                $this->view('patient/appointments', $data);
            }else {
                $data["doctors"] = $doctors;

                $this->view('patient/appointment', $data);
            }
            */

            $this->viewAppointmentForm($data);

        }
    }

    public function cancel($param = []){

        if ($_SESSION['role'] != 'patient') {
            redirect('pages/prohibite?user=' . $_SESSION['role']);
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
            redirect('patient/index');
            $data = array();
            $params = file_get_contents( "php://input" );
            $params = json_decode( $params); 
            $model = $this->model('appointment');
            if(!empty($params)){
                foreach($params as $id){
                    $result = $model->cancel($id);
                    if($result!=0){
                        $data['cancel_err_id'] = $id;
                        //$this->viewAppointments($data);
                        return;
                    }
                }
            }

            redirect('patient/appointments');
        }

        else {
            /*
            $id = $param[0];
            $model = $this->model('appointment');

            // check existance of appointment
            $result = $model->findById($id);

            if(isset($result['value'])){

                if(!empty($result['value'])){
                    $result1 = $model->update($id);
                    if($result==0){
                        redirect('patient/appointments?status=cancel_succuess');
                    }else {
                        redirect('patient/appointments?status=cancel_failed');
                    }
                }else {
                    redirect('patient/appointments?status=invalid_id_for_delete');
                }
            }
            */

        }

    }

    private function viewAppointments(&$data){
        $appointments_result = $this->model('Appointment')->findByPatientId($_SESSION['user_id']);

        if(isset($appointments_result['value'])){
            $data['appointments'] = $appointments_result['value'];
        }else {
            //$data['appointments'] = null;
        }


        $this->view('patient/appointments' , $data) ;
    }

    private function viewAppointmentForm(&$data){
        // get doctor
        $doctors = $this->model('Doctor')->getAll();

        if($doctors==-1 || empty($doctors)){
            // no doctors in the system
            $data["empty_doctors"] = "<p>No any doctors in the system.<br/>You can't add appointments now.</p>p";
            $this->view('patient/appointments', $data);
        }else {
            $data["doctors"] = $doctors;

            $this->view('patient/appointment', $data);
        }
    }

    private function isDoctorWroking($id, $date, $time = null)
    {
        $doctorModel = $this->model('doctor');
        $result = $doctorModel->isDoctorWroking($id, $date, $time);
        return $result;
    }

    private function isDoctorAvailable($id, $date, $time = null)
    {
        $appointmentModel = $this->model('appointment');
        $result = $appointmentModel->isDoctorFree($id, $date, $time);
        return $result;
    }

    private function addReceiptToAppointment(&$data){
        $insert_data = array(
            'patient_id' => $_SESSION['user_id'],
            'bank_name' => BANK_NAME,
            'bank_branch' => BANK_BARNCH,
            'bank_acc_no' => BANK_ACC,
            'discount' => 0.0,
            'amount' => $data['charge'],
            'issue_date' => Date::getTodayDate(),
            'expiry_date' => Date::getPreviousDate($data['date']),
            'description' => 'This receipt is issued Automatically',
            'total' => $this->calculate_total($data['charge'] , 0.0),
            'is_complete' => '0'
        );

        /*

        $result = $this->model('receipt')->getLastRowId();
        
        if(isset($result['value'])){
            $id = $result['value'];
            $insert_data['id'] = $id;
            $result1 = $this->model('receipt')->insert($insert_data);
            if($result1!=-1){
                return $id+1;
            }else {
                return -1;
            }
            
        }elseif(isset($result['error'])) {
            return -1;
        }else{
            return 0;
        }
        */

        $bytes = random_bytes(5);
        $id = bin2hex($bytes);
        $insert_data['id'] = $id;
        $data['receipt'] = $insert_data;

        $result1 = $this->model('receipt')->insert($insert_data);
        if($result1!=-1){
            return $id;
        }else {
            return -1;
        }
  
    }

    private function calculate_total($amount , $discount){
        if($discount==0.0){
            return $amount;
        }else {
            $percent = $discount;
            $discount = ($percent / 100) * $amount;
            $total = $amount - $discount;
            $total = number_format((float)$total, 2, '.', '');
            return $total;
        }
    }
}

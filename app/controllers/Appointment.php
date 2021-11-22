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
                'amount' => trim($_POST['amount']),
                'time' => trim($_POST['time']),


                'date_err' => '',
                'category_err' => '',
                'doctor_err' => '',
                'amount_err' => '',
                'time_err' => '',

                'isExist' => false
            ];

            $validate = $this->getValidation();
            $result = $validate->checkAppointmentData($data);

            if ($result == true) {
                // check existance of doctor data
                $result_doc = $this->model('Doctor')->findById($data['doctor']);

                if (isset($result_doc['value'])) {

                    if (sizeof($result_doc['value']) <= 0) {
                        $data['doctor_err'] = 'Invalid doctor';
                        $this->view('patient/appointments', $data);
                    }
                    if ($result_doc['category'] != $data['category']) {
                        $data['category_err'] = 'Invalid category for selected doctor';
                    }
                    if ($result_doc['charge_amount'] != $data['amount']) {
                        $data['amount_err'] = 'Invalid charge amount';
                    }
                    if (!empty($data['amount_err']) || !empty($data['category_err'])) {
                        $this->view('patient/appointments', $data);
                    } else {
                        // check validity of date and time with doctor database
                        $result1 = $this->isDoctorWroking($data['doctor_id'], $data['date'], $data['time']);
                        if (!isset($result1['error'])) {
                            $result2 = $this->isDoctorAvailable($data['doctor_id'], $data['date'], $data['time']);
                            if($result2==0){
                                $receipt_id = $this->addReceiptToAppointment($data);
                                if($receipt_id>0){
                                    $result = $this->model('appointment')->insert($data);
                                    if($result!=-1){
                                        redirect('patient/appointments?status=new_appointment_added');
                                    }else {
                                        $data['db_err'] = 'System error';
                                        $this->view('patient/appointments', $data);
                                    }
                                }elseif ($receipt_id==0) {
                                    // if receipt insertion return 0 as insert item id
                                }else {
                                    $data['db_err'] = 'System error';
                                    $this->view('patient/appointments', $data);
                                }
                                
                            }elseif($result2==1){
                                // doctor has appointment already.
                                $data['isExist'] = true;
                                $this->view('patient/appointments', $data);
                            }else {
                                $data['db_err'] = 'System error';
                                $this->view('patient/appointments', $data);
                            }
                        }elseif($result1['error']=='not exist time'){
                            $data['time_err'] = 'This Time is not available for selected doctor.';
                            $this->view('patient/appointments', $data);
                        }elseif($result1['error']=='not exist day'){
                            $data['day_err'] = 'Doctor is not available for given date.';
                            $this->view('patient/appointments', $data);
                        }elseif($result1['error']=='system error'){
                            $data['db_err'] = 'System error';
                            $this->view('patient/appointments', $data);
                        }
                    }
                } else {
                    //invalid input data
                    $this->view('patient/appointments', $data);
                }
            } else {
                // request is not post request
                $data = [
                    'date' => '',
                    'category' => '',
                    'doctor' => '',
                    'amount' => '',
                    'time' => '',


                    'date_err' => '',
                    'category_err' => '',
                    'doctor_err' => '',
                    'amount_err' => '',
                    'time_err' => '',

                    'isExist' => false
                ];

                $this->view('patient/appointments', $data);
            }
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

    private function addReceiptToAppointment($data){
        $insert_data = array(
            'patient_id' => $_SESSION['user_id'],
            'bank_name' => BANK_NAME,
            'bank_branch' => BANK_BARNCH,
            'bank_acc_no' => BANK_ACC,
            'discount' => 0.0,
            'amount' => $data['amount'],
            'issue_date' => Date::getTodayDate(),
            'expiry_date' => Date::getPreviousDate($data['date']),
            'description' => 'This receipt is issued Automatically',
            'is_complete' => false
        );

        return $this->model('Receipt')->insert($insert_data);
        
    }
}

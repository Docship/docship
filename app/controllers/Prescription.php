//Prescription controller
<?php
  class Prescription extends Controller {

    public function __construct(){
     
    }

    public function add($id = 0){
      if ($_SESSION['role'] != 'doctor') {
        redirect('pages/prohibite?user=' . $_SESSION['role']);
      } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'subject' => trim($_POST['subject']),
          'desc' => trim($_POST['desc']),
          'patient_id' => trim($_POST['patient']),
          'subject_err' => '',
          'desc_err' => ''
        ];

        $result_pat = $this->model('patient')->findById($id);

        if(isset($result_pat['value']) && !empty($result_pat['value'])){
          $patient = $result_pat['value'];
          $data['patient'] = $patient;
        }else if(isset($result_pat['error'])) {
          $data['db_err'] = "patient not found";
          $this->view('doctor/prescription', $data);
        }else {
          $data['issue_date'] = Date::getTodayDate();
          $data['doctor_id'] = $_SESSION['user_id'];

          $model = $this->model('prescription');

          $result = $model->insert($data);

          if($result==0){
            redirect('doctor/appointments');
          }else {
            $this->view('doctor/prescription', $data);
          }
        }


      }else {
        $data = [
          'subject' => "",
          'desc' => "",

          'subject_err' => '',
          'desc_err' => ''
        ];

        if($id!=0){
          $result_app = $this->model('appointment')->findById($id);

          if(isset($result_app['value']) && !empty($result_app['value'])){
            $appointment = $result_app['value'];
            $data['appointment'] = $appointment;

            $result_pat = $this->model('patient')->findById($_SESSION['user_id']);

            $this->view('doctor/prescription', $data);
          }else {
            //$data['sys_error'] = "Patient not found";
            redirect('doctor/appointments?err=Patient not found');
            //$this->view('doctor/appointments', $data);
          }
        }else {
          //$data['sys_error'] = "Request Failed";
          redirect('doctor/appointments?err=Request Failed');
        }

        

      }

    }

    public function show(){

    }

    


  }
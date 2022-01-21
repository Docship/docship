
<?php
  class Prescription extends Controller {

    public function __construct(){
     
    }

    public function add($id){
      if ($_SESSION['role'] != 'doctor') {
        redirect('pages/prohibite?user=' . $_SESSION['role']);
      } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'subject' => trim($_POST['subject']),
          'desc' => ($_POST['desc']),
          'issue_date'=> trim($_POST['issue_date']),
          'subject_err' => '',
          'desc_err' => ''
        ];

        

        $result_app = $this->model('appointment')->findById($id);

        $appointment = $result_app['value'];

        $result_pat = $this->model('patient')->findById($appointment['patient_id']);

        if(isset($result_pat['value']) && !empty($result_pat['value'])){
          $patient = $result_pat['value'];
          $data['patient_id'] = $patient['id'];
          $data['doctor_id'] = $_SESSION['user_id'];

          $model = $this->model('prescription');

          $result = 0;

          if($appointment['prescription_id']!=0){
            $data['id'] = $appointment['prescription_id'];
            $result = $model->update($data);
          }else {
            $bytes = random_bytes(5);
            $p_id = bin2hex($bytes);
            $data['id'] = $p_id;
            $result = $model->insert($data);
            $this->model('appointment')->addPrescriptionId($id , $p_id);
          }

          if($result==0){
            redirect('doctor/appointments_confirmed');
          }else {
            $this->view('doctor/prescription', $data);
          }
        }else if(isset($result_pat['error'])) {
          $data['db_err'] = "patient not found";
          $this->view('doctor/prescription', $data);
        }else {
          
        }


      }else {
        $data = [
          'subject' => "",
          'desc' => "",
          'issue_date' =>"",
          'subject_err' => '',
          'desc_err' => ''
        ];

        if($id!=0){
          $result_app = $this->model('appointment')->findById($id);

          if(isset($result_app['value']) && !empty($result_app['value'])){
            $appointment = $result_app['value'];
            $data['appointment_id'] = $appointment['id'];

            $result_pat = $this->model('patient')->findById($appointment['patient_id']);

            $data['patient'] = $result_pat['value'];

            if($appointment['prescription_id']!=0){
              $result_pres = $this->model('prescription')->findByIdForDoctor($appointment['prescription_id']);
              if(isset($result_pres['value']) && !empty($result_pres['value'])){
                $prescription = $result_pres['value'];
                $data['subject'] = $prescription['subject'];
                $data['desc'] = $prescription['description'];
                $data['issue_date'] = $prescription['issue_date'];
              
              }else {
                // error
              }
            }

            $this->view('doctor/prescription', $data);
            //$this->view('pages/dumy', $data);
          }else {
            //$data['sys_error'] = "Patient not found";
            redirect('doctor/appointments_confirmed?err=Patient not found');
            //$this->view('doctor/appointments', $data);
          }
        }else {
          //$data['sys_error'] = "Request Failed";
          redirect('doctor/appointments_confirmed?err=Request Failed');
        }

        

      }

    }

    public function show($params){
      $id = $params[0];
      if ($_SESSION['role'] != 'patient') {
        redirect('pages/prohibite?user=' . $_SESSION['role']);
      }elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

      }else {

        if($id>0){
          $result = $this->model('prescription')->findByIdForPatient($id);
          $data = array();

          if(isset($result['value']) && !empty($result['value'])){
            $data['prescription'] = $result['value'];

            $this->view('patient/prescription', $data);
          }
        }
      }
    }

    


  }
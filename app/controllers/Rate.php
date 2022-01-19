
<?php
  class Rate extends Controller {

    public function __construct(){
     
    }

    public function add($id){

        if(isset($_SESSION['role']) && $_SESSION['role'] != 'patient'){
            redirect('pages/prohibit?user='.$_SESSION['role']);
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =['value'=> trim($_POST['rating'])];

            $data['appointment_id'] = $id;

            $result_app = $this->model('appointment')->findById($id);

            if(isset($result_app['value']) && !empty($result_app['value'])){
                $result_doc = $this->model('doctor')->findById($result_app['value']['doctor_id']);
                $data['doctor'] = $result_doc['value'];
                $data['doctor_id'] = $data['doctor']['user_id'];
            }

            $data['patient_id'] = $_SESSION['user_uid'];

            $value = $data['value'];

            $result = true;

            if($result){
                $result_rate = $this->model("rate")->insert($data);
                if($result_rate==0){
                    $this->model('appointment')->rate($id);
                    redirect('patient/appointments_confirmed');
                }else {
                    // insertion failed
                }
            }else {
                $this->view('doctor/rate' , $data) ;
            }
        }

        else {
            $data = array();
            $data['appointment_id'] = $id;
            $result = $this->model('appointment')->findById($id);

            if(isset($result['value']) && !empty($result['value'])){
                $result_doc = $this->model('doctor')->findById($result['value']['doctor_id']);
                $data['doctor'] = $result_doc['value'];
            }
            $this->view('doctor/rate' , $data) ;
        }

    }


  }
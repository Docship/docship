//Receipt controller
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

            $data =['value'=> trim($_POST['value'])];

            $data['doctor_id'] = $id;

            $data['patient_id'] = $_SESSION['user_id'];

            $value = $data['value'];

            $result = Validate::validateRating($data);

            if($result){
                $result_rate = $this->model("rate")->insert($data);
                if($result_rate==0){
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
            $result = $this->model('doctor')->findById($id);

            if(isset($result['value']) && !empty($result['value'])){
                $data['doctor'] = $result['value'];
            }
            $this->view('doctor/rate' , $data) ;
        }

    }


  }
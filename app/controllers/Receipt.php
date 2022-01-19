<?php
  class Receipt extends Controller {

    public function __construct(){
     
    }

    public function show($id){
      if(isset($_SESSION['role']) && $_SESSION['role'] != 'patient'){
        redirect('pages/prohibit?user='.$_SESSION['role']);
    

      }else if($_SERVER['REQUEST_METHOD'] == 'POST'){

      }
      else {

          if($id==0){
              //
          }
          
          $result = $this->model('receipt')->findById($id);
          $data = array();

          if(isset($result['value']) && !empty($result['value'])){
              $data['receipt'] = $result['value'];
              $this->view('patient/receipt', $data);
          }
      }


  }


  }
<?php require_once APPROOT."/views/inc/header_patient.php"; ?>


<main role="main" class="doctors col-md-9 ml-sm-auto col-lg-10 px-md-4" id="C">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Doctors</h2>
        </div>

        <div class="container-fluid">
    <div class="row">
      <?php
        function getStatus($s , $data){
          if(strpos($data['working_days'],$s)!== false){
            return true;
          }return false;
        }
        function getDiv($d , $n , $data){
          $result = getStatus($n , $data);
          if($result){
            return "<div class=active>".$d."</div>";
          }else {
            return "<div>".$d."</div>";
          }
        }
        if(isset($data['doctors'])){
          if(!empty($data['doctors'])){
            foreach($data['doctors'] as $doctor){
              echo 
              '<div class="col-md-6 col-lg-4 my-2">
              <div class="card" style="border-radius: 15px;">
                <div class="card-body text-center">
                  <div class="mt-3 mb-2 d-flex justify-content-center mx-auto">
                    <img src="' . URLROOT . '/img/user.png" class="img-fluid" />
                  </div>
                    <h4 class="m-0">Dr. ' . $doctor["firstname"] . ' ' . $doctor["lastname"] . ' </h4>
                    <p class="text-muted"> ' . $doctor["category"] . ' </p>
                    <div class="progress mx-4 mb-2">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 60%"></div>
                    </div>
                    <button class="btn btn-primary btn-sm mb-3">Subscribe</button>
        
                    <div class="my-1 days">
                      <div class="week d-flex justify-content-center">'
                        .getDiv('M' , "1" , $doctor).
                        getDiv('T' , "2" , $doctor).
                        getDiv('W' , "3" , $doctor).
                        getDiv('T' , "4" , $doctor).
                        getDiv('F' , "5" , $doctor).
                        getDiv('S' , "6" , $doctor).
                        getDiv('S' , "7" , $doctor).
                      '</div>
                    </div>
                    <p class="mb-3 h6 text-muted">5.00pm - 8.00pm</p>
                    <div class="d-flex justify-content-center text-center mb-2">
                      <div class="px-3">
                        <p class="h5 mb-0"> ' . $doctor["charge_amount"] . '</p>
                        <p class="text-muted mb-0">Charge per Person</p>
                      </div>
                      <div class="px-3">
                        <p class="h5 mb-0">15%</p>
                        <p class="text-muted mb-0">Discount</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>';
            }
          }else {
            echo "<br><p>" . 'No any Doctor available in the System.' . "</p>";
          }
        }else {
          echo "<br><p style='color:red'>" . 'System failure.' . "</p>";
        }
      ?>



    </div>
  </div>
</main>
<?php require_once APPROOT."/views/inc/footer.php"; ?>
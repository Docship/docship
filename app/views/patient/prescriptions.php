<?php require_once APPROOT."/views/inc/header_patient.php"; ?>

<main role="main" class="appointments col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="card-columns m-3">

  <?php
  if(isset($data['prescriptions']) && !empty($data['prescriptions'])){
    foreach ($data['prescriptions'] as $prescription){
      $card = '<div class="card">
      <div class="card-body text-center">
        <h4 class="mt-2 mx-2"><b>'.$prescription['subject'].'</b></h4>
        <h5 class="m-0">By Dr. '.$prescription['doctor']['firstname'].'</h5>
        <p class="text-muted">'.$prescription['issue_date'].'</p>

        <p class="mx-2 font-weight-light">
        '.$prescription['description'].'
        </p>        
      </div>
    </div>';
      
    echo $card;
    } 
  }else {
    echo '<p> No any prescription available.</p>';
  }
    
  ?>

  </div>
</main>
<?php require_once APPROOT."/views/inc/footer.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome-pro-5/css/all.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
  <title>Profile</title>
</head>

<body>
  <div class="card-columns m-3">

  <?php
  if(isset($data['prescriptions']) && !empty($data['prescriptions'])){
    foreach ($prescription as $data['prescription']){
      $card = '<div class="card">
      <div class="card-body text-center">
        <h4 class="mt-2 mx-2"><b>'.$prescription['subject'].'</b></h4>
        <h5 class="m-0">by Dr. '.$prescription['doctor'].'</h5>
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

  <script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js"></script>
</body>

</html>
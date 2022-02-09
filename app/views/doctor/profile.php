<?php 
  function getRating($rate){
    return ($rate/5)*100;
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome-pro-5/css/all.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/dashboard.css">
  <title>Profile</title>
</head>

<body>

  <div class="container-fluid ">
    <div class="row vh-100 align-items-center justify-content-center">
      <div class="col-md-6 col-lg-4 my-2">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-2 d-flex justify-content-center mx-auto">
              <img src="<?php echo URLROOT; ?>/img/user.png" class="img-fluid" />
            </div>
            <h4 class="m-0 p-0">Dr. <?php if(isset($data['doctor'])) echo $data['doctor']['firstname']." ".$data['doctor']['lastname']; ?></h4>
            <div class="text-muted m-0 p-0"><?php if(isset($data['doctor'])) echo $data['doctor']['category']; ?></div>
            <div class="text-muted m-0 p-0"><?php if(isset($data['doctor'])) echo $data['doctor']['college']; ?></div>
            <div class="progress mx-4 my-3">
              <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo getRating($data['doctor']['rating']); ?>%"></div>
            </div>
            <script src="<?php echo URLROOT; ?>/js/subcribe.js"></script>
            <?php 
              if($_SESSION['user_role'] == 'patient'){
                if($data['doctor']['is_sub'] == '1'){
                  echo '<button class="btn btn-primary btn-sm mb-3" onclick="subcribe('.$data['doctor']['id'].');">Subscribe</button>';
                }else {
                  echo '<button class="btn btn-primary btn-sm mb-3" onclick="unsubcribe('.$data['doctor']['id'].');">Unsubscribe</button>';
                }
                
              } 
            ?>
            
            <div class="my-1 days">
              <div class="week d-flex justify-content-center">
                <?php
                  function getStatus($s , $data){
                    if(isset($data['doctor']) && strpos($data['doctor']['working_days'],$s)!== false){
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
                  $d1 = getDiv('M' , "1" , $data);
                  $d2 = getDiv('T' , '2' ,  $data);
                  $d3 = getDiv('W' , '3' ,  $data);
                  $d4 = getDiv('T' , '4' ,  $data);
                  $d5 = getDiv('F' , '5' ,  $data);
                  $d6 = getDiv('S' , '6' ,  $data);
                  $d7 = getDiv('S' , '7' ,  $data);

                  echo $d1 . $d2 . $d3 . $d4 . $d5 . $d6 . $d7;
                ?>
              </div>
            </div>
            <p class="mb-3 h6 text-muted"><?php if(isset($data['doctor'])) echo date('h:i A', strtotime($data['doctor']['working_from']))." - ".date('h:i A', strtotime($data['doctor']['working_to'])); ?></p>
            <div class="d-flex justify-content-center text-center mb-2">
              <div class="px-3">
                <p class="h5 mb-0">Rs. <?php if(isset($data['doctor'])) echo $data['doctor']['charge_amount']; ?></p>
                <p class="text-muted mb-0">Charge per Person</p>
              </div>
              <div class="px-3">
                <p class="h5 mb-0"><?php if(isset($data['doctor'])) echo $data['doctor']['discount']; ?>%</p>
                <p class="text-muted mb-0">Discount for subcirbers</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--profile ends-->



    </div>
  </div>

  <script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js"></script>
</body>

</html>
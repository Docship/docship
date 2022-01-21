<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/style_payment.css">
  <title>Payment</title>
</head>

<body>

  <div class="container-fluid ">
    <div class="row vh-100 align-items-center justify-content-center">
      <div class="col-md-6 col-lg-4 my-2">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-2 d-flex justify-content-center mx-auto">
              <img src="<?php echo URLROOT ?>/img/user.png" class="img-fluid" />
            </div>
            <h4 class="m-0 p-0"> Dr. <?php echo $data['doctor']['firstname'] ?></h4>
            <div class="text-muted m-0 pb-2"><?php echo $data['doctor']['category'] ?></div>

            <form method="post" action="<?php echo URLROOT ?>/doctor/payment/<?php echo $data['doctor']['id'] ?>">
              <div class="form-group mx-5">
                <div class="text-muted">Add Payment here</div>
                <input type="number" class="form-control" min="0" id="Payment" name="payment" placeholder="payment">
              </div>
              <button type="submit" class="btn btn-success w-75 my-2 mb-3">Add Payment</button>
            </form>
          </div>
        </div>
      </div>
      <!--profile ends-->



    </div>
  </div>

  <script src="<?php echo URLROOT ?>/js/bootstrap.bundle.min.js"></script>
</body>

</html>
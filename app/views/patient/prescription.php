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
  <div class="vh-100 wrapper d-flex align-items-center bg-light">
    <div class="container">
      <div class="row justify-content-center ">
          <form class="col-sm-12 col-md-9 col-lg-7 px-5 py-5 ">
            <h2 class="text-center"> <b>Prescription</b> </h2>
            <div class="form-group">
              <label for="doctor_name">Doctor Name</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name of the patient" disabled value="Dr. <?php echo $data['prescription']['firstname']?>" readonly>
            </div>
            <div class="form-group">
              <label for="text">Issue Date</label>
              <input type="text" class="form-control" id="date" value="<?php echo $data['prescription']['issue_date'] ?>"readonly>
            </div>
            <div class="form-group">
              <label for="text">Doctor Phone No</label>
              <input type="tel" class="form-control" id="date" value="<?php echo $data['prescription']['telephone']?>" readonly>
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" id="description" placeholder="subject" value="<?php echo $data['prescription']['subject']?>" readonly>
            </div>
    
            <div class="form-group">
              <label for="Description">Description</label>
              <textarea class="form-control" id="description" rows="4" readonly><?php echo $data['prescription']['description']?></textarea>
            </div>
    
          </form>
        </div>
      </div>
</div>



  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    console.log(date);
    var div = document.getElementById('date');
    div.setAttribute('value', date);
  </script>
</body>

</html>
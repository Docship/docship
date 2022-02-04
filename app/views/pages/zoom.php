<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/font-awesome-pro-5/css/all.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/style.css">
  <title>Profile</title>
</head>

<body>
  <div class="vh-100 wrapper d-flex align-items-center bg-light">
    <div class="container">
      <div class="row justify-content-center ">
          <form class="col-sm-12 col-md-9 col-lg-7 px-5 py-5 " method="post" action="<?php echo URLROOT; ?>/appointment/zoom/<?php echo $data['appointment']['id']; ?>">
            <h2 class="text-center"> <b>Appointment</b> </h2>
            <div class="form-group">
              <label for="Appointment id">Appointment id</label>
              <input type="text" class="form-control" id="appointment-id" disabled value="<?php echo $data['appointment']['id']; ?>">
            </div>
            <div class="form-group">
              <label for="patient_name">Patient Name</label>
              <input type="text" class="form-control" id="patient-name" disabled value="<?php echo $data['appointment']['patient_firstname']; ?>">
            </div>
            <div class="form-group">
              <label for="doctor_name">Doctor Name</label>
              <input type="text" class="form-control" id="doctor-name" disabled value="Dr. <?php echo $data['appointment']['doctor_firstname']; ?>">
            </div>
            <div class="form-group">
              <label for="text">Date</label>
              <input type="text" class="form-control" id="date" disabled value="<?php echo $data['appointment']['date']; ?>">
            </div>
            <div class="form-group">
              <label for="time">Time</label>
              <input type="text" class="form-control" id="time" disabled value="<?php echo $data['appointment']['time']; ?>">
            </div>
            <div class="form-group">
              <label for="link">Add zoom link</label>
              <input type="text" class="form-control" id="zoom-link" name="zoom-link" placeholder=" add zoom link here" value="<?php echo $data['appointment']['zoom_link']?>">
            </div>
    
            <button class="btn btn-primary w-100 mt-2" type="submit">Add Zoom Link</button>
          </form>
        </div>
      </div>
</div>



  <script src="<?php echo URLROOT ?>/js/bootstrap.bundle.min.js"></script>
</body>

</html>
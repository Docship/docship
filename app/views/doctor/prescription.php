<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome-pro-5/css/all.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
  <title>Prescription</title>
</head>

<body>
  <div class="vh-100 wrapper d-flex align-items-center bg-light">
    <div class="container">
      <div class="row justify-content-center ">
          <form class="col-sm-12 col-md-9 col-lg-7 px-5 py-5 " method="POST" action="<?php echo URLROOT."/prescription/add/".$data['appointment_id']; ?>">
            <h2 class="text-center"><b>Prescription</b></h2>
            <div class="form-group">
              <label for="patient_name">Patient Name</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name of the patient" disabled value="<?php echo $data['patient']['firstname']; ?>">
            </div>
            <div class="form-group">
              <label for="text">Issue Date</label>
              <input type="date" class="form-control" id="date" name="issue_date" value="<?php echo $data['issue_date']; ?>">
            </div>
            <div class="form-group">
              <label for="text">Patient Telephone</label>
              <input type="tel" class="form-control" id="date" value="<?php echo $data['patient']['telephone']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" name="subject" id="description" placeholder="subject"
              value="<?php echo $data['subject'];?>" required>
            </div>
    
            <div class="form-group">
              <label for="Description">Description</label>
              <textarea class="form-control" name="desc" id="description" rows="4" required><?php echo $data['desc'];?></textarea>
            </div>
    
            <button class="btn btn-primary w-100 mt-2" type="submit">Add Prescription</button>
          </form>
        </div>
      </div>
</div>



  <script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>
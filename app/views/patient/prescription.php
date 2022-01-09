<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/font-awesome-pro-5/css/all.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Profile</title>
</head>

<body>
  <div class="vh-100 wrapper d-flex align-items-center bg-light">
    <div class="container">
      <div class="row justify-content-center ">
          <form class="col-sm-12 col-md-9 col-lg-7 px-5 py-5 ">
            <h2 class="text-center"> <b>Prescription</b> </h2>
            <div class="form-group">
              <label for="patient_name">Name</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name of the patient" disabled value="Name fo the patient">
            </div>
            <div class="form-group">
              <label for="text">Date</label>
              <input type="text" class="form-control" id="date" disabled>
            </div>
            <div class="form-group">
              <label for="text">Phone No</label>
              <input type="tel" class="form-control" id="date" value="0776048702" disabled>
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" id="description" placeholder="subject">
            </div>
    
            <div class="form-group">
              <label for="Description">Description</label>
              <textarea class="form-control" id="description" rows="4"></textarea>
            </div>
    
            <button class="btn btn-primary w-100 mt-2" type="submit">Add Prescription</button>
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
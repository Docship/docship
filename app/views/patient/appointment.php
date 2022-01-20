<?php require_once APPROOT . "/views/inc/error_input.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
  <!-- Fontawesome Css -->
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome-pro-5/css/all.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/form.css">

  <title>DocShip | LogIn</title>
</head>

<body>
  <div class="container-fluid appointments-form">
    <div class="row">
      <div class="col-lg-5 image-appointments"></div>

      <div class="col-lg-7 px-5 fill">
        <?php echo $data['receipt_err']; ?>
        <form action="<?php echo URLROOT; ?>\appointment\add" method="post" class="mx-sm-3 mx-md-4 mx-lg-5 my-5">
          <h1 class="text-center topic my-0">New Appointment</h1>
          <p class="text-center mb-2"></p>
          <div class="form-row">
            <div class="col-sm-12" id="log-email">
              <input placeholder="Date" name="date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" class="form-control form-control-lg shadow-none" value="<?php echo $data['date']; ?>"/>
              <div><?php
                    echo getErrorMessage($data['date_err']);
                    ?></div>
            </div>

            <script type="text/javascript">
              function setCharge() {
                var e = document.getElementById("doctors");
                var doctor_id = e.value;
                //var select = document.getElementById('doctors');
                var doc_lst = <?php echo json_encode($data['doctors']); ?>;
                //document.getElementById("charge").value = doc_lst.length;
                doc_lst.forEach(doctor => {
                  if (doctor['id'] == doctor_id) {
                    document.getElementById("charge").value = doctor['charge_amount'];
                    setTime(doctor['working_from'],doctor['working_to']);
                  }
                });
              }

              function setDoctors() {
                var e = document.getElementById("category");
                var doctor_category = e.value;
                var doc_lst = <?php echo json_encode($data['doctors']); ?>;
                var select = document.getElementById('doctors');
                document.getElementById("doctors").disabled = false;
                document.getElementById("doctors_err").style.color = "white";
                document.getElementById("doctors_err").innerHTML = "demo";
                document.getElementById('doctors').getElementsByTagName('option')[0].selected = 'selected';

                // clear all earlier operations
                var length = select.options.length;
                for (i = length - 1; i > 0; i--) {
                  select.options[i] = null;
                }

                var exist = false;
                //document.getElementById("charge").value = doc_lst.length;
                doc_lst.forEach(doctor => {
                  if (doctor['category'] == doctor_category) {
                    exist = true;
                    var opt = document.createElement('option');
                    opt.value = doctor['id'];
                    opt.innerHTML = "Dr. " + doctor['firstname'];
                    select.appendChild(opt);
                  }
                });

                if (!exist) {
                  document.getElementById("doctors").disabled = true;
                  document.getElementById("doctors_err").innerHTML = "Sorry no any doctors were found for this category";
                  document.getElementById("doctors_err").style.color = "red";
                }
              }

              function setTime(start,end){
                console.log("Enter set time");
                    var from=start.split(':');
                    var to =end.split(":");

                    var startTimeObject = new Date();
                    startTimeObject.setHours(from[0], from[1],from[2]);
                    //console.log(startTimeObject.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));

                    var endTimeObject = new Date();
                    endTimeObject.setHours(to[0], to[1], to[2]);
                    //console.log(endTimeObject.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));

                    const timeSlot=document.getElementById('time-slices');
                    timeSlot.innerHTML="<option selected disabled>Time</option>";

                    startTimeObject.setMinutes( startTimeObject.getMinutes());
                    var dd=startTimeObject.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
                        //console.log(startTimeObject.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));
                    timeSlot.innerHTML+="<option>"+dd+"</option>";

                    while(startTimeObject<endTimeObject){
                        startTimeObject.setMinutes( startTimeObject.getMinutes() + 30 );
                        var dd=startTimeObject.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
                        //console.log(startTimeObject.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));
                        timeSlot.innerHTML+="<option>"+dd+"</option>";
                    }
                  }
            </script>

            <div class="col-sm-12">
              <select id="category" name="category" class="form-control form-control-lg shadow-none" onchange="setDoctors();">
                <option selected disabled>Specialization</option>
                <option <?php echo ((isset($data['category'])) && $data['category'] == "Allergist") ? "selected" : ""; ?>>Allergist</option>
                <option <?php echo ((isset($data['category'])) && $data['category'] == "Dermatologist") ? "selected" : ""; ?>>Dermatologist</option>
                <option <?php echo ((isset($data['category'])) && $data['category'] == "Ophthalmologist") ? "selected" : ""; ?>>Ophthalmologist</option>
                <option <?php echo ((isset($data['category'])) && $data['category'] == "Obstetrician") ? "selected" : ""; ?>>Obstetrician</option>
                <option <?php echo ((isset($data['category'])) && $data['category'] == "Gynecologist") ? "selected" : ""; ?>>Gynecologist</option>
                <option <?php echo ((isset($data['category'])) && $data['category'] == "Cardiologist") ? "selected" : ""; ?>>Cardiologist</option>
                <option <?php echo ((isset($data['category'])) && $data['category'] == "Endocrinologist") ? "selected" : ""; ?>>Endocrinologist</option>
                <option <?php echo ((isset($data['category'])) && $data['category'] == "Gastroenterologist") ? "selected" : ""; ?>>Gastroenterologist</option>
              </select>
              <div><?php
                    echo getErrorMessage($data['category_err']);
                    ?></div>
            </div>

            <div class="col-sm-12" id="role">
              <select id="doctors" name="doctor" class="form-control form-control-lg shadow-none" onchange="setCharge();">
                <option selected disabled>Doctor</option>
                <?php
                  if(isset($data['doctors']) && !empty($data['doctors'])){
                    foreach($data['doctors'] as $doctor){
                      if($doctor['id']==$data['doctor']){
                        echo "<option value".$doctor['id']." selected> Dr. ".$doctor['firstname']."</option>";
                      }
                    }
                  }
                ?>

              </select>
              <div id="doctors_err"><?php
                    echo getErrorMessage($data['doctor_err']);
                    ?></div>
            </div>

            <div class="col-sm-12" id="role">
              <input class="form-control form-control-lg shadow-none" id="charge" name="charge" type="number" step="0.01" placeholder="charge" value="<?php echo $data['charge'];?>" readonly/>

              <div><?php
                    echo getErrorMessage($data['amount_err']);
                    ?></div>
            </div>


            <div class="col-sm-12" id="role">
              <select id="time-slices" name="time" class="form-control form-control-lg shadow-none">
                <option selected disabled>Time</option>
                
              </select>
              <div><?php
                    if($data['isExist']){
                      echo getErrorMessage("Already appointment exist for this time.");
                    }
                    else {
                      echo getErrorMessage($data['time_err']);
                    }
                    //echo $data['time_24hrs'];
                    ?></div>
            </div>

          </div>
          <button type="submit" class="btn btn-primary btn-lg w-100 shadow-none my-1" name="submit_patient" id="submit-log">
            Create new Appointment
          </button>
          <p class="text-center">
            Want to quit? <a href="<?php echo URLROOT; ?>\patient\appointments" id="sign-up" class="sign-up">cancel</a>
          </p>
        </form>
      </div>
    </div>
    <!--row-->
  </div>
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
  <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo URLROOT; ?>/js/loginSignup.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
                var e = document.getElementById("category");
                var doctor_category = e.value;
                if(doctor_category!="Specialization"){
                  var doc_lst = <?php echo json_encode($data['doctors']); ?>;
                  var select = document.getElementById('doctors');
                  document.getElementById("doctors").disabled = false;
                  document.getElementById("doctors_err").style.color = "white";
                  document.getElementById("doctors_err").innerHTML = "demo";
                  document.getElementById('doctors').getElementsByTagName('option')[0].selected = 'selected';

                  // clear all earlier operations
                  var length = select.options.length;
                  for (i = length - 1; i > 0; i--) {
                    select.options[i] = null;
                  }

                  var exist = false;
                  //document.getElementById("charge").value = doc_lst.length;
                  doc_lst.forEach(doctor => {
                    if (doctor['category'] == doctor_category) {
                      exist = true;
                      var opt = document.createElement('option');
                      opt.value = doctor['id'];
                      opt.innerHTML = "Dr. " + doctor['firstname'];
                      select.appendChild(opt);
                    }
                  });

                  if (!exist) {
                    document.getElementById("doctors").disabled = true;
                    document.getElementById("doctors_err").innerHTML = "Sorry no any doctors were found for this category";
                    document.getElementById("doctors_err").style.color = "red";
                  }
                }

        });



  </script>

</body>

</html>
<?php 
  function getStatusColor($status){
    switch($status){
      case 'PENDING':
        return 'orange';
      case 'CONFIRMED':
        return 'green';
      case 'CANCELED':
        return 'red';
      default: return 'black';       
    }
  }
?>
<?php require_once APPROOT . "/views/inc/header_patient.php"; ?>


<!-- Appointments -->
<main role="main" class="appointments col-md-9 ml-sm-auto col-lg-10 px-md-4" id="b">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="title">Appointments</h2>
<<<<<<< HEAD
    <!--
    <div class="show-appointment-error">
          
    </div>
-->
      <div class="btn-toolbar mb-2 mb-md-0">
=======
    <div class="show-appointment-error">
          <?php 
            $message = "";
            if(isset($data['db_err'])){ $message .= 'System was failed to do the task.' . '</br>';}
            else {
              if(isset($data['date_err']) && !empty($data['date_err'])){
                if($data['date_err'] == 'invalid_input'){ $message .= 'You entered date input is invalid'. '</br>';}
                else {
                  $message .= $data['date_err']. '</br>';
                }
              }if(isset($data['time_err']) && !empty($data['time_err'])){
                if($data['time_err'] == 'invalid_input'){ $message .= 'You entered time input is invalid'. '</br>';}
                else {
                  $message .= $data['time_err']. '</br>';
                }
              }
            }
            echo $message;
          ?>
    </div>
      <div class="btn-toolbar mb-2 mb-md-0<?php echo !(isset($data['doctors']) && !empty($data['doctors']))? ' invisible':''; ?>">
>>>>>>> dev-dil
        <button type="button" class="btn btn-sm btn-outline-primary" id="appointment-form">
          <span data-feather="calendar"></span>
          New Appointment
        </button>
      </div>
  </div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2">
<<<<<<< HEAD
    <h2 class="subtitle">Upcoming Appointments</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
=======
    <!--<h2 class="subtitle">All Appointments</h2>-->
    <div class="btn-toolbar mb-2 mb-md-0<?php echo !(isset($data['appointments']) && !empty($data['appointments']))? ' invisible':''; ?>">
>>>>>>> dev-dil
      <button type="button" class="btn btn-sm btn-outline-danger d-flex justify-content-center" id="appointment-form">
        <span data-feather="x-circle" class="mr-2"></span>
        Cancel
      </button>

    </div>
  </div>

  <div class="table-responsive">
<<<<<<< HEAD
        <?php 
          if(isset($data['appointments'])){
            if(!empty($data['appointments'])){
              echo "<table class='table table-striped table-sm' >";
              echo "<thead>";
              echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Date</th>";
                echo "<th>Time</th>";
                echo "<th>Doctor ID</th>";
                echo "<th>Status</th>";
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              foreach($data['appointments'] as $appointment){
                $r1 = "<td><input type='checkbox' >". $appointment['id'] . "</td>";
                $r2 = "<td>" . $appointment['date'] . "</td>";
                $r3 = "<td>" . $appointment['time'] . "</td>";
                $r4 = "<td>" . $appointment['doctor_id'] . "</td>";
                $color = getStatusColor($appointment['status']);
                $r5 = "<td><span class= 'status " . $color . "'></span>".$appointment['status'] . "</td>";
                $row = "<tr>" . $r1 .$r2 . $r3 . $r4 . $r5 . "</tr>";

                echo $row;
              }
              echo " </tbody>";
              echo "</table>";
             
            }else {
              echo "<br><p>" . 'No any Appointment available.' . "</p>";
            }
          }else {
            echo "<br><p style='color:red'>" . 'System failure.' . "</p>";
          }
        ?>
=======
    <table class="table table-striped table-sm<?php echo !(isset($data['appointments']))? ' invisible':''; ?>" >
      <thead>
        <tr>
          <th>ID</th>
          <th>Date</th>
          <th>Time</th>
          <th>Doctor ID</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          if(isset($data['appointments'])){
            if(!empty($data['appointments'])){
              foreach($data['appointments'] as $appointment){
                $r1 = "<td><input type='checkbox' >". $appointment['id'] . "</td>";
                $r2 = "<td>" . $appointment['date'] . "</td>";
                $r3 = "<td>" . $appointment['doctor_id'] . "</td>";
                $color = getStatusColor($appointment['status']);
                $r4 = "<td><span class= 'status " . $color . "'></span>".$appointment['status'] . "</td>";
                $row = "<tr>" . $r1 .$r2 . $r3 . $r4 . "</tr>";

                echo $row;
              }
             
            }else {
              echo "<p>" . 'No any Appointment available.' . "</p>";
            }
          }
        ?>
      </tbody>
    </table>
>>>>>>> dev-dil
  </div>
</main>

<!-- Appointment form -->

<div class="popup-container">
  <div class="close-btn">&times;</div>
  <div class="container">
    <form action="<?php echo URLROOT; ?>/appointment/add" method="post"class="mx-sm-1 mx-md-2 mx-lg-3 my-5">
      <h2 class="text-center subtitle">New Appointment</h2>

      <input placeholder="Date" name="day" class="form-control  my-2 " type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />

      <select id="inputGender" name="category" id="category" class="form-control shadow-none">
                                <option selected disabled>Specialization</option>
                                <option>Allergist</option>
                                <option>Dermatologist</option>
                                <option>Ophthalmologist</option>
                                <option>Obstetrician</option>
                                <option>Gynecologist</option>
                                <option>Cardiologist</option>
                                <option>Endocrinologist</option>
                                <option>Gastroenterologist</option>
      </select>


      <select id="doctor" class="form-control my-2 ">
        <option selected>Doctor</option>
        <?php
<<<<<<< HEAD
        if(isset($data['doctors']) && !empty($data['doctors'])){
=======
        if(isset($data['doctors']) && !is_null($data['doctors'])){
>>>>>>> dev-dil
          $category = $dochtml->getElementById('category');
          if(is_null($category)){
            foreach($data['doctors'] as $doctor){
              $option = "<option value = ".$doctor['id'] ."> Dr ". $doctor['firstname'] . "</option>" ;
              echo $option;
            }
          }else {
            foreach($data['doctors'] as $doctor){
              if($doctor['category'] == $category){
                $option = "<option value = ".$doctor['id'] ."> Dr ". $doctor['firstname'] . "</option>" ;
                echo $option;
              }
              
            }
          }
        }
      ?>
      </select>

      <?php 
        if(isset($data['doctors']) && !is_null($data['doctors'])){
          $doctor_id = $dochtml->getElementById('doctor');
          if($doctor_id!=null){
            $amount = 0.0;
            foreach($data['doctors'] as $doctor){
              if($doctor['id'] == $doctor_id){
                $amount = $doctor['charge_amount'];
                echo "<input class='form-control' name='amount' id='amount' type='text' placeholder='charge' value='Rs. " . $amount. "' disabled>";
              }
            }
          }
        }
      
      ?>
      
      <!--<input class="form-control" name="amount" id="amount" type="text" placeholder="charge" disabled>-->

      <select id="inputTime" class="form-control my-2 ">
        <option selected>Time</option>
        <option>05.00Am</option>
                                <option>06.00Am</option>
                                <option>07.00Am</option>
                                <option>08.00Am</option>
                                <option>09.00Am</option>
                                <option>10.00Am</option>
                                <option>11.00Am</option>
                                <option>12.00Pm</option>
                                <option>01.00Pm</option>
                                <option>02.00Pm</option>
                                <option>03.00Pm</option>
                                <option>04.00Pm</option>
                                <option>05.00Pm</option>
                                <option>06.00Pm</option>
                                <option>07.00Pm</option>
                                <option>08.00Pm</option>
                                <option>09.00Pm</option>
                                <option>10.00Pm</option>
                                <option>11.00Pm</option>
                                <option>12.00Pm</option>
      </select>



      <button type="submit" class="btn btn-primary w-100 my-2">
        Create new Appointment
      </button>


    </form>
  </div>
</div>


<<<<<<< HEAD
<?php require_once APPROOT . "/views/inc/footer.php"; ?>
=======
<?php require_once APPROOT . "/views/inc/footer_patient.php"; ?>
>>>>>>> dev-dil

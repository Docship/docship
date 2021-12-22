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
    <!--
    <div class="show-appointment-error">
          
    </div>
-->
      <div class="btn-toolbar mb-2 mb-md-0">
        <button type="button" class="btn btn-sm btn-primary" id="appointment-form">
          <span data-feather="calendar"></span>
          New Appointment
        </button>
      </div>
  </div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2">
    <h2 class="subtitle">Upcoming Appointments</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
      <button type="button" class="btn btn-sm btn-danger d-flex justify-content-center" id="appointment-form">
        <span data-feather="x-circle" class="mr-2"></span>
        Cancel
      </button>

    </div>
  </div>

  <div class="table-responsive">
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
  </div>
</main>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
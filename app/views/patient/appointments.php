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
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
    <h2 class="title">Appointments</h2>

      <div class="btn-toolbar mb-md-0">
        <a type="button" href="<?php echo URLROOT; ?>/appointment/add" class="btn btn-sm btn-primary" id="appointment-form">
          <span data-feather="calendar"></span>
          New Appointment
        </a>
      </div>
  </div>

  <form class="my-1 border-bottom d-flex justify-content-end">
  <script src="<?php echo URLROOT; ?>/js/appointment_cancel.js"></script>
    <div class="row">
      <div class="col">
        <select id="status" class="custom-select form-select ">
          <option selected>Status</option>
          <option value="confirmed">Confirmed</option>
          <option value="pending">Upcoming</option>
        </select>
      </div>

      <div class="col pr-0">
      <button type="button" class="btn btn-sm btn-danger d-flex justify-content-center" id="appointment-cancel" onclick="cancel();">
        <span data-feather="x-circle" class="mr-2"></span>
        Cancel
      </button>
      </div>
    </div>
  </form>


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
                echo "<th>Doctor</th>";
                echo "<th>Receipt ID</th>";
                echo "<th>Status</th>";
                //echo "<th>Action</th>";
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              foreach($data['appointments'] as $appointment){
                $r1 = "<td><input class='appointmentCheckbox' id='appointment-id' type='checkbox' value='".$appointment['id']."' >". $appointment['id'] . "</td>";
                $r2 = "<td>" . $appointment['date'] . "</td>";
                $r3 = "<td>" . date('h:i A', strtotime($appointment['time'])) . "</td>";
                $r4 = "<td><a href='".URLROOT."/doctor/detail/".$appointment['doctor_id']."'>Dr. " . $appointment['firstname'] . "</a></td>";
                $r5 = "<td><a href='".URLROOT."/receipt/show/".$appointment['receipt_id']."'>" . $appointment['receipt_id'] . "</a></td>";
                $color = getStatusColor($appointment['status']);
                $r6 = "<td><span class= 'status " . $color . "'></span>".$appointment['status'] . "</td>";
                
                $row = "<tr>" . $r1 .$r2 . $r3 . $r4 . $r5 . $r6 . "</tr>";

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
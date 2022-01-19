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

  function getPersonStatus($status){
    switch($status){
      case 'Male':
        return 'Mr';
      case 'Female':
        return 'Mrs';
      default: return 'Mr';       
    }
  }

  function getPaymentStatus($status){
    switch($status){
      case '0':
        return '<p style="color: red"> Not Paid</p>';
      case '1':
        return '<p style="color: green">Paid</p>';
      default: return 'Mr';       
    }
  }
?>
<?php require_once APPROOT."/views/inc/header_admin.php"; ?>
<main role="main" class="appointments col-md-9 ml-sm-auto col-lg-10 px-md-4" id="B">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Appointments</h2>
          <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div> -->
          </div>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2">
        <h2 class="subtitle">Upcoming Appointments</h2>
        <script src="<?php echo URLROOT; ?>/js/appointment_paid.js"></script>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div>
          <button type="button" class="btn btn-sm btn-outline-danger d-flex justify-content-center" id="appointment-form" onclick="paid();">
            <span data-feather="x-circle" class="mr-2"></span>
            Marks Paid
          </button>
          </div>
          <div>
          <button type="button" class="btn btn-sm btn-outline-danger d-flex justify-content-center" id="appointment-form" onclick="unpaid();">
            <span data-feather="x-circle" class="mr-2"></span>
            Marks UnPaid
          </button>
          </div>
      
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
                echo "<th>Patient</th>";
                echo "<th>Doctor</th>";
                echo "<th>Status</th>";
                echo "<th>Payment</th>";
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              foreach($data['appointments'] as $appointment){
                $r1 = "<td><input class='appointmentCheckbox' id='appointment-id' type='checkbox' value='".$appointment['id']."' >". $appointment['id'] . "</td>";
                $r2 = "<td>" . $appointment['date'] . "</td>";
                $r3 = "<td>" . $appointment['time'] . "</td>";
                $r4 = "<td>". getPersonStatus($appointment['patient_gender']). ". " . $appointment['patient_firstname'] . "</td>";
                $r5 = "<td><a href='".URLROOT."/doctor/detail/".$appointment['doctor_id']."'>Dr. " . $appointment['doctor_firstname'] . "</a></td>";
                $color = getStatusColor($appointment['status']);
                $r6 = "<td><span class= 'status " . $color . "'></span>".$appointment['status'] . "</td>";
                $r7 = "<td>". getPaymentStatus($appointment['is_paid']). "</td>";
                $row = "<tr>" . $r1 .$r2 . $r3 . $r4 . $r5 . $r6 . $r7 . "</tr>";

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

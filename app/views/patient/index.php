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
<?php require_once APPROOT."/views/inc/header_patient.php"; ?>
      <!-- Home -->
      <main role="main" class="home col-md-9 ml-sm-auto col-lg-10 px-md-4" id="A">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Home</h1>

        </div>

        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 highlight-card">
              <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                <div class="card-header">Appointments</div>
                  <div class="card-body">
                    <h5 class="card-title">Appointments Count</h5>
                    <p class="card-text">
                    <?php
                        if(isset($data['appointments_size'])){
                          echo $data['appointments_size'];
                        }elseif(isset($data['db_err_1']) && !empty($data['db_err_1'])){
                          echo $data['db_err_1'];
                        }else {
                          echo "System Error";
                        }
                      ?>
                    </p>
                  </div><!-- card body ends -->
              </div><!-- card ends -->
            </div><!-- column ends -->

            <div class="col-lg-4 highlight-card">
              <div class="card text-white bg-success mb-3" style="max-width: 50rem;">
                <div class="card-header">prescriptions</div>
                  <div class="card-body">
                    <h5 class="card-title">Prescriptions Count</h5>
                    <p class="card-text">
                      <?php
                        if(isset($data['prescriptions_size'])){
                          echo $data['prescriptions_size'];
                        }elseif(isset($data['db_err_2']) && !empty($data['db_err_2'])){
                          echo $data['db_err_2'];
                        }else {
                          echo "System Error";
                        }
                      ?>
                    </p>
                  </div><!-- card body ends -->
              </div><!-- card ends -->
            </div><!-- column ends -->

            <div class="col-lg-4 highlight-card">
              <div class="card text-white bg-danger mb-3" style="max-width: 50rem;">
                <div class="card-header">Receipt Arrears</div>
                  <div class="card-body">
                    <h5 class="card-title">Total Arrears</h5>
                    <p class="card-text">
                    Rs. <?php echo ($data['arrears'])?$data['arrears']:0.00; ?>
                    </p>
                  </div><!-- card body ends -->
              </div><!-- card ends -->
            </div><!-- column ends -->

          </div><!-- Row ends -->           
        </div><!-- Container-fluid ends -->
        
        <h2 class="subtitle">Upcoming Appointments</h2>
        <div class="table-responsive">
        <?php 
          if(isset($data['appointments'])){
            if(!empty($data['appointments'])){
              echo "<table class='table table-striped table-hover table-sm' >";
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
                $r1 = "<td>". $appointment['id'] . "</td>";
                $r2 = "<td>" . $appointment['date'] . "</td>";
                $r3 = "<td>" . date('h:i A', strtotime($appointment['time'])) . "</td>";
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
          }elseif(isset($data['db_err_1']) && !empty($data['db_err_1'])) {
            echo "<br><p style='color:red'>" . $data['db_err_1'] . "</p>";
          }else {
            echo "<br><p style='color:red'>" . 'System failure.' . "</p>";
          }
        ?>
        </div>
      </main>



      <?php require_once APPROOT."/views/inc/footer.php"; ?>

<?php require_once APPROOT."/views/inc/header_admin.php"; ?>
      <!-- Doctors -->
      <main role="main" class="doctors col-md-9 ml-sm-auto col-lg-10 px-md-4" id="B">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Patients</h2>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2">
        <h2 class="subtitle">Doctor List</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
        <script src="<?php echo URLROOT; ?>/js/delete.js"></script>
          <button type="button" class="btn btn-sm btn-outline-danger d-flex justify-content-center" id="appointment-form" onclick="pat_delete();">
            <span data-feather="trash-2" class="mr-2"></span>
            Delete
          </button>

        </div>
      </div>
        <div class="table-responsive">
          <?php
            if(isset($data['patients'])){
              if(!empty($data['patients'])){
                echo "<table class='table table-striped table-sm' >";
                echo "<thead>";
                echo "<tr>";
                  echo "<th>ID</th>";
                  echo "<th>Name</th>";
                  echo "<th>Gender</th>";
                  echo "<th>Telephone</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach($data['patients'] as $patient){
                  $r1 = "<td><input class='patientCheckbox' id='patient-id' type='checkbox' value='".$patient['id']."' >". $patient['id'] . "</td>";
                  $r2 = "<td>" . $patient['firstname'] . " " . $patient['lastname'] . "</td>";
                  $r3 = "<td>" . $patient['gender'] . "</td>";
                  $r4 = "<td>" . $patient['telephone'] . "</td>";
                  $row = "<tr>" . $r1 .$r2 . $r3 . $r4 . "</tr>";

                  echo $row;
                }
                echo " </tbody>";
                echo "</table>";

              }else {
                echo "<br><p>" . 'No any Patient available in the System.' . "</p>";
              }
            }else {
              echo "<br><p style='color:red'>" . 'System failure.' . "</p>";
            }
          ?>
        </div>
      </main>
<?php require_once APPROOT."/views/inc/footer.php"; ?>

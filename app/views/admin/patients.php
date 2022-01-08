
<?php require_once APPROOT."/views/inc/header_admin.php"; ?>
      <!-- Patients -->
      <main role="main" class="patients col-md-9 ml-sm-auto col-lg-10 px-md-4" id="C">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Patients</h2>
        </div>
        <h2 class="subtitle">Patient List</h2>
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
                  $r1 = "<td><input type='checkbox' >". $patient['id'] . "</td>";
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

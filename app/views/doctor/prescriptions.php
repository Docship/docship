<?php require_once APPROOT."/views/inc/header_doctor.php"; ?>
      <!-- Prescriptions -->
      <main role="main" class="prescriptions col-md-9 ml-sm-auto col-lg-10 px-md-4" id="E">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Prescriptions</h2>
        </div>
        <h2 class="subtitle">Prescriptions</h2>
        <div class="table-responsive">
        <?php 
          if(isset($data['prescriptions'])){
            if(!empty($data['prescriptions'])){
              echo "<table class='table table-striped table-sm' >";
              echo "<thead>";
              echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Date</th>";
                echo "<th>Patient ID</th>";
                echo "<th>Subject</th>";
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              foreach($data['prescriptions'] as $prescription){
                $r1 = "<td>". $prescription['id'] . "</td>";
                $r2 = "<td>" . $prescription['issue_date'] . "</td>";
                $r3 = "<td>" . $prescription['patient_id'] . "</td>";
                $r4 = "<td>" . $prescription['subject'] . "</td>";
                $row = "<tr>" . $r1 .$r2 . $r3 . $r4 . "</tr>";

                echo $row;
              }
              echo " </tbody>";
              echo "</table>";
             
            }else {
              echo "<br><p>" . 'No any Prescriptions available.' . "</p>";
            }
          }else {
            echo "<br><p style='color:red'>" . 'System failure.' . "</p>";
          }
        ?>
  </div>
      </main>
<?php require_once APPROOT."/views/inc/footer.php"; ?>

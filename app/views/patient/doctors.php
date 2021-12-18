<?php require_once APPROOT."/views/inc/header_patient.php"; ?>


<main role="main" class="doctors col-md-9 ml-sm-auto col-lg-10 px-md-4" id="C">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Doctors</h2>
        </div>
        <h2 class="subtitle">Doctor List</h2>
        <div class="table-responsive">
        <?php
          if(isset($data['doctors'])){
            if(!empty($data['doctors'])){
              echo "<table class='table table-striped table-sm' >";
              echo "<thead>";
              echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Name</th>";
                echo "<th>Gender</th>";
                echo "<th>Category</th>";
                echo "<th>Charge Amount</th>";
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              foreach($data['doctors'] as $doctor){
                $r1 = "<td>". $doctor['id'] . "</td>";
                $r2 = "<td>" . $doctor['firstname'] . " " . $doctor['lastname'] . "</td>";
                $r3 = "<td>" . $doctor['gender'] . "</td>";
                $r4 = "<td>" . $doctor['category'] . "</td>";
                $r5 = "<td> Rs. ".$doctor['charge_amount'] . "</td>";
                $row = "<tr>" . $r1 .$r2 . $r3 . $r4 . $r5 . "</tr>";

                echo $row;
              }
              echo " </tbody>";
              echo "</table>";

            }else {
              echo "<br><p>" . 'No any Doctor available in the System.' . "</p>";
            }
          }else {
            echo "<br><p style='color:red'>" . 'System failure.' . "</p>";
          }
        ?>
        </div>
</main>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
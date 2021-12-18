<?php require_once APPROOT."/views/inc/header_patient.php"; ?>

<!-- Doctors -->
<<<<<<< HEAD
<main role="main" class="invisible col-md-9 ml-sm-auto col-lg-10 px-md-4" id="C">
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
=======
<main role="main" class="doctors invisible col-md-9 ml-sm-auto col-lg-10 px-md-4" id="C">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Doctors</h2>
          <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary">
              <span data-feather="calendar"></span>
              New Appointment
            </button>
          </div>
        </div>
        <h2 class="subtitle">Doctor List</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1,001</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
              </tr>
              <tr>
                <td>1,002</td>
                <td>placeholder</td>
                <td>irrelevant</td>
                <td>visual</td>
                <td>layout</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>data</td>
                <td>rich</td>
                <td>dashboard</td>
                <td>tabular</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>information</td>
                <td>placeholder</td>
                <td>illustrative</td>
                <td>data</td>
              </tr>             
            </tbody>
          </table>
        </div>
      </main>
      <?php require_once APPROOT."/views/inc/footer_patient.php"; ?>
>>>>>>> dev-dil

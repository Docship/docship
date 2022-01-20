<?php require_once APPROOT."/views/inc/header_admin.php"; ?>
      <!-- Doctors -->
      <main role="main" class="doctors col-md-9 ml-sm-auto col-lg-10 px-md-4" id="B">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Doctors</h2>
          <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div> -->
            <a href="<?php echo URLROOT; ?>\admin\doctor_register" type="button" class="btn btn-sm btn-outline-primary" id="appointment-form">
              <span data-feather="user-plus"></span>
              Register New
            </a>
          </div>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2">
        <h2 class="subtitle">Doctor List</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
        <script src="<?php echo URLROOT; ?>/js/delete.js"></script>
          <button type="button" class="btn btn-sm btn-outline-danger d-flex justify-content-center" id="appointment-form" onclick="doc_delete();">
            <span data-feather="trash-2" class="mr-2"></span>
            Delete
          </button>

        </div>
      </div>

        <div class="table-responsive">
          <?php
            if(isset($data['doctors'])){
              if(!empty($data['doctors'])){
                echo "<table class='table table-striped table-sm' >";
                echo "<thead>";
                echo "<tr>";
                  echo "<th>ID</th>";
                  echo "<th>Name</th>";
                  echo "<th>Email</th>";
                  echo "<th>Gender</th>";
                  echo "<th>Category</th>";
                  echo "<th>Charge Amount</th>";
                  echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach($data['doctors'] as $doctor){
                  //$r1 = "<td><a href='\docship\doctor\detail\\"."".$doctor['id']."'>". $doctor['id'] . "</a></td>";
                  $r1 = "<td><input class='doctorCheckbox' id='doctor-id' type='checkbox' value='".$doctor['id']."' >". "<a href='\docship\doctor\detail\\"."".$doctor['id']."'>". $doctor['id'] . "</a>" . "</td>";
                  $r2 = "<td>" . $doctor['firstname'] . " " . $doctor['lastname'] . "</td>";
                  $r3 = "<td>" . $doctor['email'] . "</td>";
                  $r4 = "<td>" . $doctor['gender'] . "</td>";
                  $r5 = "<td>" . $doctor['category'] . "</td>";
                  $r6 = "<td> Rs. ".$doctor['charge_amount'] . "</td>";
                  $href= URLROOT."/doctor/payment/".$doctor['id'];
                  $r7 = "<td>"."<a href='".$href."'><button>Payment</button></a>"."</td>";
                  $row = "<tr>" . $r1 .$r2 . $r3 . $r4 . $r5 . $r6 . $r7 . "</tr>";

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

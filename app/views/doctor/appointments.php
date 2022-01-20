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

  function getConfirmTick($condition , $id){
    switch($condition){
      case '1':
        return "<td><input class='appointmentCheckbox' id='appointment-id' type='checkbox' value='".$id."' disabled>". $id . "</td>";
      case '0':
        return "<td><input class='appointmentCheckbox' id='appointment-id' type='checkbox' value='".$id."' disabled>". $id . "</td>";
      default: return "<td><input class='appointmentCheckbox' id='appointment-id' type='checkbox' value='".$id."' disabled>". $id . "</td>";       
    }
  }
?>
<?php require_once APPROOT."/views/inc/header_doctor.php"; ?>
<main role="main" class="appointments col-md-9 ml-sm-auto col-lg-10 px-md-4" id="B">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Appointments</h2>
          <div class="btn-toolbar mb-2 mb-md-0">

            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-success d-flex justify-content-center" id="appointment-form" onclick="confirm();">
                <span data-feather="x-circle" class="mr-2"></span>
                Confirm
              </button>
            </div>
          </div>
        </div>

        <form class="my-1 d-flex justify-content-center border-bottom">
        <script src="<?php echo URLROOT; ?>/js/appointment_button.js"></script>
          <div class="form-row mx-2">
            <div class="col-12 col-md-auto">
              <input id="filter-name" type="text" class="form-control" placeholder="Search">
            </div>

            <div class="col-auto">
              <select id="search" class="custom-select">
                <option value = "id" >Search by Id</option>
                <option value="name" selected>Search by Name</option>
                <option value="date">Search by Date</option>
                <option value="receipt">Search by Receipt</option>
              </select>
            </div>

            
            <div class="col-auto">
              <select id="status" class="custom-select" onchange="setUrlAppoinmentDoc(this.value);">
                <option value="pending" selected>Upcoming</option>
                <option value="confirmed">Confirmed</option>
              </select>
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
                echo "<th>Patient</th>";
                echo "<th>Patient Tel.</th>";
                echo "<th>Status</th>";
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              foreach($data['appointments'] as $appointment){
                $r1 = getConfirmTick($appointment['is_paid'] , $appointment['id']);
                $r2 = "<td>" . $appointment['date'] . "</td>";
                $r3 = "<td>" . date('h:i A', strtotime($appointment['time'])) . "</td>";
                $r4 = "<td>" . $appointment['firstname'] . "</td>";
                $r5 = "<td>" . $appointment['telephone'] . "</td>";
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

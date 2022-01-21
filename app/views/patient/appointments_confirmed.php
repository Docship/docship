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

  function getRateButton($rate , $id , $confirm){
    $href= URLROOT."/rate/add/".$id;
    if($rate == '1'){
      $b = "<a><button class='btn btn-sm btn-warning d-flex justify-content-center ml-2' disabled>Rate</button></a>";
      return $b;
    }else if($confirm == "CONFIRMED") {
      $b = "<a href='".$href."'><button class='btn btn-sm btn-warning d-flex justify-content-center ml-2'>Rate</button></a>";
      return $b;
    }else {
      $b = "<a><button class='btn btn-sm btn-warning d-flex justify-content-center ml-2' disabled>Rate</button></a>";
      return $b;
    }
  }
?>
<?php require_once APPROOT . "/views/inc/header_patient.php"; ?>


<!-- Appointments -->
<main role="main" class="appointments col-md-9 ml-sm-auto col-lg-10 px-md-4" id="b">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-2">
    <h2 class="title">Appointments</h2>
    <!--
    <div class="show-appointment-error">
          
    </div>
-->
  </div>
  <form class="my-1 d-flex justify-content-center border-bottom">
  <script src="<?php echo URLROOT; ?>/js/appointment_button.js"></script>
    <div class="form-row mx-2 mb-2">
      <div class="col-12 col-md-auto">
        <input id="filter" type="text" class="form-control" placeholder="Search">
      </div>

      <div class="col-auto">
        <select id="search" class="custom-select">
        <option value = "app-id" >Search by Id</option>
          <option value="name-of-doc" selected>Search by Name</option>
          <option value="app-date">Search by Date</option>
        </select>
      </div>

      
      <div class="col-auto">
        <select id="status" class="custom-select" onchange="setUrlAppoinmentPat(this.value);">
          <option value="pending">Upcoming</option>
          <option value="confirmed" selected>Confirmed</option>
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
                echo "<th>Doctor</th>";
                echo "<th>Status</th>";
                echo "<th>Rating</th>";
                //echo "<th>Action</th>";
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              foreach($data['appointments'] as $appointment){
                $r1 = "<td class='app-id'>". $appointment['id'] . "</td>";
                $r2 = "<td class='app-date'>" . $appointment['date'] . "</td>";
                $r3 = "<td class='app-time'>" . date('h:i A', strtotime($appointment['time'])) . "</td>";
                $r4 = "<td class='name-of-doc'><a href='".URLROOT."/doctor/detail/".$appointment['doctor_id']."'>Dr. " . $appointment['firstname'] . "</a></td>";
                $color = getStatusColor($appointment['status']);
                $r5 = "<td><span class= 'status " . $color . "'></span>".$appointment['status'] . "</td>";
                //$r6 = "<td><button type='submit' id='".$appointment['id']."1'>Precription</button></td>";
                $r7 = "<td>".getRateButton($appointment['is_rated'] , $appointment['id'] , $appointment['status'])."</td>";
                $row = "<tr class='appoinments'>" . $r1 .$r2 . $r3 . $r4 . $r5 .$r7 . "</tr>";

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

<script>
  const listOfAppoinments = document.getElementsByClassName('appoinments');

  function filterfunction(selectedFilter,input) {
    var filterByName = input.value.toUpperCase();
    for (let i = 0; i < listOfAppoinments.length; i++) {
      const name = listOfAppoinments[i].getElementsByClassName(selectedFilter);
      console.log(name[0].innerHTML);
      if (name[0]) {
        var nameInsideH4 = name[0].innerHTML;

        if (nameInsideH4.toUpperCase().indexOf(filterByName) > -1) {
          listOfAppoinments[i].hidden = false;
        } else {
          listOfAppoinments[i].hidden = true;
        }
      }
    }
  }
  var input = document.getElementById('filter');
  input.addEventListener('keyup', e => {
    const selectedFilter=document.getElementById('search').value;
    filterfunction(selectedFilter,input);
  });

</script>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
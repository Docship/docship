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
    $href= URLROOT."/appointment/rate/".$id;
    if($rate == '1'){
      $b = "<a><button disabled>Rate</button></a>";
      return $b;
    }else if($confirm == "CONFIRMED") {
      $b = "<a".$href."><button>Rate</button></a>";
      return $b;
    }else {
      $b = "<a><button disabled>Rate</button></a>";
      return $b;
    }
  }
?>
<?php require_once APPROOT . "/views/inc/header_patient.php"; ?>


<!-- Appointments -->
<main role="main" class="appointments col-md-9 ml-sm-auto col-lg-10 px-md-4" id="b">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="title">Appointments</h2>
    <!--
    <div class="show-appointment-error">
          
    </div>
-->
  </div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2">
    <h2 class="subtitle">Confimed Appointments</h2>
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
                echo "<th>Doctor</th>";
                echo "<th>Status</th>";
                echo "<th>Rating</th>";
                //echo "<th>Action</th>";
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              foreach($data['appointments'] as $appointment){
                $r1 = "<td>". $appointment['id'] . "</td>";
                $r2 = "<td>" . $appointment['date'] . "</td>";
                $r3 = "<td>" . $appointment['time'] . "</td>";
                $r4 = "<td><a href='".URLROOT."/doctor/detail/".$appointment['doctor_id']."'>Dr. " . $appointment['firstname'] . "</a></td>";
                $color = getStatusColor($appointment['status']);
                $r5 = "<td><span class= 'status " . $color . "'></span>".$appointment['status'] . "</td>";
                //$r6 = "<td><button type='submit' id='".$appointment['id']."1'>Precription</button></td>";
                $r7 = "<td>".getRateButton($appointment['is_rated'] , $appointment['id'] , $appointment['status'])."</td>";
                $row = "<tr>" . $r1 .$r2 . $r3 . $r4 . $r5 .$r7 . "</tr>";

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
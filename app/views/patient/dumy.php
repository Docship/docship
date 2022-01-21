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


<h1>Test</h1>
<p><?php
/*
        $t1 =  date("H:i", strtotime("04:25 Pm")); 
        $t2 =  date("H:i", strtotime("08:25 Pm")); 
        $t3 =  date("H:i", strtotime("09:25 Pm")); 
        $start = strtotime($t1);
        $end = strtotime($t2);
        $time = strtotime($t3);
        
        if($time >= $start && $time <= $end) {
          echo "done";
        } else {
          echo "wrong";
        }
*/

        $date = '2021-12-26';
        $dayofweek = date('w', strtotime($date));
        $result    = date('Y-m-d', strtotime(($day - $dayofweek).' day', strtotime($date))); 
        $weekday = date('l', strtotime($date));
        $map = array(
          "Monday" => 1,
          "Tuesday" => 2,
          "Wednesday" => 3,
          "Thursday" => 4,
          "Friday" => 5,
          "Saturday" => 6,
          "Sunday" => 7
        );
        echo $weekday;
        echo $map[$weekday];
?></p>


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


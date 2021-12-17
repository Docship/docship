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
<p><?php echo $_SESSION['user_id']; ?></p>

<ul>
  <?php
    foreach ($data['doctors'] as $doctor) {
        echo "<li>".$doctor['firstname']."</li>";
    }
  ?>
</ul>

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


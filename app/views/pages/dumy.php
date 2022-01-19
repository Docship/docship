<?php
/*
echo $data['date']; echo "<br>";
echo $data['category']; echo "<br>";
echo $data['doctor']; echo "<br>";
echo $data['charge']; echo "<br>";
echo $data['time']; echo "<br>";

$doctor = $data['result'];
echo sizeof($doctor); echo "<br>";
echo $doctor[0]; echo "<br>";

*/



//echo $data['messages'];
echo "Dumy </br>";


foreach($result as $x => $x_value) {

  echo "Key=" . $x . ", Value=" . $x_value;
    
    foreach($x_value as $y => $y_value){
      echo "Key=" . $y . ", Value=" . $y_value;
    }
    
    echo "<br>";
  }




/*
$bytes = random_bytes(5);
$id = bin2hex($bytes);

echo $id;
*/


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
echo "Dumy Page </br>";

echo $day;

echo $working_days;

echo '<br>';

if(!strpos($working_days, strval($day))) echo 'false';
else echo 'true';

foreach($data as $x => $x_value) {

  echo "Key=" . $x . ", Value=" . $x_value . "<br>";
    
    foreach($x_value as $y => $y_value){
      echo "Key=" . $y . ", Value=" . $y_value;
    }
    
  }

//echo $sql;







/*
$bytes = random_bytes(5);
$id = bin2hex($bytes);

echo $id;
*/

function calculate_total($amount , $discount){
  echo $discount;
  if($discount==0.0){
      return $amount;
  }else {
      $percent = $discount;
      $discount = ($percent / 100) * $amount;
      $total = $amount - $discount;
      $total = number_format((float)$total, 2, '.', '');
      return $total;
  }
}


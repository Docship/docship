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
foreach($data1 as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

$data = $data1['data'];
/*
foreach($data as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
*/

$bytes = random_bytes(5);
$id = bin2hex($bytes);

echo $id;


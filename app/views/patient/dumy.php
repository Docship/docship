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

<?php
  if (isset($data['patient'])) {
    echo "set";
    $patient = $data['patient'];
    echo $patient['firstname'];
    echo $patient;
  }else{
    if (isset($data['isExist'])) {
      echo "null";
    }
  }
?>

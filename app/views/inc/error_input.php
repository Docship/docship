<?php
  function getErrorMessage($error)
  {
    $message = "";
    if (empty($error)) {
      $message = "<small>demo</small>";
      return $message;
    }else{
      $message = "<small style = 'color:red;'> ".$error." </small>";
      return $message;
    }
  }
?>
<?php
  // Simple page redirect
  function redirect($page , $params = []){
    if(empty($params)){
      header('location: ' . URLROOT . '/' . $page);
    }else {
      $variables = '';

      foreach($params as $key => $value){
        $variables+= '?' .$key . '=' . $value;
      }
      header('location: ' . URLROOT . '/' . $page . $variables);

    }
    
  }
  
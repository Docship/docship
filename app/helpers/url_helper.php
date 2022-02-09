<?php
  // Simple page redirect
  function redirect($page , $params = []){
    if(empty($params)){
      header('location: ' . URLROOT . '/' . $page);
    }else {
      $variables = '';
      $count = sizeof($params);
      if($count>0){
        $variables+='?';
        foreach($params as $key => $value){
          if($count>0){
            $variables+= $key . '=' . $value . '&';
          }else{
            $variables+= $key . '=' . $value;
          }
          $count-=1;
        }
      }
      $path = 'location: ' . URLROOT . '/' . $page . $variables;
      header($path);

    }
    
    
  }


  
<?php
  // avoid warning messages
  error_reporting(E_ERROR | E_PARSE);

  // Load Config
  require_once 'config/config.php';

  // Load Helpers
  require_once 'helpers/url_helper.php';

  session_start();

  // Autoload Core Libraries
  /*
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
  */
  

  require_once 'libraries/LibFactory.php';


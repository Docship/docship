<?php
  // avoid warning messages
  error_reporting(E_ERROR | E_PARSE);

  // Load Config
  include_once 'config/config.php';

  // Load Helpers
  include_once 'helpers/url_helper.php';

  session_start();

  // Autoload Core Libraries
  /*
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
  */

  include_once 'libraries/LibFactory.php';
  include_once 'libraries/Validate.php';
  include_once 'libraries/Date.php';

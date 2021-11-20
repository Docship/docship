<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  final class Core {

    protected $currentController = 'users';
    protected $currentMethod = 'index';
    protected $params = [];

    private static $core;

    private function __construct(){
      /*
      //print_r($this->getUrl());

      $url = $this->getUrl();
      // Look in controllers for first value
      if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);
      }
      elseif(isset($_SESSION['role'])){
        $this->currentController=$_SESSION['role'];
      }

      // Require the controller
      require_once '../app/controllers/'. $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;

      // Check for second part of url
      if(isset($url[1])){
        // Check to see if method exists in controller
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }

      // Get params
      $this->params = $url ? array_values($url) : [];
      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
      */
    }

    public function setAttributes(){
      $url = $this->getUrl();
      // Look in controllers for first value
      if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);
      }
      elseif(isset($_SESSION['role'])){
        $this->currentController=$_SESSION['role'];
      }

      // Require the controller
      require_once '../app/controllers/'. $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = ControllerFactory::getInstance()->getController($this->currentController);

      // Check for second part of url
      if(isset($url[1])){
        // Check to see if method exists in controller
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }

      // Get params
      $this->params = $url ? array_values($url) : [];
      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public static function getInstance(){

      if(!is_null(self::$core)){
        self::$core = new Core;
      }
      return self::$core;
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
    public static function get($path = null)
    {
  
      if ($path) {
        $config = $GLOBALS['config'];
        $path = explode('/', $path);
        foreach ($path as $bit) {
  
            if (isset($config[$bit])) {
              $config = $config[$bit];
            }
        }
        return $config;
      }
      return false;
    }
  } 
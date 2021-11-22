<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {

    protected $currentController = 'pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
    }

    public function setAttributes(){
      $url = $this->getUrl();

      if(!isset($_SESSION['role']) && !empty($url)){
        $this->currentController = 'User';
        $this->currentMethod = 'login';
        $this->params = [];

        // Require the controller Factory
        require_once '../app/controllers/'. 'ControllerFactory' . '.php';

        // Require the controller library
        require_once 'Controller.php';

        $controllers = ControllerFactory::getInstance();

        // Instantiate controller class
        $this->currentController = $controllers->getController($this->currentController);

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
      }
      elseif(!empty($url) && (isset($_SESSION['role']) || ucwords($url[0])!=ucwords('user'))){
        if(ucwords($url[0])!=$_SESSION['role']){
          $this->currentController = 'Pages';
          $this->currentMethod = 'prohibit';
          $this->params = [];

          // Require the controller Factory
          require_once '../app/controllers/'. 'ControllerFactory' . '.php';

          // Require the controller library
          require_once 'Controller.php';

          $controllers = ControllerFactory::getInstance();

          // Instantiate controller class
          $this->currentController = $controllers->getController($this->currentController);

          call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }
      }
      // Look in controllers for first value
      elseif(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
          // Unset 0 Index
        unset($url[0]);
        
      }
      elseif(isset($_SESSION['role'])){
        $this->currentController=$_SESSION['role'];
      }

      // Require the controller Factory
      require_once '../app/controllers/'. 'ControllerFactory' . '.php';

      // Require the controller library
      require_once 'Controller.php';

      $controllers = ControllerFactory::getInstance();

      // Instantiate controller class
      $this->currentController = $controllers->getController($this->currentController);

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
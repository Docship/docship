<?php
  /*
   * Base Controller
   * Loads the models and views
   */
  class Controller {
    // Load model
    public function model($model){
      // Require model file
      require_once '../app/models/ModelFactory.php';
      // Instatiate model
      return ModelFactory::getInstance()->getModel($model);
      //return new $model.'Model'(...$params);
    }

    // Load view
    public function view($view, $data = []){
      // Check for view file
      if(file_exists('../app/views/' . $view . '.php')){
        require_once '../app/views/' . $view . '.php';
      } else {
        // View does not exist
        die('View does not exist');
      }
    }

    public function getValidation(){
      $libraries = LibFactory::getInstance();
      $validate = $libraries->getLibrary("Validate");
      return $validate;
    }
  }
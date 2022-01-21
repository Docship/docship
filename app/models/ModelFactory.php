<?php
    class ModelFactory {

        private $models = array();

        private static $modelFactory;

        private function __construct(){}

        public static function getInstance(){

            if(is_null(self::$modelFactory)){
                self::$modelFactory = new ModelFactory;
            }
            return self::$modelFactory;
        }

        public function getModel($name){
            $name = ucwords($name);
            if(isset($models[$name])){
                return $models[$name];
            }else{
                //require_once '../app/libraries/LibFactory.php';
                // Require the Model
                try {
                    if (! @include_once( $name . 'Model.php' )){
                        throw new Exception ('functions.php does not exist');
                    }
                    //require_once $name . 'Model.php';
                    $model = $name . 'Model';
                    $lib = new $model;
                    $models[$name] = $lib;
                    return $lib;
                }
                catch(Exception $e) {    
                    return null;
                }
                
            }
        }
    }
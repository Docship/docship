<?php
    class ModelFactory {

        private $models = array();

        private static $modelFactory;

        private function __construct(){}

        public static function getInstance(){

            if(!is_null(self::$modelFactory)){
                self::$modelFactory = new ModelFactory;
            }
            return self::$modelFactory;
        }

        public function getModel($name){
            $name = ucwords($name);
            if(isset($libs[$name])){
                return $libs[$name];
            }else{
                $lib = new $name.'Model';
                $libs[$name] = $lib;
                return $lib;
            }
        }
    }
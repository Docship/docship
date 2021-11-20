<?php
    class ControllerFactory {

        private $controllers = array();

        private static $CtrlFactory;

        private function __construct(){}

        public static function getInstance(){

            if(!is_null(self::$CtrlFactory)){
                self::$CtrlFactory = new ControllerFactory;
            }
            return self::$CtrlFactory;
        }

        public function getController($name){
            $name = ucwords($name);
            if(isset($libs[$name])){
                return $libs[$name];
            }else{
                $lib = new $name;
                $libs[$name] = $lib;
                return $lib;
            }
        }
    }
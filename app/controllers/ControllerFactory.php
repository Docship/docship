<?php
    class ControllerFactory {

        private $controllers = array();

        private static $CtrlFactory;

        private function __construct(){}

        public static function getInstance(){

            if(is_null(self::$CtrlFactory)){
                self::$CtrlFactory = new ControllerFactory;
            }
            return self::$CtrlFactory;
        }

        public function getController($name){
            $name = ucwords($name);
            if(isset($controllers[$name])){
                return $controllers[$name];
            }else{
                // Require the controller
                require_once $name . '.php';
                $ctrl = new $name;
                $controllers[$name] = $lib;
                return $ctrl;
            }
        }
    }
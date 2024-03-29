<?php
    final class LibFactory {

        private $libs = array();

        private static $libFactory;

        private function __construct(){}

        public static function getInstance(){

            if(is_null(self::$libFactory)){
                self::$libFactory = new LibFactory;
            }
            return self::$libFactory;
        }

        public function getLibrary($name){
            $name = ucwords($name);
            if(isset($libs[$name])){
                return $libs[$name];
            }else{
                // Require the controller
                require_once $name . '.php';
                $lib = new $name;
                $libs[$name] = $lib;
                return $lib;
            }
        }
    }
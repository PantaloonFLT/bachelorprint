<?php

class modules {

    var $debugMode  = false;
    var $modulesDir = __DIR__ . '/modules/';
    var $modules    = array();

    function __construct(){
        $this->debugMode();
        $this->initModules();
    }

    function initModules(){
        $modules = array();
        foreach (scandir($this->modulesDir) as $moduleName){
            if($moduleName !== '.' && $moduleName !== '..'){
                include_once $this->modulesDir . $moduleName . '/module.php';
                $modules[$moduleName] = new $moduleName();
            }
        }
        $this->modules = $modules;
    }

    function get($moduleName){
        if(isset($this->modules[$moduleName]) && is_object($this->modules[$moduleName])){
            return $this->modules[$moduleName];
        }

        return false;
    }

    function debugMode(){
        if($this->debugMode){
            ini_set('display_errors', 'on');
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 'off');
            error_reporting(0);
        }
    }

    function debug($mixed = false, $die = false){
        echo "<pre>";
        var_dump($mixed);
        echo "</pre>";

        if($die){ die(); }
    }

}


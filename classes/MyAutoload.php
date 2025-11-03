<?php

class MyAutoload{

    public static function autoload($classes){
        if(file_exists(CONTROLLERS.$classes.'.php')){
            include_once(CONTROLLERS.$classes.'.php');
        }elseif(file_exists(MODEL.$classes.'.php')){
            include_once(MODEL.$classes.'.php');
        }elseif(file_exists(CLASSES.$classes.'.php')){
            include_once(CLASSES.$classes.'.php');
        }elseif(file_exists(LIB.$classes.'.php')){
            include_once(LIB.$classes.'.php');
        }elseif(file_exists(TEMPLATE.$classes.'.php')){
            include_once(TEMPLATE.$classes.'.php');
        }
    }
    public static function start(){
        spl_autoload_register([__CLASS__,'autoload']);
    }
}
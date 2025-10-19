<?php
session_start();
require_once('model/fonction.php');
class MyAutoload{

    public static function autoload($class){
        if(file_exists('controllers/'.$class.'.php')){
            include_once('controllers/'.$class.'.php');
        }else if(file_exists('model/'.$class.'.php')){
            include_once('model/'.$class.'.php');
        }else if(file_exists('classes/'.$class.'.php')){
            include_once('classes/'.$class.'.php');
        }else if(file_exists('lib/'.$class.'.php')){
            include_once('lib/'.$class.'.php');
        }
    }
    public static function start(){
        spl_autoload_register([__CLASS__,'autoload']);
    }
}
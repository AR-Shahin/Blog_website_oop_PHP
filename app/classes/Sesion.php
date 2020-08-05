<?php


namespace App\classess;


class Sesion
{
    public static function init(){
        session_start();
    }
    public static function set($key,$value){
        $_SESSION['$key'] = '$value';
    }
    public static function get($key){
        if(isset($_SESSION['$key'])){
            return $_SESSION['$key'];
        }else{
            return false;
        }
    }
}
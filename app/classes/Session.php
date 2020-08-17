<?php


namespace App\classes;


class Session
{
    public static function init(){
        session_start();
    }
    public static function destroy(){
        self::init();
        session_destroy();
    }
    public static function unsetSession($session){
        if(isset($_SESSION[$session])){
            unset($_SESSION[$session]);
        }
        }
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    public static function set($key,$value){
        $_SESSION[$key] = $value;
    }
    public static   function setCookie($key,$value,$time = 3600){
        setcookie($key,$value,time() + $time);
    }

}
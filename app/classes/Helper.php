<?php


namespace App\classes;


class Helper
{
    //FILTER DATA
    public  static function filter($data){
        $data = trim($data);
        $data = stripslashes($data);
        #$data = htmlspecialchars($data);
        $filter =FILTER_SANITIZE_STRING;
        $flags = FILTER_FLAG_NO_ENCODE_QUOTES;
        $data = filter_var($data, $filter, $flags);
        return $data;
    }
    public static   function title(){
        $path = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($path, '.php');
        //$title = str_replace('_', ' ', $title);
        if ($title == 'index') {
            $title = 'home';
        }elseif ($title == 'contact') {
            $title = 'contact';
        }
        return $title = ucfirst($title);
    }
    public  static  function textShort($text,$limit = 400){
        $text = $text . " ";
        $text = substr($text,0,$limit);
       # $text = substr($text,0,strpos($text, ' '));
        $text = $text . " . . . .";
        return $text;
    }
}
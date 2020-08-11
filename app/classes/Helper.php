<?php


namespace App\classes;


class Helper
{
    //FILTER DATA
    public static function filter($data){
        $data = trim($data);
        $data = stripslashes($data);
        #$data = htmlspecialchars($data);
        $filter =FILTER_SANITIZE_STRING;
        $flags = FILTER_FLAG_NO_ENCODE_QUOTES;
        $data = filter_var($data, $filter, $flags);


        return $data;
    }
}
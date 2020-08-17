<?php


namespace App\classes;


class Database
{
    public static function db()
    {
        $link = mysqli_connect('localhost:3307','root','','blog_oop');
        return $link;
    }
}
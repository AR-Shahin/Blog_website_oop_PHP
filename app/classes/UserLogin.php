<?php

#require_once '../vendor/autoload.php';

namespace App\classes;

use App\classes\Database;
use App\classes\Session;
class UserLogin
{
    public function userCheck($data)
    {
         $username = $data['username'];
         $pass = $data['password'];
         $sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password` = '$pass'";
         $result = mysqli_query(Database::db(),$sql);
         if($result){
             $row = mysqli_num_rows($result);
             if($row > 0){
                 $user_data = mysqli_fetch_assoc($result);
                 $usr = $user_data['username'];
                 session_start();
                 $_SESSION['login-success'] = true;
                 $_SESSION['username'] = $usr;
                 header('location:index.php');
             }else{
               $error_text = 'Invalid Username or Password ';
               return $error_text;
             }
         }else{
             echo 'no';
         }
    }
}
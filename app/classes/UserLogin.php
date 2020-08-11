<?php

#require_once '../vendor/autoload.php';

namespace App\classes;

use App\classes\Database;
use App\classes\Session;
class UserLogin
{
    public function roleCheck($username,$pass){
        $username = $data['username'];
        $pass = $data['password'];
        $sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password` = '$pass' AND `role` == 0";
        $result = mysqli_query(Database::db(),$sql);
       if($result){
           return true;
       }else{
           return false;
       }
    }
    public function userCheck($data)
    {
        session_start();
         $username = $data['username'];
         $pass = $data['password'];
         $sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password` = '$pass'";
         $result = mysqli_query(Database::db(),$sql);
         if($result){
            $row = mysqli_num_rows($result);
             $user_data = mysqli_fetch_assoc($result);
             if($row == 1){
                 if($user_data['role'] == 0){
                     $error_text = 'Your Account Are Blocked !!';
                     return $error_text;
                 }
                 $usr = $user_data['username'];
                 $_SESSION['login-success'] = true;
                 $_SESSION['username'] = $usr;
                 header('location:index.php');
             }
             else{
               $error_text = 'Invalid Username or Password ';
               return $error_text;
             }
         }
         else{
             echo 'SQL problem : )';
         }
    }
    public function countActiveUser(){
        $sql = "SELECT * FROM `users` WHERE role != 0";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $count = mysqli_num_rows($result);
            return $count;
        }else{
            return false;
        }
    }
    public function loginUserData($username){
       $sql = " SELECT * FROM `users` WHERE `username` = '$username' ";
       $res = mysqli_query(Database::db(),$sql);
       if($res){
           $data = mysqli_fetch_assoc($res);
           return $data;
       }else{
           return false;
       }
    }
}
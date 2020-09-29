<?php

#require_once '../vendor/autoload.php';

namespace App\classes;

use App\classes\Database;
use App\classes\Session;
class UserLogin
{
    public static   function roleCheck($username,$pass){
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
    public  static  function userCheck($data)
    {
        session_start();
        $username = $data['username'];
        $pass = $data['password'];
        $keep = '';
        $keep = isset($data['keep']) ? $data['keep'] : '';
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
    public static   function countActiveUser(){
        $sql = "SELECT * FROM `users` WHERE role != 0";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $count = mysqli_num_rows($result);
            return $count;
        }else{
            return false;
        }
    }
    public  static  function loginUserData($username){
        $sql = " SELECT * FROM `users` WHERE `username` = '$username' ";
        $res = mysqli_query(Database::db(),$sql);
        if($res){
            $data = mysqli_fetch_assoc($res);
            return $data;
        }else{
            return false;
        }
    }
    public  static  function doubleUser($usr){
        $sql = "SELECT * FROM `users` WHERE `username` = '$usr'";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $count = mysqli_num_rows($result);
            if($count == 0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }
    public  static  function doubleEmail($email){
        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $count = mysqli_num_rows($result);
            if($count == 0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }
    public  static  function passwordCheck($pass,$conpass){
        if($pass === $conpass){
            return true;
        }else{
            return false;
        }
    }

    public function addUser($data){
        $username = $data['user_name'];
        $email = $data['email'];
        $pass = $data['password'];
        $conpass = $data['conpassword'];
        $role = $data['status'];
        if($this->doubleUser($username) == false){
            $err_txt = "User exists!";
            return $err_txt;
        }else{
            if($this->passwordCheck($pass,$conpass) == false){
                $err_txt = "Password Doesnt match!";
                return $err_txt;
            }else{
                if($this->doubleEmail($email) == false){
                    $err_txt = "Email exists!";
                    return $err_txt;
                }else{
                    $sql = "INSERT INTO `users`(`username`,`email`,`password`,`role`) VALUES ('$username','$email','$pass','$role')";
                    $result = mysqli_query(Database::db(),$sql);
                    if($result){
                        $suc_txt = "User added Successfully!";
                        return $suc_txt;
                    }else{
                        return false;
                    }

                }
            }
        }
    }
    public function updateUser($data){
        $fname = $data['fname'];
        $lname = $data['lname'];
        $bio = $data['bio'];
        $email = $data['email'];
        $username = $data['username'];
        $id = $data['id'];

        if($_FILES['image']['name'] == NULL){
            $sql = "UPDATE `users` SET `fname` = '$fname',`lname`='$lname',`username` = '$username',`email`='$email',`bio`= '$bio' WHERE `id` = $id";
        }else{
            $image = $_FILES['image']['name'];
            $img_ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
            $image = rand(1,888888). '.' .$img_ext;
            $ext =  $this->imageChecker($img_ext);
            if($ext == false){
                Session::set('extError',"Image should be png");
                header('location:editprofile.php');
                return;
            }
            $sql = "UPDATE `users` SET `fname` = '$fname',`lname`='$lname',`username` = '$username',`email`='$email',`image` = '$image',`bio`= '$bio' WHERE `id` = '$id'";
            $upload = '../uploads/' . $image;
            move_uploaded_file($_FILES['image']['tmp_name'],$upload);
            $path=  $this->findSingleImage($id);
            $dltImg = '../uploads/'. $path;
            unlink($dltImg);
        }
        $result = mysqli_query(Database::db(),$sql);
        if($result){
          Session::set('successUserUpdate',"Update Successfully!");
            return ;
        }else{
            Session::set('failUserUpdate',"Update Not Successfully!");
            return ;
        }

    }
    public  static  function allUser(){
        $sql = "SELECT * FROM `users` ORDER BY id DESC";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    //Unblock
    public static   function userUnblock($id){
        $sql = "UPDATE `users` SET `role` = '2' WHERE `users`.`id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    //Unblock
    public static   function userBlock($id){
        $sql = "UPDATE `users` SET `role` = '0' WHERE `users`.`id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    //Unblock
    public  static  function makeAdmin($id){
        $sql = "UPDATE `users` SET `role` = '1' WHERE `users`.`id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public static   function deleteUser($id){
        $sql = "DELETE FROM `users` WHERE `id` = $id";
        $res = mysqli_query(Database::db(),$sql);
        if($res){
            $dltTxt = "Successfully Delete!!";
            return $dltTxt;
        }else{
            $dltTxt = "Not Delete";
            return $dltTxt;
        }
    }
    public  static  function imageChecker($ext){
        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'PNG' || $ext == 'JPG' || $ext == 'JPEG'){
            return true;
        }else{
            return false;
        }
    }
    public  static  function findSingleImage($id){
        $sql = "SELECT `image` FROM `users` WHERE `id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            if(mysqli_num_rows($result) == 0){
                return true;
            }
            $data = mysqli_fetch_assoc($result);
            $path = $data['image'];
            return $path;
        }else{
            return false;
        }
    }
}
<?php

namespace App\classes;

use App\classes\Database;
use App\classes\Session;

class Category
{
    public function addCategory($data){
        $catName = $data['category_name'];
        $status = $data['status'];
        $admin =  $_SESSION['username'];
        $sql = "INSERT INTO `categories`(`category_name`, `status`,`admin_name`) VALUES ('$catName',$status,'$admin')";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $txt = "Category Save successfully!";
            return $txt;
        }else{
            $txt = "Category Not Save :)";
            return $txt;
        }
    }
    public function showAllCategory(){
        $sql = "SELECT * FROM `categories` ORDER BY id DESC ";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    public function countCategory(){

    }
    public function inactiveCategory($id){
        $sql = "UPDATE `categories` SET `status` = '0' WHERE `categories`.`id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function activeCategory($id){
        $sql = "UPDATE `categories` SET `status` = '1' WHERE `categories`.`id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updateCategory($data){
        $id = $data['id'];
        $catName = $data['catName'];
        $admin = Session::get('username');
        $sql = "UPDATE `categories` SET `category_name`= '$catName', `admin_name` ='$admin' WHERE `id` = $id ";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $uptxt = "Category Updated Successfully!";
            return $uptxt;
        }else{
            $uptxt = "Category Not Update!";
            return $uptxt;
        }
    }

    public function deleteCategory($id){
        $sql = "DELETE FROM `categories` WHERE `id` = $id";
        $res = mysqli_query(Database::db(),$sql);
        if($res){
            $dltTxt = "Successfully Delete!!";
            return $dltTxt;
        }else{
            $dltTxt = "Not Delete";
            return $dltTxt;
        }
    }

}
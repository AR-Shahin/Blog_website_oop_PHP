<?php
require_once '../vendor/autoload.php';
use App\classes\Session;

Session::init();
//CATEGORY UPDATE
if(isset($_POST['update-cat'])){
$upCat = new \App\classes\Category();
 $result = $upCat->updateCategory($_POST);
Session::set('uptxt',"$result");
header('location:managecategory.php');
}

//POST UPDATE
if(isset($_POST['update-btn'])){
    $upPost = new \App\classes\Post();
    $result = $upPost->updatePost($_POST);
    Session::set('uptxt',"$result");
    header('location:managepost.php');
}
//USER UPDATE
if(isset($_POST['update-user'])){
    $upUser = new \App\classes\UserLogin();
    $result = $upUser->updateUser($_POST);
    Session::set('uptxt',"$result");
    header('location:editprofile.php');
}
?>
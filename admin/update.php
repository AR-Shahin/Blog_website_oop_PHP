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
    header('location:editprofile.php');
}

//SITE UPDATE
if(isset($_POST['site-btn'])){
    $upUser = new \App\classes\Site();
    $result = $upUser->updateSite($_POST);
    header('location:logo.php');
}
//SITE LINKS UPDATE
if(isset($_POST['link-btn'])){
    $upUser = new \App\classes\Site();
    $result = $upUser->updateSocialLink($_POST);
    header('location:social.php');
}
?>
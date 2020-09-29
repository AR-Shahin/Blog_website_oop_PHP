<?php
require_once '../vendor/autoload.php';
use App\classes\Session;
Session::init();
//USER INSERT
if(isset($_POST['cat-btn'])){
    $userOb = new \App\classes\Category();
   $rtn_txt =  $userOb->addCategory($_POST);
   Session::set('txt',"$rtn_txt");
    header('location:addcategory.php');
}
if(isset($_POST['post-btn'])){
    $userOb = new \App\classes\Post();
   $rtn_txt =  $userOb->addPost($_POST);
   Session::set('txt',"$rtn_txt");
    header('location:addpost.php');
}
//USER INSERT
if(isset($_POST['user-btn'])){
    $userOb = new \App\classes\UserLogin();
   $rtn_txt =  $userOb->addUser($_POST);
   Session::set('userExists',"$rtn_txt");
    header('location:adduser.php');
}
//reply INSERT
if(isset($_POST['reply-btn'])){
    $userOb = new \App\classes\Mail();
    $rtn_txt =  $userOb->saveReply($_POST);
    header('location:inbox.php');
}


?>
<?php
require_once '../vendor/autoload.php';
use App\classes\Session;
Session::init();

//CATEGORY INSERT
if(isset($_GET['cat-btn']) ){
    $cat = new \App\classes\Category();
   $insert_category = $cat->addCategory($_GET);
   $_SESSION['txt'] = $insert_category;
    header('location:addcategory.php');
}

//POST INSERT
if(isset($_POST['post-btn'])){
    $post = new \App\classes\Post();
    $insert_post = $post->addPost($_POST);
    Session::set('postInsert',"$insert_post");
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
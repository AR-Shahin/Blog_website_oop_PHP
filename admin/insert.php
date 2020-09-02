<?php
require_once '../vendor/autoload.php';
use App\classes\Session;
Session::init();
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
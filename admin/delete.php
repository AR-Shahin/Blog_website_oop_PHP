<?php
require_once '../vendor/autoload.php';

use App\classes\Session;
Session::init();


//DELETE CATEGORY
if(isset($_GET['managecat'])){
    $id = $_GET['id'];
    $dlt = new \App\classes\Category();
    $dltTxt = $dlt->deleteCategory($id);
    Session::set('dltTxt',"$dltTxt");
    header('location:managecategory.php');
}

//DELETE POST
if(isset($_GET['managepost'])){
    $id = $_GET['id'];
    $dlt = new \App\classes\Post();
    $dltTxt = $dlt->deletePost($id);
    Session::set('dltTxt',"$dltTxt");
    header('location:managepost.php');
}

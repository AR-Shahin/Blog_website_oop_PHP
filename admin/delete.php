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

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
?>
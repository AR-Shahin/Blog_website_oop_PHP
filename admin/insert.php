<?php
require_once '../vendor/autoload.php';
use App\classes\Session;
Session::init();
if(isset($_GET['cat-btn']) ){
    $cat = new \App\classes\Category();
   $insert_category = $cat->addCategory($_GET);
   $_SESSION['txt'] = $insert_category;
    header('location:addcategory.php');
}

?>
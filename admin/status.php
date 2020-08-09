<?php
require_once '../vendor/autoload.php';
use App\classes\Category;
use App\classes\Database;

//INACTIVE CATEGORY
if(isset($_GET['inactive']) && isset($_GET['managecat'])){
    $id =  $_GET['id'];
    $status = new Category();
    $result = $status->inactiveCategory($id);
    if($result == true){
        header('location: managecategory.php');
    }
}
//ACTIVE CATEGORY
if(isset($_GET['active']) && isset($_GET['managecat'])){
    $id =  $_GET['id'];
    $status = new Category();
    $result = $status->activeCategory($id);
    if($result == true){
        header('location: managecategory.php');
    }
}

?>

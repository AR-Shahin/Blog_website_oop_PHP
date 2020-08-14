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

//INACTIVE POST
if(isset($_GET['inactive']) && isset($_GET['managepost'])){
    $id =  $_GET['id'];
    $status = new \App\classes\Post();
    $result = $status->inactivePost($id);
    if($result == true){
        header('location: managepost.php');
    }
}
//MAKE DOWN
if(isset($_GET['makedown']) && isset($_GET['managepost'])){
    $id =  $_GET['id'];
    $status = new \App\classes\Post();
    $result = $status->inactiveRate($id);
    if($result == true){
        header('location: managepost.php');
    }
}
//ACTIVE CATEGORY
if(isset($_GET['active']) && isset($_GET['managepost'])){
    $id =  $_GET['id'];
    $status = new \App\classes\Post();
    $result = $status->activePost($id);
    if($result == true){
        header('location: managepost.php');
    }
}
//MAKE TOP
if(isset($_GET['maketop']) && isset($_GET['managepost'])){
    $id =  $_GET['id'];
    $status = new \App\classes\Post();
    $result = $status->activeRate($id);
    if($result == true){
        header('location: managepost.php');
    }
}
//UNBLK USER
if(isset($_GET['unblock']) && isset($_GET['manageuser'])){
    $id =  $_GET['id'];
    $status = new \App\classes\UserLogin();
    $result = $status->userUnblock($id);;
    if($result == true){
        header('location: manageuser.php');
    }
}
//UNBLK USER
if(isset($_GET['block']) && isset($_GET['manageuser'])){
    $id =  $_GET['id'];
    $status = new \App\classes\UserLogin();
    $result = $status->userBlock($id);
    if($result == true){
        header('location: manageuser.php');
    }
}
//MAKE ADMIN USER
if(isset($_GET['admin']) && isset($_GET['manageuser'])){
    $id =  $_GET['id'];
    $status = new \App\classes\UserLogin();
    $result = $status->makeAdmin($id);
    if($result == true){
        header('location: manageuser.php');
    }
}
//SEEN MSG
if(isset($_GET['seen']) && isset($_GET['inbox-body'])){
    $id =  $_GET['id'];
    $status = new \App\classes\Mail();
    $result = $status->seenMail($id);
    if($result == true){
        header('location: inbox.php');
    }
}
//TRASH MSG
if(isset($_GET['trash']) && isset($_GET['inbox-body'])){
    $id =  $_GET['id'];
    $status = new \App\classes\Mail();
    $result = $status->makeTrashMail($id);
    if($result == true){
        header('location: inbox.php');
    }
}
?>

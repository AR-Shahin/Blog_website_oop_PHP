<?php


namespace App\classes;

use App\classes\Database;
use App\classes\Session;

class Post
{
    public function addPost($data){
        $cat_id = $data['cat_id'];
        $title = $data['title'];
        $content = $data['content'];
        $status = $data['status'];
        $admin = Session::get('username');
        $image = $_FILES['image']['name'];
        $img_ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
        $image = rand(1,888888). '.' .$img_ext;
       $ext =  $this->imageChecker($img_ext);
        if($ext == false){
            Session::set('extError',"Image should be png");
            header('location:addpost.php');
        }
        $sql = "INSERT INTO `blog` (`cat_id`, `title`, `content`, `admin`, `status`, `image`) VALUES ('$cat_id','$title','$content','$admin','$status','$image')";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $upload = '../uploads/' . $image;
            move_uploaded_file($_FILES['image']['tmp_name'],$upload);
            $txt = "Post added successfully!";
            return $txt;
        }else{
            $txt = "Post Not Save :)";
            return $txt;
        }
    }
    public function imageChecker($ext){
        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'PNG' || $ext == 'JPG' || $ext == 'JPEG'){
            return true;
        }else{
            return false;
        }
    }

    public function showAllPost(){
        $sql = "SELECT blog.*, categories.category_name FROM blog INNER JOIN categories ON blog.cat_id = categories.id ORDER BY id DESC  ";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    public function inactivePost($id){
        $sql = "UPDATE `blog` SET `status` = '0' WHERE `blog`.`id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function activePost($id){
        $sql = "UPDATE `blog` SET `status` = '1' WHERE `blog`.`id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function deletePost($id){
        $sql = "DELETE FROM `blog` WHERE `id` = $id";
        $imgName =  self::findSingleImage($id);
       $path = '../uploads/'.$imgName;
        $res = mysqli_query(Database::db(),$sql);
        if($res){
            $dltTxt = "Successfully Delete!!";
            unlink($path);
            return $dltTxt;
        }else{
            $dltTxt = "Not Delete";
            return $dltTxt;
        }
    }

    public function singlePost($id){
        $sql = "SELECT * FROM `blog` WHERE `id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function findSingleImage($id){
        $sql = "SELECT `image` FROM `blog` WHERE `id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $data = mysqli_fetch_assoc($result);
            $path = $data['image'];
            return $path;
        }else{
            return false;
        }
    }
}
<?php


namespace App\classes;
use App\classes\Database;
use App\classes\Session;

class Site
{
    public function display(){
        $sql = "SELECT * FROM `site`";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    public function updateSite($data){
        $footer = $data['footer-txt'];
        $title  = $data['title'];
        $post = $data['post'];

        if($_FILES['logo']['name'] == NULL){
            $sql = "UPDATE `site` SET `footer`='$footer',`title`='$title',`postdisplay`='$post' WHERE `id` = 1";
            $res = mysqli_query(Database::db(),$sql);
            if($res){
                Session::set('updatesite',"Update Successfully!");
                return;
            }
        }else{
            $image = $_FILES['logo']['name'];
            $img_ext = pathinfo($_FILES['logo']['name'],PATHINFO_EXTENSION);
            $image = 'logo'. '.' .$img_ext;
            $ext =  $this->imageChecker($img_ext);
            if($ext == false){
                Session::set('extNotmatch',"Logo should be png format !");
                return;
            }else{
                $sql = "UPDATE `site` SET `logo`= '$image',`footer`='$footer',`title`='$title',`postdisplay`='$post' WHERE `id` = 1";
                $res = mysqli_query(Database::db(),$sql);
                if($res){
                    $upload = '../uploads/' . $image;
                    move_uploaded_file($_FILES['logo']['tmp_name'],$upload);
                    Session::set('updatesite',"Update Successfully!");
                    return;
                }
            }
        }


    }
    public function imageChecker($ext){
        if($ext == 'png' || $ext == 'PNG'){
            return true;
        }else{
            return false;
        }
    }
    public function displaySocialLink(){
        $sql = "SELECT * FROM `social_links`";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    public function updateSocialLink($data){
        $fb = $data['fb'];
        $tw = $data['tw'];
        $lin = $data['lin'];
        $ins = $data['ins'];
        $git = $data['git'];
        $flink = $data['footer-link'];
        $ftxt = $data['footer-txt'];
        $sql = "UPDATE `social_links` SET `facebook` = '$fb',`twitter` = '$tw',`instagram`='$ins',`linkedin` = '$lin',`github` = '$git',`footerlink`= '$flink',`footertxt` = '$ftxt' WHERE id = 1";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            Session::set('updatelink',"Update Successfully!");
            return ;
        }else{
            Session::set('notupdatelink',"Not Update!");
            return ;
        }
    }

}
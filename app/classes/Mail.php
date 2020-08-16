<?php


namespace App\classes;
use App\classes\Database;
use App\classes\Helper;
use App\classes\Session;

class Mail
{
    public function sendMail($data){
        if(empty($data['name'])){
            Session::set('emptyName',"Name must use");
            return;
        }
        if(empty($data['email'])){
            Session::set('emptyEmail',"Email must use");
            return;
        }
        if(empty($data['phone'])){
            Session::set('emptyPhone',"Phone must use");
            return;
        }
        if(empty($data['subject'])){
            Session::set('emptySubject',"Sub must use");
            return;
        }
        if(empty($data['message'])){
            Session::set('emptyMsg',"Name must use");
            return;
        }
        else{
            $name = $data['name'];
            $name = \App\classes\Helper::filter($name) ;
            $name = mysqli_real_escape_string(Database::db(),$name);
            $email = $data['email'];
            $phone = $data['phone'];
            $sub = $data['subject'];
            $msg = $data['message'];
            $msg = Helper::filter($msg) ;
            $sql = "INSERT INTO `mails`(`name`, `email`, `subject`, `phone`, `message`, `status`) VALUES ('$name','$email','$sub','$phone','$msg','1')";
            $res = mysqli_query(Database::db(),$sql);
            if($res){
                Session::set('succesMail',"Mail sent successfully");
                $to = "mdshahinmije96@gmail.com";
                $subject = "$sub";
                $txt = "$msg";
                $headers = "From: $email" . "\r\n" .
                    "CC: $email";
               mail($to,$subject,$txt,$headers);
                return;
            }else{
                Session::set('failMail',"Mail not sent");
                return;
            }
        }
    }

    public function showAllMail(){
        $sql = "SELECT * FROM `mails` WHERE status !=0 ORDER BY id DESC";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    public function showTrashMail(){
        $sql = "SELECT * FROM `mails` WHERE status = 0 ORDER BY id DESC";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    //COUNT ALL MAIL
    public function countAllMail(){
        $sql = "SELECT * FROM `mails` ";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $count = mysqli_num_rows($result);
            return $count;
        }else{
            return false;
        }
    }
    //COUNT ALL new mail
    public function countNewMail(){
        $sql = "SELECT * FROM `mails` WHERE status = 1";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $count = mysqli_num_rows($result);
            return $count;
        }else{
            return false;
        }
    }
    //COUNT TRASH MAIL
    public function countAllTrashMail(){
        $sql = "SELECT * FROM `mails` WHERE status = 0 ";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $count = mysqli_num_rows($result);
            return $count;
        }else{
            return false;
        }
    }
//SEEN MSG
    public function seenMail($id){
        $sql = "UPDATE `mails` SET `status` = '2' WHERE `mails`.`id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    //SEEN MSG
    public function makeTrashMail($id){
        $sql = "UPDATE `mails` SET `status` = '0' WHERE `mails`.`id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    //DELETE MAIL
    public function deleteMail($id){
        $sql = "DELETE FROM `mails` WHERE `id` = $id";
        $res = mysqli_query(Database::db(),$sql);
        if($res){
            return ;
        }else{
            return ;
        }
    }
    //SINGLE MAIL
    public function singleMail($id){
        # $sql = "SELECT * FROM `blog` WHERE `id` = $id";
        $sql = "SELECT * FROM `mails` WHERE `id` = $id ";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            if(mysqli_num_rows($result) == 0){
                return false;
            }
            return $result;
        }else{
            return false;
        }
    }
    public function saveReply($data){
        $id = $data['id'];
        $user = $_SESSION['username'];
        $rep = $data['reply'];
        $email = $data['email'];
        $sql = "INSERT INTO `replies`(`email_id`, `user`, `reply`) VALUES ('$id','$user','$rep')";
         $res = mysqli_query(Database::db(),$sql);
        if($res){
            Session::set('replysent',"Reply sent!!");
            mail('$email','reply','$rep');
            return ;
        }else{
            Session::set('replynotsent',"Reply not sent ");
            return ;
        }
    }
    public function displayNewMail(){
        $sql = "SELECT * FROM `mails` WHERE status = 1 ORDER BY id DESC";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
}
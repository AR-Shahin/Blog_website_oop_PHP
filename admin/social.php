<?php require_once 'header.php';
use App\classes\Site;
use App\classes\Session;
$ob = Site::displaySocialLink();
$siteData = mysqli_fetch_assoc($ob);;
?>
<h3 style="display: inline-block;margin-bottom: 1px;">Update Social Links</h3> <span style="color: red;margin-left: 30px;font-size: 18px"><?= Session::get("notupdatelink")?></span>
<span style="color: green;margin-left: 30px;font-size: 18px"><?= Session::get("updatelink")?></span>
<hr style="padding: 0;margin: 3px">
<div class="row">
    <div class="col-md-6">
        <form action="update.php" method="post">
            <div class="form-group">
                <label for="">Facebook Link : </label>
                <input type="text" class="form-control" name="fb" value="<?=$siteData['facebook'] ?>">
            </div >
            <div class="form-group">
                <label for="">Twitter Link : </label>
                <input type="text" class="form-control" name="tw" value="<?=$siteData['twitter'] ?>">
            </div >
            <div class="form-group">
                <label for="">Inastagram Link : </label>
                <input type="text" class="form-control" name="ins" value="<?=$siteData['instagram'] ?>">
            </div >
            <div class="form-group">
                <label for="">Linkedin Link : </label>
                <input type="text" class="form-control" name="lin" value="<?=$siteData['linkedin'] ?>">
            </div >
            <div class="form-group">
                <label for="">Github Link : </label>
                <input type="text" class="form-control" name="git" value="<?=$siteData['github'] ?>">
            </div >
            <div class="form-group">
                <label for="">Footer Link : </label>
                <input type="text" class="form-control" name="footer-link" value="<?=$siteData['footerlink'] ?>">
            </div >
            <div class="form-group">
                <label for="">Footer Text : </label>
                <input type="text" class="form-control" name="footer-txt" value="<?=$siteData['footertxt'] ?>">
            </div >
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="link-btn" value="Update">
            </div>
        </form>
    </div>
    <div class="col-md-6 align-self-center text-center">
        <div class="img-box bg-primary" style="display: inline-block">
            <img src="../uploads/<?=$siteData['logo']?>" alt="" class="img-fluid">
        </div>
    </div>
</div>
</div>
<?php
Session::unsetSession('notupdatelink');
Session::unsetSession('updatelink');
?>
<?php require_once 'footer.php'?>

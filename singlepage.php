<?php require_once 'header.php';
require_once 'vendor/autoload.php';
?>
<?php
use App\classes\Post;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $postOb = Post::singlePost($id);
    if($postOb == false){
        header('location: 404.php');
        die();
    }
    $postData = mysqli_fetch_assoc($postOb);
}
?>
<style>
    section.section {
        padding-bottom: 0px;
    }
</style>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="page-wrapper">
        <div class="blog-title-area text-center">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                <li class="breadcrumb-item active"><?= $postData['title'] ?></li>
            </ol>

            <span class="color-orange"><a href="" title=""><?= $postData['category_name'] ?></a></span>

            <h3><?= $postData['title'] ?></h3>

            <div class="blog-meta big-meta">
                <small><a href="tech-single.html" title=""><?= $postData['date'] ?></a></small>
                <small><a href="tech-author.html" title=""><?= $postData['admin'] ?></a></small>
            </div><!-- end meta -->

        </div><!-- end title -->

        <div class="single-post-media text-center">
            <img src="uploads/<?= $postData['image'] ?>" alt="" class=" w-75">
        </div><!-- end media -->

        <div class="blog-content">
            <div class="pp">
                <?= $postData['content'] ?>t?
            </div><!-- end pp -->
        </div><!-- end content -->

        <div class="blog-title-area mt-5">
            <div class="tag-cloud-single">
                <span>Tags</span>
                <small><a href="#" title=""><?= $postData['tag'] ?></a></small>
            </div><!-- end meta -->
        </div><!-- end title -->
    </div><!-- end page-wrapper -->
</div>

<?php require_once 'sidebar.php'; ?>
<div class="container">
    <h3>Related Post</h3>
    <div class="row">
        <?php
        $ob = Post::relatedPost();
        while ($rp = mysqli_fetch_assoc($ob)) { ?>
        <div class="col-md-6">
            <div class="blog-list clearfix">
                <div class="blog-box row">
                    <div class="col-md-4">
                        <div class="post-media">
                            <a href="singlepage.php?id=<?= $rp['id'] ?>" title="">
                                <img src="uploads/<?= $rp['image'] ?>" alt="" class="img-fluid w-100">
                                <div class="hovereffect"></div>
                            </a>
                        </div><!-- end media -->
                    </div><!-- end col -->

                    <div class="blog-meta big-meta col-md-8">
                        <h4><a href="singlepage.php?id=<?= $rp['id'] ?>" title=""><?= $rp['title'] ?></a></h4>
                        <p><?php
                            $txt = $rp['content'];
                            echo   \App\classes\Helper::textShort("$txt",150);
                            ?></p>
                        <small class="firstsmall"><a class="bg-orange" href="singlepage.php?id=<?= $rp['id'] ?>" title="Category"><?= $rp['category_name'] ?></a></small>
                        <small><a  title="Date and Time"><?= $rp['date'] ?></a></small>
                        <small><a  title="Author or Media"><?= $rp['admin'] ?></a></small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<hr>
<?php require_once 'footer.php'; ?>

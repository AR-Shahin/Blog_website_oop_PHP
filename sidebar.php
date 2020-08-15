<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title">Popular Posts</h2>
            <div class="blog-list-widget">
                <div class="list-group">
                    <?php
                    while ($row1 = mysqli_fetch_assoc($populer)){
                        ?>
                        <a href="singlepage.php?id=<?= $row1['id'] ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 last-item justify-content-between">
                                <img src="uploads/<?= $row1['image'] ?>" alt="" class="img-fluid float-left">
                                <h5 class="mb-1"><?= substr($row1['title'],0,40) ?></h5>
                                <small><?= $row1['date'] ?></small>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title" style="margin-bottom: 5px;">Categories</h2>
            <div class="blog-list-widget">
                <div class="list-group">
                    <?php
                    use App\classes\Category;
                    $categories = Category::activeCategories();
                    while ($row2 = mysqli_fetch_assoc($categories)){
                    ?>
                    <p style="margin-bottom: 0px;border-bottom: 1px solid #cc"><a href="index.php?id=<?= $row2['id']?>&catwisepost"><?= $row2['category_name'] ?></a></p>
                    <?php } ?>
                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->
        <?php
        use App\classes\Site;
        $ob = Site::displaySocialLink();
        $data = mysqli_fetch_assoc($ob);
        ?>
        <div class="widget">
            <h2 class="widget-title">Follow Us</h2>

            <div class="row text-center">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="<?= $data['facebook']?>" class="social-button facebook-button">
                        <i class="fa fa-facebook"></i>
                        <p>27k</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="<?= $data['twitter']?>" class="social-button twitter-button">
                        <i class="fa fa-twitter"></i>
                        <p>98k</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="<?= $data['github']?>" class="social-button google-button">
                        <i class="fa fa-github"></i>
                        <p>17k</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="<?= $data['linkedin']?>" class="social-button google-button">
                        <i class="fa fa-linkedin"></i>
                        <p>22k</p>
                    </a>
                </div>
            </div>
        </div><!-- end widget -->

        <div class="widget">
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="upload/banner_03.jpg" alt="" class="img-fluid">
                </div><!-- end banner-img -->
            </div><!-- end banner -->
        </div><!-- end widget -->
    </div><!-- end sidebar -->
</div><!-- end col -->
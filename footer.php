</div><!-- end row -->
</div><!-- end container -->
</section>

<?php
use App\classes\Site;
$ob = Site::displaySocialLink();
$data = mysqli_fetch_assoc($ob);
?>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="widget">
                    <div class="footer-text text-left">
                        <a href="index.html"><img src="images/version/tech-footer-logo.png" alt="" class="img-fluid"></a>
                        <p>Tech Blog is a technology blog, we sharing marketing, news and gadget articles.</p>
                        <div class="social">
                            <a href="<?= $data['facebook']?>" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="<?= $data['twitter']?>" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="<?= $data['instagram']?>" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="<?= $data['github']?>" data-toggle="tooltip" data-placement="bottom" title="Github"><i class="fa fa-github"></i></a>
                            <a href="<?= $data['linkedin']?>" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>

                        <hr class="invis">

                        <div class="newsletter-widget text-left">
                            <form class="form-inline">
                                <input type="text" class="form-control" placeholder="Enter your email address">
                                <button type="submit" class="btn btn-primary">SUBMIT</button>

                            </form>
                        </div><!-- end newsletter -->
                    </div><!-- end footer-text -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Categories</h2>
                    <div class="link-widget">
                        <ul>
                            <?php
                            use App\classes\Category;
                            $popu = Category::showLimitCategory();
                            while ($cat = mysqli_fetch_assoc($popu)){
                                ?>
                                <li><a href="index.php?id=<?= $cat['id']?>&catwisepost"><?= $cat['category_name'] ?> <span><?php echo Category::countCategoryPost($cat['id']);?></span></a></li>
                            <?php } ?>
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Copyrights</h2>
                    <div class="link-widget">
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Advertising</a></li>
                            <li><a href="#">Write for us</a></li>
                            <li><a href="#">Trademark</a></li>
                            <li><a href="#">License & Help</a></li>
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div>

        <div class="row" >
            <div class="col-md-12 text-center">
                <br>
                <div class="copyright"> <?= $siteData['footer']?> <a href="<?= $data['footerlink']?>"><?= $data['footertxt']?></a>.</div>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->

<div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/tether.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
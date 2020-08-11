<?php
require_once 'vendor/autoload.php';
use App\classes\Post;
$post = Post::showActivelPost();
$populer = Post::showPopulerlPost();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Site Metas -->
        <title>Tech Blog - Stylish Magazine Blog Template</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">


        <!-- Design fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!-- FontAwesome Icons core CSS -->
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/style.css" rel="stylesheet">

        <!-- Responsive styles for this template -->
        <link href="assets/css/responsive.css" rel="stylesheet">

        <!-- Colors for this template -->
        <link href="assets/css/colors.css" rel="stylesheet">

        <!-- Version Tech CSS for this template -->
        <link href="assets/css/version/tech.css" rel="stylesheet">

        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>
    <body>

        <div id="wrapper">
            <header class="tech-header header">
                <div class="container-fluid">
                    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="assets/images/version/tech-logo.png" alt=""></a>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="tech-contact.html">Contact Us</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav mr-2">
                                <form class="form-inline">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search a Category " aria-label="Search">
                                    <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Search" style="cursor: pointer;">
                                </form>
                            </ul>
                        </div>
                    </nav>
                </div><!-- end container-fluid -->
            </header><!-- end market-header -->
            <hr>
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <div class="page-wrapper">
                                <div class="blog-top clearfix">
                                    <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                                </div><!-- end blog-top -->
<?php
while ($row = mysqli_fetch_assoc($post)){
?>
                                <div class="blog-list clearfix">
                                    <div class="blog-box row">
                                        <div class="col-md-4">
                                            <div class="post-media">
                                                <a href="tech-single.html" title="">
                                                    <img src="uploads/<?= $row['image'] ?>" alt="" class="img-fluid w-100">
                                                    <div class="hovereffect"></div>
                                                </a>
                                            </div><!-- end media -->
                                        </div><!-- end col -->

                                        <div class="blog-meta big-meta col-md-8">
                                            <h4><a href="tech-single.html" title=""><?= $row['title'] ?></a></h4>
                                            <p><?= substr($row['content'],0,350) ?></p>
                                            <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="Category"><?= $row['category_name'] ?></a></small>
                                            <small><a  title="Date and Time"><?= $row['date'] ?></a></small>
                                            <small><a  title="Author or Media"><?= $row['admin'] ?></a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div>
    <hr>

<?php } ?>
                                <!-- end blog-list -->
                            </div><!-- end page-wrapper -->

                            <hr class="invis">

                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-start">
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end col -->

                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="sidebar">
                                <div class="widget">
                                    <h2 class="widget-title">Popular Posts</h2>
                                    <div class="blog-list-widget">
                                        <div class="list-group">
                                            <?php
                                            while ($row1 = mysqli_fetch_assoc($populer)){
                                            ?>
                                            <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 last-item justify-content-between">
                                                    <img src="uploads/<?= $row1['image'] ?>" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1"><?= $row1['title'] ?></h5>
                                                    <small><?= $row1['date'] ?></small>
                                                </div>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div><!-- end blog-list -->
                                </div><!-- end widget -->

                                <div class="widget">
                                    <h2 class="widget-title">Recent Reviews</h2>
                                    <div class="blog-list-widget">
                                        <div class="list-group">
                                            <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between">
                                                    <img src="assets/upload/tech_blog_02.jpg" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1">Banana-chip chocolate cake recipe..</h5>
                                                    <span class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </a>

                                            <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between">
                                                    <img src="assets/upload/tech_blog_03.jpg" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1">10 practical ways to choose organic..</h5>
                                                    <span class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </a>

                                            <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 last-item justify-content-between">
                                                    <img src="assets/upload/tech_blog_07.jpg" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1">We are making homemade ravioli..</h5>
                                                    <span class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div><!-- end blog-list -->
                                </div><!-- end widget -->

                                <div class="widget">
                                    <h2 class="widget-title">Follow Us</h2>

                                    <div class="row text-center">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <a href="#" class="social-button facebook-button">
                                                <i class="fa fa-facebook"></i>
                                                <p>27k</p>
                                            </a>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <a href="#" class="social-button twitter-button">
                                                <i class="fa fa-twitter"></i>
                                                <p>98k</p>
                                            </a>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <a href="#" class="social-button google-button">
                                                <i class="fa fa-google-plus"></i>
                                                <p>17k</p>
                                            </a>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <a href="#" class="social-button youtube-button">
                                                <i class="fa fa-youtube"></i>
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
                    </div><!-- end row -->
                </div><!-- end container -->
            </section>

            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="widget">
                                <div class="footer-text text-left">
                                    <a href="index.html"><img src="images/version/tech-footer-logo.png" alt="" class="img-fluid"></a>
                                    <p>Tech Blog is a technology blog, we sharing marketing, news and gadget articles.</p>
                                    <div class="social">
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
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
                                        <li><a href="#">Marketing <span>(21)</span></a></li>
                                        <li><a href="#">SEO Service <span>(15)</span></a></li>
                                        <li><a href="#">Digital Agency <span>(31)</span></a></li>
                                        <li><a href="#">Make Money <span>(22)</span></a></li>
                                        <li><a href="#">Blogging <span>(66)</span></a></li>
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
                            <div class="copyright">&copy; Tech Blog. Design and Develop by: <a href="http://html.design">AR Shahin</a>.</div>
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
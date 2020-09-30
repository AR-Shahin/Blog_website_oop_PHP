<?php require_once 'header.php';
use App\classes\Helper;
?>
    <style>
        section.section {
            padding-bottom: 0px;
        }
    </style>
    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
        <div class="page-wrapper">
            <div class="blog-top clearfix">
                <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
            </div><!-- end blog-top -->
            <?php
            if(isset($_GET['catwisepost']) && isset($_GET['id'])){
                $id = $_GET['id'];
                $catWisepost = \App\classes\Post::categoryWisePost($id);
                if($catWisepost == false){
                    echo '<h1 class="text-center">Not Avilable  !!</h1>';
                }else{
                    while ($catWisepostRow = mysqli_fetch_assoc($catWisepost)) { ?>
                        <div class="blog-list clearfix">
                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="singlepage.php?id=<?= catWisepostRow['id'] ?>" title="">
                                            <img src="uploads/<?=$catWisepostRow['image'] ?>" alt="" class="img-fluid w-100">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="singlepage.php?id=<?= $catWisepostRow['id'] ?>" title=""><?= $catWisepostRow['title'] ?></a></h4>
                                    <p><?php
                                        $txt = $catWisepostRow['content'];
                                        echo   \App\classes\Helper::textShort("$txt",250);
                                        ?></p>
                                    <small class="firstsmall"><a class="bg-orange" href="singlepage.php?id=<?= $catWisepostRow['id'] ?>" title="Category"><?= $catWisepostRow['category_name'] ?></a></small>
                                    <small><a  title="Date and Time"><?= $catWisepostRow['date'] ?></a></small>
                                    <small><a  title="Author or Media"><?= $catWisepostRow['admin'] ?></a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                        </div>
                        <hr>
                    <?php } }
            }
            #---------------------
            elseif (isset($_GET['search-btn'])){
                $searchContent = $_GET['search'];
                $var = \App\classes\Post::searchPost($searchContent);
                if($var == false){
                    echo '<h1 class="text-center">Not Avilable Post !!</h1>';
                }else{
                    while ($rowSearch = mysqli_fetch_assoc($var)){ ?>
                        <div class="blog-list clearfix">
                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="singlepage.php?id=<?= $rowSearch['id'] ?>" title="">
                                            <img src="uploads/<?= $rowSearch['image'] ?>" alt="" class="img-fluid w-100">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="singlepage.php?id=<?= $rowSearch['id'] ?>" title=""><?= $rowSearch['title'] ?></a></h4>
                                    <p><?php
                                        $txt = $rowSearch['content'];
                                        echo   \App\classes\Helper::textShort("$txt",250);
                                        ?></p>
                                    <small class="firstsmall"><a class="bg-orange" href="singlepage.php?id=<?= $rowSearch['id'] ?>" title="Category"><?= $rowSearch['category_name'] ?></a></small>
                                    <small><a  title="Date and Time"><?= $rowSearch['date'] ?></a></small>
                                    <small><a  title="Author or Media"><?= $rowSearch['admin'] ?></a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                        </div>
                        <hr>

                    <?php  }
                }
            }
            # ------------------------------------------------
            else{
            ?>
            <?php
            $ob = new \App\classes\Site();
            $a = $ob->display();
            $siteData = mysqli_fetch_assoc($a);
            $skip = 0;
            $take = $siteData['postdisplay'];
            $page = 1;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $skip = ( $page - 1 ) * $take;
            }
            $totalPost = \App\classes\Post::countActivePost();
            $totalPage = ceil($totalPost/$take);
            if($totalPage < $page)
            {
                header("location:login.php");
            }
            $sql = "SELECT blog.*, categories.category_name FROM blog INNER JOIN categories ON blog.cat_id = categories.id ORDER BY id DESC LIMIT $skip,$take ";
            $post = \App\classes\Post::pagination($sql);
            while ($row = mysqli_fetch_assoc($post)){
                ?>
                <div class="blog-list clearfix">
                    <div class="blog-box row">
                        <div class="col-md-4">
                            <div class="post-media">
                                <a href="singlepage.php?id=<?= $row['id'] ?>" title="">
                                    <img src="uploads/<?= $row['image'] ?>" alt="" class="img-fluid w-100">
                                    <div class="hovereffect"></div>
                                </a>
                            </div><!-- end media -->
                        </div><!-- end col -->

                        <div class="blog-meta big-meta col-md-8">
                            <h4><a href="singlepage.php?id=<?= $row['id'] ?>" title=""><?= $row['title'] ?></a></h4>
                            <p><?php
                                $txt = $row['content'];
                                echo   \App\classes\Helper::textShort("$txt",250);
                                ?></p>
                            <small class="firstsmall"><a class="bg-orange" href="singlepage.php?id=<?= $row['id'] ?>" title="Category"><?= $row['category_name'] ?></a></small>
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
        <div class="row text-center">
            <div class="col-md-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-between">
                        <li class="page-item">
                            <?php if ($page>1){ ?>
                                <a href="index.php?page=<?=$page - 1;?>" class="page-link"><i class="fa
 fa-chevron-left" style="margin-right: 2px;"></i> Prev</a>
                            <?php }?>
                        <li class="page-item">
                            <?php if($totalPage > $page) { ?>
                                <a href="index.php?page=<?=$page + 1;?>"class="page-link">Next <i class="fa
 fa-chevron-right" style="margin-left: 2px;"></i></a>
                            <?php } ?>
                        </li>
                    </ul>
                </nav>
            </div><!-- end col -->
            <?php } ?>
        </div><!-- end row -->

    </div><!-- end col -->
<?php
require_once 'sidebar.php';
?>



<?php
require_once 'footer.php';
?>
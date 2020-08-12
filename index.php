<?php require_once 'header.php';
?>
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
                                    <p><?= substr($catWisepostRow['content'],0,350) ?></p>
                                    <small class="firstsmall"><a class="bg-orange" href="singlepage.php?id=<?= $catWisepostRow['id'] ?>"" title="Category"><?= $catWisepostRow['category_name'] ?></a></small>
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
                    echo '<h1 class="text-center">Not Avilable  !!</h1>';
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
                                    <p><?= substr($rowSearch['content'],0,350) ?></p>
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
                            <p><?= substr($row['content'],0,350) ?></p>
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
            <?php } ?>
        </div><!-- end row -->

    </div><!-- end col -->
<?php
require_once 'sidebar.php';
?>



<?php
require_once 'footer.php';
?>
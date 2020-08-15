<!--state overview start-->
<?php
use App\classes\Category;
use App\classes\Post;
use App\classes\UserLogin;
?>
<div class="row state-overview">
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol terques">
                <i class="fa fa-bars"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    <?= Category::countCategory() ?>
                </h1>
                <p>Total Categories</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol red">
                <i class=" fa fa-thumb-tack"></i>
            </div>
            <div class="value">
                <h1 class=" count2">
                    <?= Post::countPost() ?>
                </h1>
                <p>Total Post</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol yellow">
                <i class="fa fa-users"></i>
            </div>
            <div class="value">
                <h1 class=" count3">
                    <?= UserLogin::countActiveUser()?>
                </h1>
                <p>Total Users</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    <?= Post::countActivePost() ?>
                </h1>
                <p>Active Post</p>
            </div>
        </section>
    </div>
</div>

<!--state overview end-->
<div class="row">
    <div class="col-lg-6">
        <section class="card">
            <header class="card-header">

            </header>
            <div class="card-body text-center">
                <img src="img/download%20(1).png" alt="" class="img-fluid">
            </div>
        </section>
    </div>
    <div class="col-lg-6">
        <section class="card">
            <header class="card-header">

            </header>
            <div class="card-body text-center">
                <img src="img/download%20(3).png" alt="" class="img-fluid">
            </div>
        </section>
    </div>
</div>


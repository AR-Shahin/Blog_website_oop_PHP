<?php
require_once '../vendor/autoload.php';
session_start();
if(!isset($_SESSION['login-success'])){
    header('location:login.php');
}
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
use App\classes\Session;
use App\classes\UserLogin;
Use App\classes\Mail;
$name = $_SESSION['username'];
$userData = UserLogin::loginUserData("$name");
$title = '';
if($page == 'index.php'){
    $title = 'Home';
}elseif($page == 'addcategory.php' || $page == 'managecategory.php'){
    $title = 'Category';
}
elseif($page == 'addpost.php' || $page == 'managepost.php'){
    $title = 'Post';
}
elseif($page == 'adduser.php' || $page =='manageuser.php'){
    $title = 'User';
}
elseif($page == 'inbox.php' || $page =='sentmail.php' || $page =='draft.php' || $page =='strash.php'){
    $title = 'Mail';
}
elseif($page == 'logo.php' || $page =='social.php'){
    $title = 'Site Identity';
}
else{
    $title = 'Home';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">
    <!--  summernote -->
    <link href="assets/summernote/dist/summernote.css" rel="stylesheet">
    <title><?= $title . ' | '?>Admin Pannel</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <!--dynamic table-->
    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body>

<section id="container">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <i class="fa fa-bars"></i>
        </div>
        <!--logo start-->
        <a href="index.php" class="logo">AR<span> Shahin</span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-tasks"></i>
                        <span class="badge badge-success">6</span>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li>
                            <p class="green">You have 6 pending tasks</p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Dashboard v1.3</div>
                                    <div class="percent">40%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Database Update</div>
                                    <div class="percent">60%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Iphone Development</div>
                                    <div class="percent">87%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                        <span class="sr-only">87% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Mobile App</div>
                                    <div class="percent">33%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                        <span class="sr-only">33% Complete (danger)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Dashboard v1.3</div>
                                    <div class="percent">45%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                        <span class="sr-only">45% Complete</span>
                                    </div>
                                </div>

                            </a>
                        </li>
                        <li class="external">
                            <a href="#">See All Tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge badge-danger"><?= Mail::countNewMail() ?></span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-red"></div>
                        <li>
                            <p class="red">You have <?= Mail::countNewMail() ?> new messages</p>
                        </li>
                        <?php
                       $mail =  Mail::displayNewMail();
                       while ($m = mysqli_fetch_assoc($mail)){
                        ?>
                        <li>
                            <a href="">
                                <span class="photo"><img alt="avatar" src="img/avatar-mini.jpg"></span>
                                <span class="subject">
                                    <?= $m['subject']?>
                                </span>
                            </a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="inbox.php">See all messages</a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge badge-warning">7</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                            <p class="yellow">You have 7 new notifications</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                Server #3 overloaded.
                                <span class="small italic">34 mins</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning"><i class="fa fa-bell"></i></span>
                                Server #10 not respoding.
                                <span class="small italic">1 Hours</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                Database overloaded 24%.
                                <span class="small italic">4 hrs</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-success"><i class="fa fa-plus"></i></span>
                                New user registered.
                                <span class="small italic">Just now</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-info"><i class="fa fa-bullhorn"></i></span>
                                Application error.
                                <span class="small italic">10 mins</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">See all notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="../uploads/<?= $userData['image']?>" style="width: 35px">
                        <span class="username"><?= isset($_SESSION['username']) ? $_SESSION['username'] : '' ;?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout dropdown-menu-right">
                        <div class="log-arrow-up"></div>
                        <li><a href="profile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                        <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <li class="sb-toggle-right">
                    <i class="fa  fa-align-right"></i>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a  href="index.php" <?= $page == 'index.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'addcategory.php' ? 'class="active"' : '' ?> <?= $page == 'managecategory.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-shield"></i>
                        <span>Categories</span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'addcategory.php' ? 'class="active"' : '' ?>><a  href="addcategory.php" >Add Category</a></li>
                        <li <?= $page == 'managecategory.php' ? 'class="active"' : '' ?>><a  href="managecategory.php">Manage Category</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'addpost.php' ? 'class="active"' : '' ?> <?= $page == 'managepost.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-thumb-tack"></i>
                        <span>Posts</span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'addpost.php' ? 'class="active"' : '' ?>><a  href="addpost.php" >Add Post</a></li>
                        <li <?= $page == 'managepost.php' ? 'class="active"' : '' ?>><a  href="managepost.php">Manage Post</a></li>
                    </ul>
                </li>
                <!-- adduser only admin -->
                <?php
                if($userData['role'] == 1){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;" <?= $page == 'adduser.php' ? 'class="active"' : '' ?> <?= $page == 'manageuser.php' ? 'class="active"' : '' ?> >
                            <i class="fa fa-users"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sub">
                            <li <?= $page == 'adduser.php' ? 'class="active"' : '' ?>><a  href="adduser.php" >Add User</a></li>
                            <li <?= $page == 'manageuser.php' ? 'class="active"' : '' ?>><a  href="manageuser.php">Manage Users</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'inbox.php' ? 'class="active"' : '' ?> <?= $page == 'draft.php' ? 'class="active"' : '' ?> <?= $page == 'trash.php' ? 'class="active"' : '' ?><?= $page == 'sentmail.php' ? 'class="active"' : '' ?>>
                        <i class="fa fa-envelope-o"></i>
                        <span>Mail</span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'inbox.php' ? 'class="active"' : '' ?> <?= $page == 'draft.php' ? 'class="active"' : '' ?> <?= $page == 'trash.php' ? 'class="active"' : '' ?><?= $page == 'sentmail.php' ? 'class="active"' : '' ?>><a  href="inbox.php" >Manage Mail</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'logo.php' ? 'class="active"' : '' ?> <?= $page == 'social.php' ? 'class="active"' : '' ?> >
                        <i class="fa  fa-globe"></i>
                        <span>Site Identity</span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'logo.php' ? 'class="active"' : '' ?>><a  href="logo.php" >Logo & Footer</a></li>
                        <li <?= $page == 'social.php' ? 'class="active"' : '' ?>><a  href="social.php" >Social Media</a></li>
                    </ul>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
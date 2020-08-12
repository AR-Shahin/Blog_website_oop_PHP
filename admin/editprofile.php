<?php require_once 'header.php';
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
?>
<?php
use App\classes\UserLogin;
$name = $_SESSION['username'];
$userData = UserLogin::loginUserData("$name");
?>
<div class="row">
    <aside class="profile-nav col-lg-3">
        <section class="card">
            <div class="user-heading round">
                <a href="">
                    <img src="../uploads/<?= $userData['image']?>" alt="">
                </a>
                <h1><?= $userData['fname'] . $userData['lname'] ?></h1>
                <p><?= $userData['email'] ?></p>
            </div>

            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item"><a class="nav-link" href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
                <li class=" active nav-item"><a class="nav-link" href="editprofile.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
            </ul>

        </section>
    </aside>
    <aside class="profile-info col-lg-9">
        <div class="panel-body bio-graph-info">
            <h1>Update Profile Info</h1>
            <h6><i><?= \App\classes\Session::get('uptxt')?></i></h6>
            <form class="form-horizontal" role="form" action="update.php" method="post">
                <div class="form-group">
                    <label class="col-lg-2 control-label">About Me</label>
                    <div class="col-lg-10">
                        <textarea name="bio" id="" class="form-control" cols="30" rows="10">
                            <?= $userData['bio'] ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">First Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="f-name" placeholder=" " value="<?= $userData['fname'] ?>" name="fname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Last Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="l-name" placeholder=" " value="<?= $userData['lname'] ?>" name="lname">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Role</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="occupation" placeholder=" " value="<?=
                        $userData['role'] == 1 ? 'Admin' : 'Editor' ?>"  readonly>
                        <input name="id" type="hidden" class="form-control" id="email" placeholder=" " value="<?= $userData['id'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-6">
                        <input type="text" name="email" class="form-control" id="email" placeholder=" " value="<?= $userData['email'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Username</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="mobile" name="username" placeholder=" " value="<?= $userData['username'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" class="btn btn-success" name="update-user" value="Save"></input>
                    </div>
                </div>
            </form>
        </div>
    </aside>
</div>
<?php
\App\classes\Session::unsetSession('uptxt');
?>
<?php require_once 'footer.php'?>

<?php require_once 'header.php';
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
?>
<div class="row">
    <aside class="profile-nav col-lg-3">
        <section class="card">
            <div class="user-heading round">
                <a href="#">
                    <img src="img/profile-avatar.jpg" alt="">
                </a>
                <h1>Jonathan Smith</h1>
                <p>jsmith@flatlab.com</p>
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
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-lg-2 control-label">About Me</label>
                    <div class="col-lg-10">
                        <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">First Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="f-name" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Last Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="l-name" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Country</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="c-name" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Birthday</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="b-day" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Occupation</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="occupation" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="email" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Mobile</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="mobile" placeholder=" ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Website URL</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="url" placeholder="http://www.demowebsite.com ">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </aside>
</div>
<?php require_once 'footer.php'?>

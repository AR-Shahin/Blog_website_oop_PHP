<?php require_once 'header.php' ?>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;">Add User</h3>
                <span style="font-weight: bold"><?= isset($_SESSION['txt']) ? $_SESSION['txt'] : ''?></span>
                <span style="font-weight: bold;color: red"><?= isset($_SESSION['userExists']) ? $_SESSION['userExists'] : ''?></span>
            </header>
            <div class="card-body">
                <form action="insert.php" method="post">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">User Name</label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control" id="inputEmail3" placeholder="User Name" name="user_name"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" required class="form-control" id="inputEmail3" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" required class="form-control" id="inputEmail3" placeholder="password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" required class="form-control" id="inputEmail3" placeholder="Confirm password" name="conpassword">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Role</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="status" id="gridRadios1" value="1">
                                    <label class="form-check-label" for="gridRadios1">
                                        Admin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="2">
                                    <label class="form-check-label" for="gridRadios2">
                                        Editor
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-primary btn-block" name="user-btn" value="Save User">
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>
<?php
    \App\classes\Session::unsetSession("userExists");
?>
<?php require_once 'footer.php' ?>

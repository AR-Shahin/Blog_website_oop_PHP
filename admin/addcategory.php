<?php require_once 'header.php' ?>

    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;">Add Category</h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['txt']) ? $_SESSION['txt'] : ''?></span>
                </header>
                <div class="card-body">
                    <form action="insert.php" method="post">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="inputEmail3" placeholder="Category Name" name="category_name">
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="status" id="gridRadios1" value="1">
                                        <label class="form-check-label" for="gridRadios1">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-block" name="cat-btn" value="Save Category">
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
<?php
if(isset($_SESSION['txt'])){
    unset($_SESSION['txt']);
}
?>

<?php require_once 'footer.php' ?>
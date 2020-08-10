<?php require_once 'header.php'?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;">All Category</h3>
                <span><b><?= \App\classes\Session::get('uptxt')?></b></span>
                <span style="color: red;margin-left: 50px;"><b><?= \App\classes\Session::get('dltTxt')?></b></span>
            </header>
            <div class="card-body">
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Admin</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once '../vendor/autoload.php';
                        $allCat = new \App\classes\Category();
                        $data = $allCat->showAllCategory();
                        $i=0;
                        while ($row = mysqli_fetch_assoc($data)){ ?>
                            <tr>
                                <th scope="row"><?= ++$i?></th>
                                <td scope="row"><?= strtoupper($row['category_name'])?></td>
                                <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Inactive</span>' ?></td>
                                <td><?= $row['admin_name']?></td>
                                <td class="text-center">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                        <a href="status.php?id=<?= $row['id']?>&managecat&inactive" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-down"></i> Inactive</a>
                                    <?php  }else{ ?>
                                        <a href="status.php?id=<?= $row['id']?>&managecat&active" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-up"></i> Active</a>
                                    <?php } ?>
                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#id<?= $row['id']?>"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="delete.php?id=<?= $row['id']?>&managecat" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i> Delete</a>
                                </td>
                            </tr>
                        <?php  }   ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
use App\classes\Category;
$allData = Category::showAllCategory();
while ($row = mysqli_fetch_assoc($allData)){ ?>
    <!-- EDIT CATEGORY Modal -->
    <div class="modal fade" id="id<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update.php" method="post">
                        <div class="form-group">
                            <label for="cat"><b>Category Name</b></label>
                            <input  type="text" class="form-control" value="<?= $row['category_name']?>" name="catName">
                        </div>
                        <input type="hidden" value="<?= $row['id']?>" name="id">
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-block btn-success" name="update-cat">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
    \App\classes\Session::unsetSession('uptxt');
    \App\classes\Session::unsetSession('dltTxt');
?>
<?php require_once 'footer.php'?>

<?php require_once 'header.php' ?>

<!-- page start-->
<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                All Post <span style="color: red"><b><?= \App\classes\Session::get('dltTxt')?></b></span>
                <span class="tools pull-right">
                                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                                        <a href="javascript:;" class="fa fa-times"></a>
                                    </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped table-hover" id="dynamic-table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th >Image</th>
                            <th >Admin</th>
                            <th >Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <?php
                        require_once '../vendor/autoload.php';
                        $allCat = new \App\classes\Post();
                        $data = $allCat->showAllPost();
                        $i=0;
                        while ($row = mysqli_fetch_assoc($data)){ ?>
                            <tr>
                                <td scope="row"><?= ++$i?></td>
                                <td><?= substr($row['title'],0,40)?></td>
                                <td><?= $row['category_name']?></td>
                                <td><img style="width: 50px" src="../uploads/<?= $row['image']?>" alt=""></td>
                                <td><?= $row['admin']?></td>
                                <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Inactive</span>' ?></td>
                                <td class="text-center">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                        <a href="status.php?id=<?= $row['id']?>&managepost&inactive" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-down"></i> Inactive</a>
                                    <?php  }else{ ?>
                                        <a href="status.php?id=<?= $row['id']?>&managepost&active" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-up"></i> Active</a>
                                    <?php } ?>
                                    <?php
                                    if($row['rate'] == 1) { ?>
                                        <a href="status.php?id=<?= $row['id']?>&managepost&makedown" class="btn btn-sm btn-dark"><i class="fa  fa-hand-o-down"></i> Down</a>
                                    <?php  }else{ ?>
                                        <a href="status.php?id=<?= $row['id']?>&managepost&maketop" class="btn btn-sm btn-secondary"><i class="fa  fa-hand-o-up"></i> Top</a>
                                    <?php } ?>
                                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#id<?= $row['id']?>"><i class="fa fa-eye"></i> View</a>
                                    <a href="updatepost.php?id=<?= $row['id']?>&updatepost" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                    <a href="delete.php?id=<?= $row['id']?>&managepost" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i> Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
use App\classes\Post;
$allData = Post::showAllPost();
while ($row = mysqli_fetch_assoc($allData)){ ?>

    <!-- VIEW POST Modal -->
<div class="modal fade " id="id<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="overflow: hidden">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Title : <?= $row['title']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover" style="overflow:hidden;">
                        <tr>
                            <th>Category</th>
                            <td><?= strtoupper($row['category_name'])?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Inactive</span>' ?></td>
                        </tr>
                        <tr>
                            <th>Admin</th>
                            <td><?= ucwords($row['admin'])?></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><?= $row['date']?></td>
                        </tr>
                        <tr>
                            <th>Tags</th>
                            <td><?= $row['tag']?></td>
                        </tr>
                        <tr>
                            <th>Content</th>
                            <td><?= $row['content']?></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td class="text-center"><img width="200px" src="../uploads/<?= $row['image']?>" alt=""></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
\App\classes\Session::unsetSession('dltTxt');
?>
<?php require_once 'footer.php' ?>

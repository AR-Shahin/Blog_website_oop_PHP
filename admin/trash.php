<?php require_once 'mailHeader.php'?>
    <div class="row">
        <div class="col-sm-12">
            <section class="card">
                <div class="card-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped table-hover" id="dynamic-table">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th >Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php
                            require_once '../vendor/autoload.php';
                            $allCat = new \App\classes\Mail();
                            $data = $allCat->showTrashMail();
                            $i=0;
                            while ($row = mysqli_fetch_assoc($data)){ ?>
                                <tr>
                                    <td scope="row"><?= ++$i?></td>
                                    <td><?= $row['name']?></td>
                                    <td><?= $row['subject']?></td>
                                    <td><?= $row['email']?></td>
                                    <td>
                                        <a href="delete.php?id=<?= $row['id']?>&trashpage" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php require_once 'footer.php'?>
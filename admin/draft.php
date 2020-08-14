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
                            $allCat = new \App\classes\Post();
                            $data = $allCat->showAllPost();
                            $i=0;
                            while ($row = mysqli_fetch_assoc($data)){ ?>
                                <tr>
                                    <td scope="row"><?= ++$i?></td>

                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php require_once 'footer.php'?>
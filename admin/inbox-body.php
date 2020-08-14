
<div class="inbox-body">
    <div class="mail-option">
        <div class="chk-all">
            <input type="checkbox" class="mail-checkbox mail-group-checkbox">
            <div class="btn-group">
                <a class="btn mini all" href="#" data-toggle="dropdown">
                    All
                    <i class="fa fa-angle-down "></i>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"> None</a>
                    <a class="dropdown-item" href="#"> Read</a>
                    <a class="dropdown-item" href="#"> Unread</a>

                </div>
            </div>
        </div>

        <div class="btn-group">
            <a class="btn mini tooltips" href="#" data-toggle="dropdown" data-placement="top" data-original-title="Refresh">
                <i class=" fa fa-refresh"></i>
            </a>
        </div>
        <div class="btn-group hidden-phone">
            <a class="btn mini blue" href="#" data-toggle="dropdown">
                More
                <i class="fa fa-angle-down "></i>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Mark as Read</a>
                <a class="dropdown-item" href="#"><i class="fa fa-ban"></i> Spam</a>
                <a class="dropdown-item" href="#"><i class="fa fa-trash-o"></i> Delete</a>
            </div>
        </div>
        <div class="btn-group">
            <a class="btn mini blue" href="#" data-toggle="dropdown">
                Move to
                <i class="fa fa-angle-down "></i>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Mark as Read</a>
                <a class="dropdown-item" href="#"><i class="fa fa-ban"></i> Spam</a>
                <a class="dropdown-item" href="#"><i class="fa fa-trash-o"></i> Delete</a>
            </div>
        </div>
        <span style="color: green;font-size: 18px"><?= \App\classes\Session::get("replysent")?></span>
        <span><?= \App\classes\Session::get("replynotsent")?></span>
        <ul class="unstyled inbox-pagination">
            <li><span>1-50 of 234</span></li>
            <li>
                <a href="#" class="np-btn"><i class="fa fa-angle-left  pagination-left"></i></a>
            </li>
            <li>
                <a href="#" class="np-btn"><i class="fa fa-angle-right pagination-right"></i></a>
            </li>
        </ul>
    </div>
    <table class="table table-inbox table-hover">
        <tbody>
        <?php
        use App\classes\Mail;
        $res = Mail::showAllMail();
        $i=0;
        while ($row = mysqli_fetch_assoc($res)){ ?>
        <tr  <?= $row['status'] == 2 ? 'class="unread"' : '' ?>>
            <td class="inbox-small-cells">
               <span style="<?= $row['status'] == 2 ? 'color:green' : 'color:red' ?>"><?= ++$i ?></span>
            </td>
            <td class="view-message  dont-show"><?= substr($row['subject'],0,15) ?></td>
            <td class="view-message "><a href="" data-toggle="modal" data-target="#view<?=$row['id'] ?>"><?= substr($row['message'],0,20) ?></a></td>
            <td class="view-message  text-right"><?= $row['date'] ?></td>
            <td class="view-message  ">
                <?php
                if($row['status'] != 2){ ?>
                    <a href="status.php?id=<?= $row['id'] ?>&seen&inbox-body" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Seen</a>
               <?php } ?>

                <a class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#ex<?= $row['id'] ?>" ><i class="fa fa-share"></i> Reply</a>
                <a href="status.php?id=<?= $row['id'] ?>&trash&inbox-body" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Trash</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<?php
$res = Mail::showAllMail();
while ($row = mysqli_fetch_assoc($res)) {
?>
<div class="modal fade" id="view<?=$row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="inbox-body">
                    <div class="heading-inbox row">
                        <div class="col-md-8">
                            <div class="compose-btn">
                                <a class="btn btn-sm btn-primary" href="mail_compose.html"><i class="fa fa-reply"></i> Reply</a>
                                <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn  btn-sm tooltips"><i class="fa fa-print"></i> </button>
                                <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm tooltips"><i class="fa fa-trash-o"></i></button>
                            </div>

                        </div>
                        <div class="col-md-4 text-right">
                            <p class="date"><?= $row['date'] ?></p>
                        </div>
                        <div class="col-md-12">
                            <h4> <?= $row['subject'] ?> </h4>
                        </div>
                    </div>
                    <div class="sender-info">
                        <div class="row">
                            <div class="col-md-12">
                                <img alt="" src="img/mail-avatar.jpg">
                                <strong><?= ucwords($row['name']) ?></strong>
                                <span>[<?= $row['email'] ?>]</span>
                                to
                                <strong>me</strong>
                                <a class="sender-dropdown " href="javascript:;">
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="view-mail">
                        <p><?= $row['message'] ?></p>
                    </div>

                    <div class="compose-btn pull-left">
                        <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#collapseExample" role="button"><i class="fa fa-reply"></i> Reply</a>
                        <button class="btn btn-sm "><i class="fa fa-arrow-right"></i> Forward</button>
                        <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn  btn-sm tooltips"><i class="fa fa-print"></i> </button>
                        <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm tooltips"><i class="fa fa-trash-o"></i></button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal REPLY -->
    <div class="modal fade" id="ex<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subject : <?= $row['subject'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php

                ?>
                <div class="modal-body">
                    Name : <?= $row['name'] ?> <br> <br>
                    Email : <?= $row['email'] ?> <br> <br>
                    Date : <?= $row['date'] ?> <br> <br>
                    <form action="insert.php" method="post">
                    Comment :     <input type="text" class="form-control" placeholder="Comment" name="reply"> <br>
                        <input type="hidden" name="id" id="" value="<?= $row['id']?>">
                        <input type="hidden" name="email" id="" value="<?= $row['email']?>">
                  <input type="submit" class="btn btn-primary" name="reply-btn" value="Send">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
\App\classes\Session::unsetSession("replysent");
\App\classes\Session::unsetSession("replynotsent");
?>

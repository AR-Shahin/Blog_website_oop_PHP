<?php require_once 'header.php';
use App\classes\Session;
if (isset($_POST['msg-btn'])) {
    $ob = new \App\classes\Mail();
    $ob->sendMail($_POST);
}
?>

<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-envelope-open-o bg-orange"></i> Contact us <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="row">
                        <div class="col-lg-5">
                            <h4>Who we are</h4>
                            <p>Tech Blog is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>

                            <h4>How we help?</h4>
                            <p>Etiam vulputate urna id libero auctor maximus. Nulla dignissim ligula diam, in sollicitudin ligula congue quis turpis dui urna nibhs. </p>

                            <h4>Pre-Sale Question</h4>
                            <p>Fusce dapibus nunc quis quam tempor vestibulum sit amet consequat enim. Pellentesque blandit hendrerit placerat. Integertis non.</p>
                        </div>
                        <div class="col-lg-7">
                            <span style="color: #0b2e13"><?= Session::get("succesMail") ?></span>
                            <span style="color: red"><?= Session::get("failMail") ?></span>
                            <form class="form-wrapper" action="" method="post" >
                                <div class="form-group">
                                    <input type="text" required class="form-control" placeholder="Your name" name="name" style="margin-bottom: 0px;">
                                    <span style="margin: 0px;color: red"><?= Session::get("emptyName") ?></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email address" name="email" style="margin-bottom: 0px;>
                               <span style="margin: 0px;color: red"><?= Session::get("emptyEmail")?></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone" name="phone" style="margin-bottom: 0px;>
                                    <span style="margin: 0px;color: red"><?= Session::get("emptyPhone") ?></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" name="subject" style="margin-bottom: 0px;>
                                    <span style="margin: 0px;color: red"><?= Session::get("emptySubject") ?></span>
                                </div>
                                <textarea class="form-control" placeholder="Your message" name="message" ></textarea>
                                <span style="margin: 0px;color: red"><?= Session::get("emptymsg") ?></span>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="msg-btn">Send <i class="fa fa-envelope-open-o"></i></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php
Session::unsetSession("emptyName");
Session::unsetSession("emptyEmail");
Session::unsetSession("emptyPhone");
Session::unsetSession("emptySubject");
Session::unsetSession("succesMail");
Session::unsetSession("failMail");
?>
<?php require_once 'footer.php' ?>

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
$assetUrl = AppAsset::register($this)->baseUrl;
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?= Html::encode($this->title) ?></title>
        <?= Html::csrfMetaTags() ?>

        <!-- css ><-->

        <link rel="shortcut icon" href="<?= $assetUrl ?>/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= $assetUrl ?>/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= $assetUrl ?>/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= $assetUrl ?>/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?= $assetUrl ?>/images/ico/apple-touch-icon-57-precomposed.png">
        <?php $this->head() ?>
    </head><!--/head-->

<body>
<?php $this->beginBody() ?>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                    <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="/">
                        <h1><img src="<?= $assetUrl ?>/images/logo.png" alt="logo"></h1>
                    </a>

                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="/">Home</a></li>
                        <li class="dropdown"><a href="#">Pages <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="<?= \yii\helpers\Url::toRoute(['site/about']) ?>">About</a></li>
                                <li><a href="<?= \yii\helpers\Url::toRoute(['site/service']) ?>">Services</a></li>
                                <li><a href="<?= \yii\helpers\Url::toRoute(['site/pricing']) ?>">Pricing</a></li>
                                <li><a href="<?= \yii\helpers\Url::toRoute(['site/contact']) ?>">Contact us</a></li>
                                <li><a href="<?= \yii\helpers\Url::toRoute(['site/error-404']) ?>">404 error</a></li>
                                <li><a href="<?= \yii\helpers\Url::toRoute(['site/coming-soon']) ?>">Coming Soon</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="<?= \yii\helpers\Url::toRoute(['site/blog']) ?>">Blog <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="<?= \yii\helpers\Url::toRoute(['site/blog']) ?>">Blog Default</a></li>
                                <li><a href="<?= \yii\helpers\Url::toRoute(['site/blog-details']) ?>">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="<?= \yii\helpers\Url::toRoute(['site/about']) ?>">Portfolio <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="<?= \yii\helpers\Url::toRoute(['site/portfolio']) ?>">Portfolio Default</a></li>
                                <li><a href="<?= \yii\helpers\Url::toRoute(['site/portfolio-details']) ?>">Portfolio Details</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= \yii\helpers\Url::toRoute(['site/shortcodes']) ?>">Shortcodes</a></li>
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <!-- contents-->
    <?= $content ?>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="<?= $assetUrl ?>/images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="testimonial bottom">
                        <h2>Testimonial</h2>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="<?= $assetUrl ?>/images/home/profile1.png" alt=""></a>
                            </div>
                            <div class="media-body">
                                <blockquote>Nisi commodo bresaola, leberkas venison eiusmod bacon occaecat labore tail.</blockquote>
                                <h3><a href="#">- Jhon Kalis</a></h3>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="<?= $assetUrl ?>/images/home/profile2.png" alt=""></a>
                            </div>
                            <div class="media-body">
                                <blockquote>Capicola nisi flank sed minim sunt aliqua rump pancetta leberkas venison eiusmod.</blockquote>
                                <h3><a href="">- Abraham Josef</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="contact-info bottom">
                        <h2>Contacts</h2>
                        <address>
                            E-mail: <a href="mailto:someone@example.com">email@email.com</a> <br>
                            Phone: +1 (123) 456 7890 <br>
                            Fax: +1 (123) 456 7891 <br>
                        </address>

                        <h2>Address</h2>
                        <address>
                            Unit C2, St.Vincent's Trading Est., <br>
                            Feeder Road, <br>
                            Bristol, BS2 0UY <br>
                            United Kingdom <br>
                        </address>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                        <h2>Send a message</h2>
                        <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; ANSUNS 2018. All Rights Reserved.</p>
                        <p>Designed by <a target="_blank" href="/">ANSUNS</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

        <!-- js -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
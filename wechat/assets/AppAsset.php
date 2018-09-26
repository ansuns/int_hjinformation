<?php

namespace wechat\assets;

use yii\web\AssetBundle;

/**
 * Main wechat application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/sourcePath';
    public $baseUrl = '@web/static';
    public $css = [
        "css/bootstrap.min.css",
        "css/font-awesome.min.css",
        "css/animate.min.css",
        "css/lightbox.css",
        "css/main.css",
        "css/responsive.css",
    ];
    public $js = [
        "js/jquery.js",
        "js/bootstrap.min.js",
        "js/lightbox.min.js",
        "js/wow.min.js",
        "js/main.js",

    ];
    //public $jsOptions = ['condition' => 'lt IE9','js'=>['js/html5shiv.js','js/respond.min.js']];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

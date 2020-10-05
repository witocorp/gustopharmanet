<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'vendor/fontawesome-free/css/all.min.css',
        'css/sb-admin-2.css',
    ];
    public $js = [
		'vendor/bootstrap/js/bootstrap.bundle.min.js',
		'vendor/jquery-easing/jquery.easing.min.js',
		'js/sb-admin-2.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}

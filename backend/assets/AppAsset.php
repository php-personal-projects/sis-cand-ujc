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
        'css/site.css',
		'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
		'//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css',
		'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
		'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
		'css/fontawesome.min.css',
    ];
    public $js = [
		'//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
		'\rmrevin\yii\fontawesome\AssetBundle',
		'fedemotta\datatables\DataTablesAsset',
    ];
}

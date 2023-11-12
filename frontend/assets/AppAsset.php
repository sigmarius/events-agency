<?php

namespace frontend\assets;

use Yii;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // ! не используем лидирующий слеш
        // 'themes/main/css/bootstrap.css', -> заменили на BootstrapPluginAsset
        'themes/main/css/font-awesome.min.css',
        'themes/main/css/style.css',
    ];
    public $js = [
        // ! не используем лидирующий слеш
        // 'themes/main/js/jquery.min.js',  -> заменили на BootstrapPluginAsset
        // 'themes/main/js/bootstrap.min.js', -> заменили на BootstrapPluginAsset
        'themes/main/js/scripts.js',
    ];
    public $depends = [
        YiiAsset::class, // для обеспечения корректной работы форм
        BootstrapPluginAsset::class, // подключает BootstrapAsset::class, включающий bootstrap.css, bootstarp.js и jquery
    ];
}

<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Reset styles frontend application asset bundle.
 */
class ResetAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // ! не используем лидирующий слеш
        'themes/main/css/reset.css',
    ];
}

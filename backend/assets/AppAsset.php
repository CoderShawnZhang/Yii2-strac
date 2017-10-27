<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets';
//    public $baseUrl = '@web';
    public $css = [
        'css/layui.css',
        '//at.alicdn.com/t/font_tnyc012u2rlwstt9.css',
        'css/main.css',
    ];
    public $js = [
    ];
    public $depends = [

    ];
}

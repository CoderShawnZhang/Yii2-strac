<?php

/**
 * 留言板导航小部件 资源文件
 */
namespace backend\extend\modules\Suggest\widgets;

use yii\web\AssetBundle;

class Navasset extends AssetBundle
{
    public $sourcePath = '@backend/extend/modules/Suggest/widgets/assets';

    public $css = [
        'css/layui.css',
        'css/main.css'
    ];
    public $js = [
        'js/nav.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
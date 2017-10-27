<?php

/**
 * 天气预报小部件 资源管理
 */
namespace backend\extend\modules\Weather\widgets;

use \yii\web\AssetBundle;

class WeatherAsset extends AssetBundle
{
    public $sourcePath = '@backend/extend/modules/Weather/widgets/assets';

    public $js = [
        'js/init.js'
    ];
}
<?php

/**
 * 天气预报小部件
 */
namespace backend\extend\modules\Weather\widgets;
use yii\base\Widget;
class WeatherWidget extends Widget
{
    public function init(){
        return $this->render('show');
    }
}
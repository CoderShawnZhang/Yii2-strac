<?php

/**
 * 模块基类
 */

namespace backend\extend\modules;
use Yii;

class BaseModule extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        //使用反射获取类名
        $class = new \ReflectionClass($this);
        if(Yii::$app->id == 'backend'){
            $this->controllerNamespace = $class->getNamespaceName() . '\controllers';
            $this->viewPath = $this->basePath . '/views';
        }else if (Yii::$app->id == 'frontend'){

        }
    }
}
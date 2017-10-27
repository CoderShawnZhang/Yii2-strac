<?php

/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/24
 * Time: 下午3:33
 */
namespace backend\extend\modules\Tag\controllers;

class IndexController extends \yii\web\Controller
{
    public function actionIndex(){
//        var_dump(123);die;
        return $this->render('index');
    }
}
<?php
/**
 * 系统参数 -- 控制器
 */

namespace backend\controllers;

use backend\models\Setting;
use yii\base\Controller;

class SettingController extends Controller
{
    public function actionIndex(){
        $setting = Setting::find()->where(['hide'=>0])->all();

        return $this->render('index',['setting' => $setting]);
    }
}
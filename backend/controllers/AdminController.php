<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/25
 * Time: 下午6:20
 */

namespace backend\controllers;


use yii\base\Controller;

class AdminController extends Controller
{
    public function actionTest1(){
//        var_dump(123);die;
        return $this->render('test1');
    }
    public function actionTest2(){
        return $this->render('test2');
    }
    public function actionTest3(){
        return $this->render('test3');
    }
    public function actionTest4(){
        return $this->render('test4');
    }
}
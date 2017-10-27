<?php
/**
 * 设计模式调用
 */

namespace backend\controllers;
use backend\DesignPatterns\FactoryMethod\DellCpuFactory;
use backend\DesignPatterns\SimpleFactory\SimpleFactory;
use backend\DesignPatterns\Singleton\MySql;
use yii\web\Controller;

class DesignController extends Controller
{
    /**
     * 单例模式
     */
    public function actionSingleton(){
        $mysql = MySql::connection();
        echo $mysql->test();
    }

    /**
     * 简单工厂模式
     */
    public function actionSimpleFactory(){
        $factory = new SimpleFactory();
        $carObj = $factory->createObj();
        echo $carObj->driver();
    }

    /**
     * 工厂方法模式
     */
    public function actionFactoryMethod(){
        $factory = new DellCpuFactory();
        $cpu = $factory->createCpu();
        echo $cpu->setPoint();
    }
}
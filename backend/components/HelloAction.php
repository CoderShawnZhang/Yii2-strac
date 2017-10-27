<?php

/**
 * 独立控制器
 */
namespace backend\components;

use backend\event\createOrder\OrderCreate;
use backend\event\createOrder\Event;
use backend\models\Orders;


class HelloAction extends \yii\base\Action
{
    public function run(){
//       $order = Orders::find()->where()->one();
       $Event = new Event();
       $Event->addEvent(new OrderCreate());
       return $Event->trigger();
    }
}
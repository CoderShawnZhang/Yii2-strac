<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/17
 * Time: 下午3:03
 */

namespace backend\controllers;


use yii\base\Component;

class Foo extends Component
{
    const EVENT_HELLO = 'hello';

    public function bar(){
        $this->trigger(self::EVENT_HELLO);
    }

    public function testEvent(){
        var_dump(123);
    }
}
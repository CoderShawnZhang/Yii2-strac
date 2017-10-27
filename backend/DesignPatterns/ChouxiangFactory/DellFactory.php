<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/18
 * Time: 上午8:57
 */

namespace backend\DesignPatterns\ChouxiangFactory;


class DellFactory implements AbstractFactory
{

    public function createCpu()
    {
        $cpu = new DellCpu();
        return $cpu;
    }

    public function createMemory()
    {
        $memory = new DellMemory();
        return $memory;
    }
}
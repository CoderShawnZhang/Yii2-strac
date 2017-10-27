<?php
/**
 * 联想工厂
 */

namespace backend\DesignPatterns\ChouxiangFactory;


class ThinkFactory implements AbstractFactory
{
    public function createCpu()
    {
        $cpu = new ThinkCpu();
//        $create = $cpu->point();
        return $cpu;
    }

    public function createMemory()
    {
        $memory = new ThinkMemory();
        return $memory;
    }
}
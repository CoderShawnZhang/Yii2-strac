<?php

/**
 * 戴尔cpu
 */
namespace backend\DesignPatterns\FactoryMethod;

class DellCpuFactory implements CpuFactory
{
    public function createCpu()
    {
        $cpu = new DellCpu();
        return $cpu;
    }
}
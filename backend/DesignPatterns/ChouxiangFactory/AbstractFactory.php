<?php
/**
 * 抽象工厂
 */

namespace backend\DesignPatterns\ChouxiangFactory;


interface AbstractFactory
{
    public function createCpu();
    public function createMemory();
}
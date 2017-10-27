<?php

/**
 * 工厂类
 */
namespace backend\DesignPatterns\SimpleFactory;
class SimpleFactory
{
    public function createObj(){
        return new Car();
    }
}
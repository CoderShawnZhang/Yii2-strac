<?php

/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/17
 * Time: 下午6:51
 */
namespace backend\DesignPatterns\FactoryMethod;
class DellCpu implements Cpu
{
    public function setPoint()
    {
        //设置cpu针
        return '戴尔制作一款32针cpu';
    }
}
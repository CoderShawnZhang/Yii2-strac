<?php

/**
 * cup接口
 */
namespace backend\DesignPatterns\ChouxiangFactory;

interface Cpu
{
    //cpu 统一协议
    public function rules();

    //cpu 统一阵脚数
    public function point();

}
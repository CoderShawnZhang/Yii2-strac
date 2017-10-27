<?php

/**
 * 计算接口
 * 计算超量 & 计算用量
 */
interface Jisuan
{
    //计算超量
    public function quantity($data);
    //计算用量
    public function useAmount($data);

}
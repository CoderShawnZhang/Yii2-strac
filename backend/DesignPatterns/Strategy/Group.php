<?php

/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/19
 * Time: 下午3:39
 */
class Group implements Jisuan
{
    /**
     * 计算地面超量
     */
    public function quantity($data)
    {
        return ['quantity' => 80];
    }

    /**
     * 计算地面用量
     */
    public function useAmount($data)
    {
        return 12;
    }
}
<?php

/**
 * 门类
 */
class Door implements Jisuan
{

    /**
     * 计算门类超量
     */
    public function quantity($data)
    {
        return ['quantity'=>100];
    }

    /**
     * 计算门类用量
     */
    public function useAmount($data)
    {
        return 10;
    }
}
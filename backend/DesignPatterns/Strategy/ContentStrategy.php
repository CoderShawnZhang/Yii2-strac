<?php

/**
 * 策略 上下文
 */
class ContentStrategy
{
    protected $obj;

    public function __construct(Jisuan $_obj)
    {
        $this->obj = $_obj;
    }

    public function handleQuantity(){
        return $this->obj->quantity();
    }

    public function handleUserAmount(){
        return $this->obj->useAmount();
    }
}
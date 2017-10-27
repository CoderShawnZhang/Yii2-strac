<?php

/**
 * 事件触发类
 */
class Event extends EventGenerator
{
    public function trigger(){
        $this->notify();
    }
}
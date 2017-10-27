<?php

/**
 * 事件基类
 */
abstract class EventGenerator
{
    protected $_observer = [];

    public function addObserver(observer $observer){
        $this->_observer[] = $observer;
    }

    public function notify(){
        foreach($this->_observer as $observer){
            $observer->update('通知');
        }
    }
}
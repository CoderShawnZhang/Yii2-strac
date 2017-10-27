<?php
namespace backend\event\createOrder;
/**
 * 创建订单事件监听者
 */

class OrderCreate implements IObserver
{
    public function writelog()
    {
        echo '日志记录，订单被创建'.time();
    }
}
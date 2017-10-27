<?php

/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/18
 * Time: 下午2:25
 */
class Observer1 implements observer
{
    public function update($message)
    {
        echo '1号得到通知！'.$message;
    }
}
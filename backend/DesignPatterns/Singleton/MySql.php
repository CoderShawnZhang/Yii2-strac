<?php

namespace backend\DesignPatterns\Singleton;
class MySql{
    private static $conn;
    private function __construct()
    {
    }

    public static function connection(){
        if(!self::$conn instanceof self){
            self::$conn = new self;
        }
        return self::$conn;
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
    public function test(){
        return 123;
    }
}
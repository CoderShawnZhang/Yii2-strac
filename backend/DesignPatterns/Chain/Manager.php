<?php

/**
 * 抽象管理者
 */
abstract class Manager
{
    protected $name;

    protected $maneger;

    public function __construct($_name)
    {
        $this->name = $_name;
    }

    public function setHander(Manager $_mana){
        $this->maneger = $_mana;
    }

    abstract public function Apply(Request $_re);
}
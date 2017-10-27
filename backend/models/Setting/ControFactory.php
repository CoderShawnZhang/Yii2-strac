<?php

/**
 * 控件工厂
 * 生产控件
 */
use backend\models\Setting\Constant;
use backend\models\Setting\Input;
class ControFactory
{
    protected $ctlObj = null;

    public function createController($ctlType,$val,$place){
        switch ($ctlType){
            case Constant::INPUT :
                $this->ctlObj = new Input($val,$place);
                break;
            case Constant::TEXTAREA :
                break;
        }
        return $this->ctlObj;
    }
}
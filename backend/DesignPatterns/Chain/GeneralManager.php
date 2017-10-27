<?php

/**
 * 总经理
 */
class GeneralManager extends Manager
{
    public function __construct($_name)
    {
        parent::__construct($_name);
    }

    public function Apply(Request $_re)
    {
        if($_re->requestType =='请假'){
            echo $this->name.'请假'.$_re->num.'天：'.$_re->requestContent.'被批准'.'<br/>';
        }
        else if($_re->requestType == '加薪' && $_re->num <= 500){
            echo $this->name.'加薪'.$_re->num.'元：'.$_re->requestContent.'被批准'.'<br/>';
        }
        else if($_re->requestType == '加薪' && $_re->num > 500){
            echo $this->name.'加薪'.$_re->num.'元：'.$_re->requestContent.'再说吧'.'<br/>';
        }
    }
}
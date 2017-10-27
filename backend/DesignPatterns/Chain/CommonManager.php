<?php

/**
 * 经理
 */
class CommonManager extends Manager
{
    public function __construct($_name)
    {
        parent::__construct($_name);
    }
    public function Apply(Request $_re)
    {
        if($_re->requestType == '请假' && $_re->num<=2){
            echo $this->name.'请假'.$_re->num.'天：'.$_re->requestContent.'被批准'.'<br/>';
        }else{
            if(isset($this->maneger)){
                $this->maneger->Apple($_re);
            }
        }
    }
}
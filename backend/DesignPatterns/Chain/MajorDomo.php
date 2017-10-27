<?php

/**
 * 总监
 */
class MajorDomo extends Manager
{
    public function __construct($_name){
        $this->name = $_name;
    }

    public function Apply(Request $_re)
    {
        if($_re->requestType == '请假' && $_re->num <= 5){
            echo $this->name.'请假'.$_re->num.'天：'.$_re->requestContent.'被批准'.'<br/>';
        }else{
            if(isset($this->maneger)){
                $this->maneger->Apply($_re);
            }
        }
    }


}
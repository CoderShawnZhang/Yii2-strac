<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/26
 * Time: 下午9:11
 */

namespace backend\models\Setting;

use backend\models\Setting\Controtype;

class Input implements Controtype
{
    protected $val;
    protected $place;
    public function __construct($_val,$_place)
    {
        $this->val = $_val;
        $this->place = $_place;
    }

    public function create()
    {
        return '<input type="text" value="'.$this->val.'" class="layui-input author" placeholder="'.$this->place.'">';
    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function hide()
    {
        // TODO: Implement hide() method.
    }

}
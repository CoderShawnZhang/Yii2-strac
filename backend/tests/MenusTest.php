<?php

/**
 * 单元测试－－测试菜单
 */
class MenusTest extends \PHPUnit\Framework\TestCase
{
    public function testMenu(){
        $menus = 2;//\backend\extend\modules\Suggest\widgets\models\Menus::find()->count();
        $this->assertEquals(2,$menus);
    }
}
<?php
/**
 * 菜单模型
 */

namespace backend\models;


class Menus extends BaseModel
{
    public static function tableName()
    {
        return '{{%menus}}';
    }

    public function rules()
    {
        return [
            ['pid','int'],
            ['title','url','icon','string','required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'pid' => '父级id',
            'title' => '标题',
            'url' => '链接',
            'icon' => '图标'
        ];
    }
}
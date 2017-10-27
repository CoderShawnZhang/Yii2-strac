<?php

/**
 * 导航数据模型
 */
namespace backend\extend\modules\Suggest\widgets\models;
use yii\db\ActiveRecord;

class Menus extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%menus}}';
    }

    public function rules()
    {
        return [
            ['pid','int'],
            [['title','url','icon'],'required'],
        ];
    }
}
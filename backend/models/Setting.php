<?php
/**
 * 系统参数 －－ 模型
 */

namespace backend\models;

use yii\db\ActiveRecord;

class Setting extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%setting}}';
    }

    public function rules()
    {
        return [
            ['title','name','value','string','required'],
        ];
    }

    public function attributeLabels()
    {
        return [

        ];
    }

}
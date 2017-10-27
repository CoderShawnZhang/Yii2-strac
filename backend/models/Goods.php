<?php

/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/9/28
 * Time: 上午11:26
 */
namespace backend\models;

use yii\db\ActiveRecord;

class Goods extends ActiveRecord
{
    public static function tableName(){

        return '{{%goods}}';
    }

    public function rules()
    {
        return [];
    }
}
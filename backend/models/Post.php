<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/23
 * Time: 下午5:49
 */

namespace backend\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%post}}';
    }

    public function rules()
    {
        return [
          [['create','title','content'],'string']
        ];
    }

}
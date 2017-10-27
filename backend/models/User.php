<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/23
 * Time: 上午11:27
 */

namespace backend\models;


use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use \Yii;
class User extends ActiveRecord implements IdentityInterface
{

    public static function tableName(){
        return "{{%user}}";
    }

    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * 当前用户id
     */
    public function getId()
    {
        return $this->id;
    }

    //如果你的应用利用cookie登录，你只需要实现getAuthKey() 和 validateAuthKey()方法，你可以使用下面的代码在user表中生成和存储每个用户的认证密钥
    /**
     * 当前用户认证密钥
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if($this->isNewRecord){
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

    public function setPassword($password){
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

}
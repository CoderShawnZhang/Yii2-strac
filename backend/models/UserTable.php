<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/23
 * Time: 下午2:58
 */

namespace backend\models;


use yii\db\ActiveRecord;
use Yii;
class UserTable extends ActiveRecord
{

    public $username;
    public $email;
    public $password_hash;

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return [
            ['username','string'],
            ['email','email'],
            ['id','required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名'
        ];
    }

    /**
     * $idengtit = User::findOne(['username' => $username]);
     * 用户登录 Yii::$app->user->login($identity);
     * 将用户的身份信息登记到 yii\web\User;
     */
    public function login(){
        $identity = User::findOne(1);
        Yii::$app->user->login($identity);
    }

    public function signup(){
        if($this->validate()){
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password_hash);
            $user->generateAuthKey();
            $user->save(false);

            $auth = \Yii::$app->authManager;
            $authorRole = $auth->getRole('author');
            $auth->assign($authorRole,$user->getId());

            \Yii::$app->getUser()->login($user);
            return $user;
        }else{
            var_dump($this->getErrors());die;
        }
        return null;
    }
}
<?php

/**
 * 如果一个模型在前台使用，后台也适用，最好在common定义一个基类模型，前台后台分别继承。实现自己的模型处理业务数据
 */
namespace backend\models;


use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{
    const SCENARIOS_CREATE = 'create';
    const SCENARIOS_UPDATE = 'update';

    /**
     * 用来代表从html表单获取的数据
     * @var
     */
//    public $orderSn;
//    public $buyerName;
//    public $buyerMobile;
//    public $goodsId;

    public static function tableName()
    {
        return '{{%orders}}';
    }

    public function rules()
    {
        return [
            [['orderSn','buyerName','buyerMobile'], 'required','message'=>'创建数据不能为空！','on'=>'create'],
            [['buyerName','buyerMobile'],'required','message' => '创建数据不能为空！','on'=>'update'],
        ];
    }

    /**
     public function scenarios()
     {
        return [
            'login' => ['username', 'password', '!secret'],
        ];
     }
     * secret 属性只验证，不做块赋值，只可以做明确赋值：$model->secret = $secret;
     *
     * 如果指定了场景，会先到场景种来验证,
     * 如果场景 create 里指定了一个buyerName，而rules里指定了3个orderSn,buyerName,buyerMobile，则只会验证场景里的一个buyerName
     * @return array
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['update'] = ['orderSn'];
        $scenarios['create'] = ['buyerName','orderSn'];
        return $scenarios;
    }

    public function attributeLabels()
    {
        return [
          'orderId'=>\Yii::t('app','订单Id'),
          'orderSn'=>\Yii::t('app','订单编号'),
          'buyerName'=>\Yii::t('app','购买人'),
          'buyerMobile'=>\Yii::t('app','购买人电话'),
          'goodsId'=>\Yii::t('app','商品Id')
        ];
    }

    /**
     * $array = $model->toArray([], ['prettyName', 'fullAddress']);
     * 这里prettyName和fullAddress指定的字符串，是在模型里 extraFields 指定的key。（注意：extraFields 的value是回调函数）
     * @return array
     */
    public function extraFields()
    {
        return [
            'buyerName'=>function(){
                return 111;
            },
            'buyerMobile'=>function(){
                return 3333;
            },
            'goodsName' => function(){

                return Goods::find()->where(['goods_id'=>1])->one();
            }
        ];
    }

    public function fields()
    {
        return [
           'orderSn'=>function(){
            return 3333;
           }
        ];
    }

    public function getGoods()
    {
        return $this->hasOne(Goods::className(),['goods_id'=>'goodsId']);
    }

    public function getGoodsAll(){
        return $this->hasMany(Goods::className(),['goods_id'=>'goodsId']);
    }
}
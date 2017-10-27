<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/9/29
 * Time: 上午8:36
 */

namespace backend\controllers;


use backend\models\Goods;
use backend\models\Orders;
use yii\base\Controller;
use yii\data\ActiveDataProvider;

class IndexController extends Controller
{
    public $defaultAction = 'index';
    /**
     * 控制器独立动作
     * @return array
     */
    public function actions()
    {
        return [
            'hello' => 'backend\components\HelloAction'
        ];
    }
    public function actionDashboard(){
        return $this->render('dashboard');
    }
    public function actionIndex(){
//        $this->layout = false;

        return $this->render('index');
    }

    public function actionTest(){
        return $this->render('test');
    }

    /**
     * 数据库访问
     */
    public function actionDb(){
        $params = [':orderId'=>1];
        $data = \Yii::$app->db->createCommand("select * from orders where orderId=:orderId",$params)->queryOne();
        var_dump($data);

        $columens = \Yii::$app->db->createCommand("select orderId from orders")->queryColumn();
        var_dump($columens);

        $count = \Yii::$app->db->createCommand("select count(orderId) from orders")->queryScalar();
        var_dump($count);
        echo '</br>';
        echo '</br>';
        //绑定参数
        $binddata = \Yii::$app->db->createCommand("select * from orders where orderId = :orderId")->bindValue(':orderId',2)->queryOne();
        var_dump($binddata);
        echo '</br>';
        echo '</br>';
        $bindParams = [':orderId'=>4];
        $bindParamsData = \Yii::$app->db->createCommand("select * from orders where orderId = :orderId",$bindParams)->queryOne();
        var_dump($bindParamsData);

        /**
         * 绑定预处理
         */
        $commond = \Yii::$app->db->createCommand("select * from orders where orderId=:orderId");
        $post1 = $commond->bindValue(':orderId',2)->queryOne();
        $post2 = $commond->bindValue(':orderId',3)->queryOne();


        /**
         * bindParam()
         */
        $commond1 = \Yii::$app->db->createCommand("select * from orders where orderId=:orderId")->bindParam(':orderId',$orderId);
        $orderId = 1;
        $data1 = $commond1->queryOne();
        var_dump($data1);

        $orderId = 2;
        $data2 = $commond1->queryOne();
        var_dump($data2);
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo '</br>';

        $db = \Yii::$app->db;
        $trans = $db->beginTransaction();
        try {
            /**
             * INSERT UPDATE DELETE
             */
            $insertRes = \Yii::$app->db->createCommand()->insert('orders', ['orderSn' => 999888])->execute();
            var_dump($insertRes);
            echo '</br>';
            echo '</br>';
            $updateRes = \Yii::$app->db->createCommand()->update('orders', ['orderSn' => 999999], 'orderSn=999888')->execute();
            var_dump($updateRes);
            echo '</br>';
            echo '</br>';
            $deleteRes = \Yii::$app->db->createCommand()->delete('orders', ['orderSn' => 123])->execute();
            var_dump($deleteRes);
            echo '</br>';
            echo '</br>';
            $trans->commit();
        }catch (\Exception $e){
            $trans->rollBack();
            throw $e;
        }
        /**
         * 批量插入
         */
        $batchInsert = \Yii::$app->db->createCommand()->batchInsert('orders',['orderSn'],[[222],[333]])->execute();
        var_dump($batchInsert);

        /**
         * 引用表名与列名
         */
        $count = \Yii::$app->db->createCommand("select count([[orderId]]) from {{orders}}")->queryScalar();
        var_dump($count);

        /**
         * 前套事务
         */
        $db = \Yii::$app->db;
        $outTrans = $db->beginTransaction();

        try{
            $res = \Yii::$app->db->createCommand("")->execute();
            $outTrans->commit();
            $innerTrans = $db->beginTransaction();
            try{
                $res2 = \Yii::$app->db->createCommand("")->execute();
                $innerTrans->commit();
            }catch (\Exception $e){
                $innerTrans->rollBack();
                throw $e;
            }
        }catch(\Exception $e){
            $outTrans->rollBack();
            throw $e;
        }

        /**
         * 操纵数据库模式
         */
    }

    /**
     * 数据
     */
    public function actionArray(){
        $arr = [
            0 => ['id'=>1,'name'=>'yii','group'=>'group1'],
            1 => ['id'=>2,'name'=>'laravel','group'=>'group1'],
            2 => ['id'=>3,'name'=>'shawn','group'=>'group2']
        ];
        $data = \yii\helpers\ArrayHelper::getColumn($arr,function($element){
            return $element['name'].'#';
        });
//        var_dump($data);

        $data2 = \yii\helpers\ArrayHelper::map($arr,'id','name','group');
//        var_dump($data2);

        //多维数组排序
        $arr1 = [
            0=>['id'=>1,'name'=>'abei'],
            1=>['id'=>2,'name'=>'li'],
            3=>['id'=>4,'name'=>'wb'],
            4=>['id'=>3,'name'=>'world']
        ];

        \yii\helpers\ArrayHelper::multisort($arr1,['id','name'],[SORT_DESC,SORT_ASC]);
        var_dump($arr1);
    }

    /**
     * GridView
     */
    public function actionGridview(){
        $query = Orders::find();
        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
                'pagination' => [
                    'pagesize'=>10
                ],
            ]
        );
//        var_dump($dataProvider->getModels());die;
        return $this->render('gridview',['dataProvider'=>$dataProvider]);
    }

    /**
     * 查询构建器
     */
    public function actionQuery(){
        /*
        $row = (new \yii\db\Query())
            ->select('orderId as bb')
            ->from('orders')
            ->where(['orderId'=>2])
            ->limit(1)
            ->orderBy('orderId')
            ->one();
        var_dump($row);


        $goodsCount = (new \yii\db\Query())->select('count(*) as count')->from('goods');

        $orders = (new \yii\db\Query())->select(['orderId','count'=>$goodsCount])->from('orders')->addSelect('orderSn');
        $data = $orders->all();
        var_dump($data);
        */

        /**
         * 嵌套查询
         */
        /*
        $subQuery = Goods::find()->select('goods_id')->where('goods_id=:goods_id')->addParams([':goods_id'=>2]);
//        $ordersBygoodsId = (new \yii\db\Query())->from(['u'=>$subQuery])->all();                           //将subQuery作为查询来源
//        $ordersBygoodsId  = Orders::find()->where(['goodsId'=>$subQuery])->asArray()->one();     //将subQuery作为查询条件
        $ordersBygoodsId  = Orders::find()->where(['in','goodsId',$subQuery])->asArray()->one(); //将subQuery作为查询条件
        var_dump($ordersBygoodsId);
        */


        /**
         * 操作符格式
         */
        /*
        //and
        $andData = Orders::find()->where(['and','orderId=1',['or','goodsId=1','orderSn=1']])->asArray()->one();
        var_dump($andData);
        */


        /**
         * 批处理(大于100条数据就需要是用批处理)
         */
        /*
        set_time_limit(0);
        for($i=1;$i<=10000;$i++){
            \Yii::$app->db->createCommand()->insert("orders",[
                'orderSn'=>time()+$i,
                'buyerName'=>'张小二',
                'buyerMobile'=>'13899992222',
                'goodsId' => 2,
            ])->execute();
        }
        */

//        $bathData = Orders::find()->asArray();

        //        内存消耗9.63MB，耗时:520ms
        /*
        foreach($bathData->each() as $orders){
            var_dump($orders['orderId']);
        }
        */
        //        内存消耗9.63MB，耗时:528ms
        /*
        foreach($bathData->batch() as $orders){
            foreach ($orders as $k=>$v){
                var_dump($v['orderId']);
            }
        }
        */

        //        内存消耗20.90MB，耗时:720ms
        /*
        $data = Orders::find()->asArray()->all();
        foreach ($data as $k=>$v){
            var_dump($v);
        }
        */
        return $this->render('query');
    }

    /**
     * AR查询数据
     */
    public function actionAr(){
        /*
        $orders = new Orders();
//        $orders->scenarios('create');
        $orders->orderSn=888;
        $orders->goodsId=888;
        $orders->buyerName=888;
        $orders->buyerMobile=888;

        //注意：模型里定义了字段为pulic 表名只能从表单获取
        if(!$orders->save(false)){
            var_dump($orders->getErrors());
        }
        */
        $model = new Orders();
//        Orders::updateAllCounters(['goodsId'=>1]);
        //获取数据库的默认值渲染到页面
        $model->loadDefaultValues();
        return $this->render('ar',['model'=>$model]);
    }
}
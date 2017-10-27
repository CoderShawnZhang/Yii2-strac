<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/23
 * Time: 上午10:11
 */

namespace backend\controllers;


use app\rbac\AuthorRule;
use backend\models\Post;
use backend\models\User;
use backend\models\UserTable;
use yii\filters\AccessControl;
use yii\web\Controller;

class RbacController extends Controller
{

    public function behaviors(){
        return [
           'access' => [
               'class' => AccessControl::className(),
               'only' => ['login','logout','signup','special-callback'],
               'rules' => [
                   [
                       'allow' => true,
                       'actions' => ['login', 'signup'],
                       'roles' => ['?'],//访客用户
                   ],
                   [
                       'allow' => true,
                       'actions' => ['special-callback'],
                       'roles' => ['@'],//已认证用户
                       'matchCallback' => function () {
                            return date('d-m') === '24-10';
                       }
                   ],
               ],
               'denyCallback' => function(){
                    throw new \Exception('这个页面只有每年的10月31号能访问!');
               }
           ],
        ];
    }

    /**
     * 匹配函数被调用，这个页面只有每年的10月31号能访问
     *
     * @return string
     */
    public function actionSpecialCallback(){
        return $this->render('happy-halloween');
    }

    /**
     * 用户登录
     */
    public function actionLogin(){
        $user = new UserTable();
        $user->login();
        $post = new Post();
        $post->create=2;

//        AuthorRule::execute($user,);
//        if(\Yii::$app->user->can('updatePost',['post'=>$post])){
//            //建帖
//            var_dump('ok建帖');
//        }else{
//            var_dump('no建帖');
//        }
//        var_dump(\Yii::$app->user->identity->username);die;
        return $this->render('login',['uid'=>\Yii::$app->user->identity->id]);
    }

    public function actionSignup(){
        $user = new UserTable();
        if(\Yii::$app->request->isPost){
            $post = \Yii::$app->request->post();
            if($user->load($post)){
                $u = $user->signup();
                return $this->render('signupok');
            }else{
                var_dump($user->getErrors());
            }
        }

        return $this->render('signup',['model'=>$user]);
    }
}
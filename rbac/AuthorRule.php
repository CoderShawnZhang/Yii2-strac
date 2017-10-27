<?php

/**
 * 权限约束条件
 */
namespace app\rbac;

use yii\rbac\Rule;
class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    public function execute($user, $item, $params)
    {
        //检查post是否是$user创建的
        return isset($params['post']) ? $params['post']->create == $user : false;
    }
}
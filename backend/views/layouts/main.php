<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

$Asset = AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="main_body">
<?php $this->beginBody() ?>
<div class="layui-layout layui-layout-admin">
    <?= $content ?>
</div>

<!-- 移动导航 -->
<!--<div class="site-tree-mobile layui-hide"><i class="layui-icon">&#xe602;</i></div>-->
<!--<div class="site-mobile-shade"></div>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

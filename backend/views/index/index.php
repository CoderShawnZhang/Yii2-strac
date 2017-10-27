<?php
$this->title = '后台首页';
?>
<div class="layui-layout layui-layout-admin">
    <!-- 顶部 -->
    <?= $this->render('header.php'); ?>
    <!-- 左侧导航 -->
    <div class="layui-side layui-bg-black">
        <?= \backend\extend\modules\Suggest\widgets\NavWidget::widget(); ?>
    </div>
    <!-- 右侧内容 -->
    <?= $this->render('content.php');?>
    <!-- 底部 -->
    <?= $this->render('footer.php');?>
</div>

<!-- 移动导航 -->
<!--<div class="site-tree-mobile layui-hide"><i class="layui-icon">&#xe602;</i></div>-->
<!--<div class="site-mobile-shade"></div>-->
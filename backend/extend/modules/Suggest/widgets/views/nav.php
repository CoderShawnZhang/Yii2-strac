<?php
$NavAsset = \backend\extend\modules\Suggest\widgets\Navasset::register($this);//注册导航小部件js
Yii::setAlias('@faceImg',$NavAsset->baseUrl.'/images/face.jpg');
?>
<div class="user-photo">
    <a class="img" title="我的头像" ><img src="<?php echo $NavAsset->baseUrl.'/images/face.jpg' ?>"></a>
    <p>你好！<span class="userName">管理员</span>, 欢迎登录</p>
</div>
<div class="navBar layui-side-scroll" style="height:auto;">
    <ul class="layui-nav layui-nav-tree">
        <?php echo $menu;?>
        <span class="layui-nav-bar" style="top: 22.5px; height: 0px; opacity: 0;"></span>
    </ul>
</div>
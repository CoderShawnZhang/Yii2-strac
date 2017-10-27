<div class="layui-header header">
    <div class="layui-main">
        <a href="#" class="logo">Yii2.0后台管理</a>
        <!-- 显示/隐藏菜单 -->
        <a href="javascript:;" class="iconfont hideMenu icon-menu1"></a>
        <!-- 搜索 -->
        <div class="layui-form component">
            <select name="modules" lay-verify="required" lay-search="">
                <option value="">直接选择或搜索选择</option>
                <option value="1">layer</option>
                <option value="2">form</option>
                <option value="3">layim</option>
                <option value="4">element</option>
                <option value="5">laytpl</option>
                <option value="6">upload</option>
                <option value="7">laydate</option>
                <option value="8">laypage</option>
                <option value="9">flow</option>
                <option value="10">util</option>
                <option value="11">code</option>
                <option value="12">tree</option>
                <option value="13">layedit</option>
                <option value="14">nav</option>
                <option value="15">tab</option>
                <option value="16">table</option>
                <option value="17">select</option>
                <option value="18">checkbox</option>
                <option value="19">switch</option>
                <option value="20">radio</option>
            </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="直接选择或搜索选择" value="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="1" class="">layer</dd><dd lay-value="2" class="">form</dd><dd lay-value="3" class="">layim</dd><dd lay-value="4" class="">element</dd><dd lay-value="5" class="">laytpl</dd><dd lay-value="6" class="">upload</dd><dd lay-value="7" class="">laydate</dd><dd lay-value="8" class="">laypage</dd><dd lay-value="9" class="">flow</dd><dd lay-value="10" class="">util</dd><dd lay-value="11" class="">code</dd><dd lay-value="12" class="">tree</dd><dd lay-value="13" class="">layedit</dd><dd lay-value="14" class="">nav</dd><dd lay-value="15" class="">tab</dd><dd lay-value="16" class="">table</dd><dd lay-value="17" class="">select</dd><dd lay-value="18" class="">checkbox</dd><dd lay-value="19" class="">switch</dd><dd lay-value="20" class="">radio</dd></dl></div>
            <i class="layui-icon"></i>
        </div>
        <!-- 天气信息 -->
        <div class="weather" pc>
            <div id="tp-weather-widget"></div>
            <?= \backend\extend\modules\Weather\widgets\WeatherWidget::widget() ?>
        </div>
        <!-- 顶部右侧菜单 -->
        <ul class="layui-nav top_menu">
            <li class="layui-nav-item showNotice" id="showNotice" pc>
                <a href="javascript:;"><i class="iconfont icon-gonggao"></i><cite>系统公告</cite></a>
            </li>
            <li class="layui-nav-item" mobile>
                <a href="javascript:;" class="mobileAddTab" data-url="page/user/changePwd.html"><i class="iconfont icon-shezhi1" data-icon="icon-shezhi1"></i><cite>设置</cite></a>
            </li>
            <li class="layui-nav-item" mobile>
                <a href="page/login/login.html" class="signOut"><i class="iconfont icon-loginout"></i> 退出</a>
            </li>
            <li class="layui-nav-item lockcms" pc>
                <a href="javascript:;"><i class="iconfont icon-lock1"></i><cite>锁屏</cite></a>
            </li>
            <li class="layui-nav-item" pc>
                <a href="javascript:;">
                    <img src="" class="layui-circle" width="35" height="35">
                    <cite>管理员</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" data-url="page/user/userInfo.html"><i class="iconfont icon-zhanghu" data-icon="icon-zhanghu"></i><cite>个人资料</cite></a></dd>
                    <dd><a href="javascript:;" data-url="page/user/changePwd.html"><i class="iconfont icon-shezhi1" data-icon="icon-shezhi1"></i><cite>修改密码</cite></a></dd>
                    <dd><a href="javascript:;" class="changeSkin"><i class="iconfont icon-huanfu"></i><cite>更换皮肤</cite></a></dd>
                    <dd><a href="page/login/login.html" class="signOut"><i class="iconfont icon-loginout"></i><cite>退出</cite></a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>
<!-- 左侧导航 -->
<div class="layui-side layui-bg-black">
    <?= \backend\extend\modules\Suggest\widgets\NavWidget::widget(); ?>
</div>
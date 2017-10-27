<form class="layui-form">
    <table class="layui-table">
        <colgroup>
            <col width="20%">
            <col width="50%">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>参数说明</th>
            <th>参数值</th>
            <th>变量名</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>模版名称</td>
            <td><input type="text" class="layui-input cmsName" lay-verify="required" placeholder="请输入模版名称"></td>
            <td>cmsName</td>
        </tr>
        <tr>
            <td>当前版本</td>
            <td><input type="text" class="layui-input version" placeholder="请输入当前模版版本"></td>
            <td>version</td>
        </tr>
        <tr>
            <td>开发作者</td>
            <td><input type="text" class="layui-input author" placeholder="请输入开发作者"></td>
            <td>author</td>
        </tr>
        <tr>
            <td>网站首页</td>
            <td><input type="text" class="layui-input homePage" placeholder="请输入网站首页"></td>
            <td>homePage</td>
        </tr>
        <tr>
            <td>服务器环境</td>
            <td><input type="text" class="layui-input server" placeholder="请输入服务器环境"></td>
            <td>server</td>
        </tr>
        <tr>
            <td>数据库版本</td>
            <td><input type="text" class="layui-input dataBase" placeholder="请输入数据库版本"></td>
            <td>dataBase</td>
        </tr>
        <tr>
            <td>最大上传限制</td>
            <td><input type="text" class="layui-input maxUpload" placeholder="请输入最大上传限制"></td>
            <td>maxUpload</td>
        </tr>
        <tr>
            <td>用户权限</td>
            <td><input type="text" class="layui-input userRights" placeholder="请输入当前用户权限"></td>
            <td>userRights</td>
        </tr>
        <tr>
            <td>默认关键字</td>
            <td><input type="text" class="layui-input keywords" placeholder="请输入默认关键字"></td>
            <td>keywords</td>
        </tr>
        <tr>
            <td>版权信息</td>
            <td><input type="text" class="layui-input powerby" placeholder="请输入网站版权信息"></td>
            <td>powerby</td>
        </tr>
        <tr>
            <td>网站描述</td>
            <td><textarea placeholder="请输入网站描述" class="layui-textarea description"></textarea></td>
            <td>description</td>
        </tr>
        <tr>
            <td>网站备案号</td>
            <td><input type="text" class="layui-input record" placeholder="请输入网站备案号"></td>
            <td>record</td>
        </tr>
        </tbody>
    </table>
    <div class="layui-form-item" style="text-align: right;">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="systemParameter">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
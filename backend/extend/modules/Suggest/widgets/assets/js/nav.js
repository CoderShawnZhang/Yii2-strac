function iframload(iframe,url,obj) {
    iframe.attr('src',url);
    navBar.tabAdd(obj);
}
$(function(){
    navBar.event('.navBar ul li','dl','layui-this','layui-nav-itemed');
    // navBar.postAjax();
});
var navBar = {
    eventName:'click',
    event:function(ele,chilele,itemclass,childClass){
        var that = $(ele);
        that.bind(navBar.eventName,function(){
            var that = $(this);
            var aObj = that.children('a');

            navBar.createIframe(aObj);

            var styleC = '';
            if(that.find(chilele).length > 0){
                styleC = childClass;
                that.find(chilele).children('dd').unbind('click').bind('click',function () {
                    // console.log(that);
                    $(ele).removeClass(itemclass);//移除父级选中样式
                    $(this).addClass(itemclass).siblings().removeClass(itemclass);//添加子级选中样式
                })
            }else{
                styleC = itemclass;
            }
            that.addClass(styleC).siblings().removeClass(styleC);

        });
    },
    createIframe:function(obj){
        var url = obj.attr('data-url');
        var iframe = $('.clildFrame').find('iframe');
        //****************************************************
        //***                                               ***
        //***  注意这里是iframe的一个坑                        ***
        //***  iframe 一定要在 onload完之后 才能给src赋值url    ***
        //***  iframe.attr('src',url);                      ***
        //***                                               ***
        //*****************************************************
        iframload(iframe,url,obj);
        var topWindow = $(window.parent.document);
        // var iframe_boax = topWindow.find('#iframe_box');
        // var cur_show_ifram = topWindow.find('.layui-show');//获取当前选项卡
        // cur_show_ifram.removeClass('layui-show');
        // iframe_boax.append('<div class="layui-tab-item layui-show"><iframe frameborder="0" src='+url+'></iframe></div>')
    },
    tabAdd:function(_this){
        var title = _this.find('cite').text();
        var layId = navBar.hasTab(title);
        if(layId != 0){
            layId.addClass('layui-this').siblings().removeClass('layui-this');
        }else {
            var icon = _this.find('i').attr('class');
            $('.layui-tab-title.top_tab li').removeClass('layui-this');
            var randomId = Math.round(new Date().getTime() / 1000) + Math.random();
            $('.layui-tab-title.top_tab').append('<li class="layui-this" lay-id="' + randomId + '"><i class="' + icon + '"></i> <cite>' + title + '</cite><i class="layui-icon layui-unselect layui-tab-close" data-id="2">ဆ</i></li>');
        }
    },
    hasTab:function (title) {
        layId=0;
        $('.layui-tab-title.top_tab li').each(function(){
            if($(this).find('cite').text() == title){
                layId = $(this);
            }
        });
        return layId;
    },
    closeTab:function(){

    }
}


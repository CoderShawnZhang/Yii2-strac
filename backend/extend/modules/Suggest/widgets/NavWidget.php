<?php

/**
 * 留言板导航小部件
 */
namespace backend\extend\modules\Suggest\widgets;
use backend\extend\modules\Suggest\widgets\models\Menus;
use yii\base\Widget;
use yii\helpers\Url;

class NavWidget extends Widget
{
    public function run()
    {
        $menu = Menus::find()->asArray()->all();
        $TreeMenu = $this->createMenuTree($menu);
        $TreeHtml = $this->createMenuHtml($TreeMenu);
        return $this->render('nav',['menu'=>$TreeHtml]);
    }


    //非递归实现
    public function createMenuTree1 ($data, $pid = 0, $level = 0, $html = '-'){
        //第一步，将分类id作为数组key,并创建children单元
        foreach($data as $category){
            $tree[$category['id']] = $category;
            $tree[$category['id']]['children'] = array();
        }
        //第二步，利用引用，将每个分类添加到父类children数组中，这样一次遍历即可形成树形结构。
        foreach($tree as $key=>$item){
            if($item['pid'] != 0){
                $tree[$item['pid']]['children'][] = &$tree[$key];//注意：此处必须传引用否则结果不对
                if($tree[$key]['children'] == null){
                    unset($tree[$key]['children']); //如果children为空，则删除该children元素（可选）
                }
            }
        }
        ////第三步，删除无用的非根节点数据
        foreach($tree as $key=>$category){
            if($category['pid'] != 0){
                unset($tree[$key]);
            }
        }
        return $tree;
    }

    /**
     * 递归实现
     */
    public function createMenuTree ($data, $pid = 0, $level = 0, $html = '-'){
        $tree = array();                                //每次都声明一个新数组用来放子元素
        foreach($data as $v){
            if($v['pid'] == $pid){                      //匹配子记录
                $v['children'] = $this->createMenuTree($data,$v['id']); //递归获取子记录
                if($v['children'] == null){
                    unset($v['children']);             //如果子元素为空则unset()进行删除，说明已经到该分支的最后一个元素了（可选）
                }
                $tree[] = $v;                           //将记录存入新数组
            }
        }
        return $tree;
    }

    /**
     * 生成左侧导航
     *
     * @param $menu
     * @return string
     */
    public function createMenuHtml($menu){
        $sidebar = '';
        foreach($menu as $m){
            $root = Url::toRoute($m['url']);
            $sidebar .='<li class="layui-nav-item">';
            if(!isset($m['children'])){
                $sidebar .=
                    '<a href="javascript:;" data-url="'.$root.'">';
                if(strpos($m['icon'],'&') !== false){
                    $sidebar .='<i class="layui-icon" data-icon="'. $m['icon'].'">'. $m['icon'].'</i>';
                }else{
                    $sidebar .='<i class="iconfont '. $m['icon'].'" data-icon="icon-computer"></i>';
                }
                $sidebar .='<cite>'. $m['title'].'</cite>'.
                    '</a>'.
                '</li>';
            }else{
                $sidebar .= '<a href="javascript:;">';
                            if(strpos($m['icon'],'&') !== false){
                                $sidebar .='<i class="layui-icon" data-icon="'. $m['icon'].'">'. $m['icon'].'</i>';
                            }else{
                                $sidebar .='<i class="iconfont '. $m['icon'].'" data-icon="icon-computer"></i>';
                            }
                $sidebar .='<cite>'. $m['title'].'</cite>'.
                        '<span class="layui-nav-more"></span>'.
                    '</a><dl class="layui-nav-child">';
                          foreach($m['children'] as $c){
                              $sidebar .=
                                  '<dd>'.
                                  '<a href="javascript:;" data-url="'.$root.'">'.
                                  '<i class="layui-icon" data-icon="'. $c['icon'].'">'. $c['icon'].'</i>'.
                                  '<cite>'. $c['title'].'</cite>'.
                                  '</a>'.
                                  '</dd>';
                          }
            }
            $sidebar .='</dl></li>';
        }
        return $sidebar;
    }
}
<?php
/*
 * @name: wjl
 * @Date: 2021-01-19 10:43:00
 * @LastEditTime: 2021-01-19 20:17:25
 */
declare (strict_types = 1);

namespace app\model;

use think\Model;
use addon\std\Tree;
/**
 * @mixin \think\Model
 * 商品分类
 */
class GoodsTypeModel extends Model
{
    protected $name = 'goods_type';

    /**
     * @description: 获取商品分类，返回数组，包含分类依附关系
     * @param {*}
     * @return {*}
     */    
    public function goods_type(){
        $tree = new Tree();
        $type = $this->select();
        $type = json_decode(json_encode($type),true);//将类转换为数组
        $tree->init($type,'id','ahead');
        return $tree->tree;
        
    }  

}

<?php
/*
 * @name: wjl
 * @Date: 2021-01-17 15:32:27
 * @LastEditTime: 2021-01-18 13:36:46
 */
declare (strict_types = 1);

namespace app\common\controller;


use app\model\GoodsModel;
use think\Facade\Db;

class Goods 
{
    /**
     * 获取商品分类
     */
    public function get_goods_type(){
        return Db::name('goods_type')->select();
    }
    /**
     * 获取推荐商品
     */
    public function get_suggest_goods($user_id,$page=1){
        $goodsmodel = new GoodsModel();
    
        return $goodsmodel->suggest_goods($user_id,$page);   
    }
}

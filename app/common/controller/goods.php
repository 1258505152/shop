<?php
/*
 * @name: wjl
 * @Date: 2021-01-17 15:32:27
 * @LastEditTime: 2021-01-19 20:13:45
 */
declare (strict_types = 1);

namespace app\common\controller;

use app\model\GoodsTypeModel;
use app\model\GoodsModel;
use think\Facade\Db;

class Goods 
{
    /**
     * 获取商品分类
     */
    public function get_goods_type(){
        $goods_type_model = new GoodsTypeModel();
        return $goods_type_model->goods_type();
    }
    
    /**
     * 获取推荐商品
     */
    public function get_suggest_goods($user_id,$page=1){
        $goodsmodel = new GoodsModel();
    
        return $goodsmodel->suggest_goods($user_id,$page);   
    }
}

<?php
/*
 * @name: wjl
 * @Date: 2021-01-17 16:16:30
 * @LastEditTime: 2021-01-18 13:31:18
 */

namespace app\model;
use think\Model;

/**
 * 商品模型
 */
class GoodsModel extends Model
{
    protected $name = 'goods';

    public function suggest_goods($user_id,$page=1){
         //以后通过算法进行筛选
         return $this->order('time dec')->page($page,10)->select();
    }
}
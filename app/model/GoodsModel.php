<?php
/*
 * @name: wjl
 * @Date: 2021-01-17 16:16:30
 * @LastEditTime: 2021-01-19 14:30:47
 */

namespace app\model;
use think\Model;

/**
 * 商品模型
 */
class GoodsModel extends Model
{
    protected $name = 'goods';

    /**
     * @description: 
     * @param mixed  $user_id 商品Id
     * @param mixed  $page    分页页面
     * @return mixed   返回数组，包含商品列表
     */    
    public function suggest_goods($user_id,$page=1){
         //以后通过算法进行筛选
         return $this->order('time dec')->page($page,10)->select();
    }
}
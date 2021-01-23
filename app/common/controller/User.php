<?php
/*
 * @name: wjl
 * @Date: 2021-01-18 09:59:04
 * @LastEditTime: 2021-01-23 20:40:02
 */
declare (strict_types = 1);

namespace app\common\controller;

use think\Request;
use think\facade\Request as StaticRequest;
use think\Facade\Db;
class User
{
    private static $user;
    /**
     * token验证操作产看是否存在，并返回用户信息
     * 如果不存在返回失败
     */
    private static function token_check(){
        if(StaticRequest::param('token')){
            return cache(StaticRequest::param('token'));
        }
        return false;
       
    }
    /**
     * 登录检验功能  
     */
    public static function login_check(){
        self::$user = self::token_check();
        if(self::$user){
            return json_decode(self::$user,true);
        }else{
            return false;
        }
    }

    /**
     * 添加购物车
     * @description: 添加购物车
     * @param int $goods_id 商品id
     * @param int $specifications_id 商品参数id
     * @param int $cont 数量
     * @return  bool
     */    
    public function add_shop_cart($user_id,$goods_id,$specifications_id,$cont=1){
        $goods = Db::name('goods')->where('id',$goods_id)->find();
        $specifications =$goods['specifications'];
        $specifications = json_decode($specifications,true);
        $name='';

        foreach ($specifications['goods'][$specifications_id]['specifications'] as $key => $value) {
            $name=$name.' '.$value;
        }
       
        $price = $specifications['goods'][$specifications_id]['price'];
        
        $data=array(
            'user_id'=> $user_id,
            'goods_id'=>$goods_id,
            'goods_name'=>$goods['name'].$name,
            'goods_specifications_id'=>$specifications_id,
            'price'=>$price,
            'cont'=>$cont,
        );
        Db::name('shop_cart')->INSERT($data);
        return true;
    }

    /**
     * 获取购物车应用
     */
    public function get_shop_cart($user_id){
        if(empty($user_id))
            return false;
        $data=Db::name('shop_cart')->where('user_id',$user_id)->select()->toArray();
       
        return $data;
    }
   
    /**
     * 添加用户
     */
    public function add_user($data){
        return true;
    }

    /**
     * 添加用户浏览内容
     */
    public function add_user_browse($user_id,$goods_type,$price){

        return true;
    }
}

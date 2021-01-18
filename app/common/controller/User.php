<?php
/*
 * @name: wjl
 * @Date: 2021-01-18 09:59:04
 * @LastEditTime: 2021-01-18 12:34:48
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
     * 获取购物车应用
     */
    public function get_shop_cart($user_id){
        if(empty($user_id))
            return false;
        $data=array(
            'shop_cart'=>[['id'=>'1','name'=>'name','price'=>'price','type'=>'type','standard'=>'{\"\"}']],
        );
        return $data;
    }
    /**
     * 添加购物车
     */
    public function add_shop_cart(){

        return true;
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

<?php
/*
 * @name: wjl
 * @Date: 2021-01-23 20:13:40
 * @LastEditTime: 2021-01-23 21:48:55
 */
declare (strict_types = 1);

namespace app\common\controller;

use think\Request;
use think\Facade\Db;

/**
 * @description: 地址操作
 * @param {*}
 * @return {*}
 */
class Address
{

 /**
  * @description: 获取地址
  * @param int $user_id 用户id
  * @return array
  */ 
 public function get_address($user_id){
    $address = Db::name('address')->where('user_id',$user_id)->order('default desc')->select()->toArray();
    return $address;
 }
 /**
  * @description: 添加地址
  * @param array $data 地址数据
  * @return array
  */ 
 public function add_address($data){
     if(empty(Db::name('address')->where('user_id',$data['user_id'])->find())){
        $data['default']=1;
     }
     if(!empty(Db::name('address')->where('address',$data['address'])->find())){
         return "存在相同地址系统忽略";
     }
     $value = Db::name('address')->INSERT($data);
     return $value;

 }
 /**
  * @description: 编辑地址
  * @param int $address_id 地址id
  * @param array $data 编辑数据
  * @return bool
  */ 
 public function edit_address($data){
    $value = Db::name('address')->update($data);
    return $value;

 }
 /**
  * @description: 删除地址
  * @param int $user_id 用户id
  * @param int $address_id 地址id
  * @return bool
  */ 
 public function delete_address($user_id,$address_id){
    $value = Db::name('address')->where('id',$address_id)->where('user_id',$user_id)->delete();
    return $value;
 }


}

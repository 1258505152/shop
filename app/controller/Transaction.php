<?php
/*
 * @name: wjl
 * @Date: 2021-01-23 20:41:45
 * @LastEditTime: 2021-01-23 21:50:58
 */
declare (strict_types = 1);

namespace app\controller;

use app\common\controller\Goods;
use app\common\controller\User;
use app\common\controller\Address;
use app\BaseController;
use think\facade\Request;

/**
 * @description: 交易功能
 * @param {*}
 * @return {*}
 */
class Transaction extends BaseController
{
    /**
     * 构造函数，判断是否登录
     * */
    public $user;
    public function __construct(){
        $this->user=User::login_check();
        

    }
    /**
     * @description: 获取地址
     * @param {*}
     * @return {*}
     */    
    public function get_address(){
        $address =new Address();
        $value = $address->get_address($this->user['id']);
        return $this->success('ok',200,$value);
        
    }
    /**
     * @description: 增加地址
     * @param {*}
     * @return {*}
     */    
    public function add_address(){
        if(empty($this->user)){
            return $this->error('请重新登录',400,null,'login');
        }
        $address =new Address();
        if(empty(Request::has('address'))){
            return $this->error('请求数据错误');
        }
        $data = Request::param('address');
        $data['user_id'] = $this->user['id'];
        $value = $address->add_address($data);
        return $this->success('ok',200,$value);
    }
    /**
     * @description: 编辑地址
     * @param {*}
     * @return {*}
     */    
    public function edit_address(){
        if(empty($this->user)){
            return $this->error('请重新登录',400,null,'login');
        }
        $address =new Address();
        if(empty(Request::has('address'))){
            return $this->error('请求数据错误');
        }
        $data = Request::param('address');
        $value = $address->edit_address($data);
        return $this->success('ok',200,$value);
        
    }
    public function delete_address(){
        if(empty($this->user)){
            return $this->error('请重新登录',400,null,'login');
        }
        $address =new Address();
        if(empty(Request::has('address'))){
            return $this->error('请求数据错误');
        }
        $data = Request::param('address');
        $value = $address->delete_address($this->user['id'],$data['id']);
        return $this->success('ok',200,$value);
    }
}

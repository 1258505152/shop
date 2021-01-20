<?php
/*
 * @name: wjl
 * @Date: 2021-01-20 11:01:16
 * @LastEditTime: 2021-01-20 20:42:30
 */
namespace app\controller;


use app\BaseController;
use app\common\controller\Goods;
use app\common\controller\User;
use think\facade\Request;

class GoodsContent extends BaseController 
{
    /**
     * 构造函数，判断是否登录
     * */
    public $user;
    public function __construct(){
        $this->user=User::login_check();

    }
   
    public function index(){
        $goods = new Goods();
        if(!Request::has('goods_id'))
            return $this->error();
        $goods_id = Request::has('goods_id');
        $data=array(
            'goods'=>$goods->get_goods_content($goods_id),
            'user' =>$this->user,
        );
        return $this->success('ok',200,$data);
    }

    /**
     * @description: 添加购物车
     * @param int
     * @return bool
     */    
    public function add_shop_cart(){
        if(empty($this->user)){
            return $this->error('请重新登录',400,null,'login');
        }
        $user = new User();
        if(!Request::has('cart')){
            return $this->error('未获取信息');
        }
        $cart =Request::param('cart');
    
        if($user->add_shop_cart($this->user['id'],$cart['goods_id'],$cart['specifications_id'],$cart['cont'])){
            return $this->success();
        }
        return $this->error();
    }
    
}

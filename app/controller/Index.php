<?php
/*
 * @name: wjl
 * @Date: 2021-01-17 21:04:13
 * @LastEditTime: 2021-01-20 20:47:48
 */
namespace app\controller;

use app\BaseController;
use app\common\controller\Goods;
use app\common\controller\User;
use think\facade\Request;

class Index extends BaseController
{
    /**
     * 构造函数，判断是否登录
     * */
    public $user;
    public function __construct(){
        $this->user=User::login_check();

    }
    /**
     * 主页信息获取
     */
    public function index()
    { 
        $user = new User();
        $goods = new Goods();
        $data=array(
            'user'=>$this->user,
            'shop_cart'=> $user->get_shop_cart(!empty($this->user) ? $this->user['id']:false),
            'goods_type'=> $goods->get_goods_type(),
            'suggest_goods'=> $goods->get_suggest_goods(!empty($this->user) ? $this->user['id']:false),
        );
        
        return $this->success('ok',200,$data);
    }
    /**
     * 再次获取推荐产品
     */
    public function get_suggest_goods(){
        
        $goods = new Goods();
        return $this->success('ok',200,$goods->get_suggest_goods(empty($this->user) ? $this->user['id']:false ,Request::param('page')));
    }
    
    
    
    
    
}

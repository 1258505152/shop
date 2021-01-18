<?php
/*
 * @name: wjl
 * @Date: 2021-01-15 00:52:45
 * @LastEditTime: 2021-01-18 11:37:29
 */
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use app\BaseController;
use think\Facade\Db;

class Login extends BaseController
{
 
    /**
     * 登录验证
     *
     * @return \think\Response
     */
    public function index()
    {
        
        return $this->success('ok',200,$this->login_check());
    }
    /**
     * 登录功能
     */
    public function login(){
        
        if($this->request->param('login')){//检查post请求
           
            $res = $this->request->param('login'); 
         
            $user = Db::name('user')->where('name',$res['name'])->where('psw',$res['psw'])->find();
            if(!empty($user)){
              
                $token = md5(time().$user['name']);
                cache($token, json_encode($user,JSON_UNESCAPED_UNICODE));
                setcookie('token',$token);
                $data = [
                    'code'=>'200',
                    'msg'=>'登录成功',
                    'data'=>array('token'=>$token,'user'=>$user),
                     ];

            }
           
        return json($data);//返回数据
        }
        return json(['code'=>'200','msg'=>'请登录']);
        
    }
    /**
     * 注册功能
     */
    public function register(){
        
    }

   
}

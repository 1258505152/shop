<?php
/*
 * @name: wjl
 * @Date: 2021-01-15 00:52:45
 * @LastEditTime: 2021-01-17 15:30:28
 */
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use app\BaseController;

class Login extends BaseController
{
 
    /**
     * 登录验证
     *
     * @return \think\Response
     */
    public function index()
    {
        return json($this->login_check());
    }
    /**
     * 登录功能
     */
    public function login(){
        if($this->request->post('login')){//检查post请求

           $data = [
            'code'=>'200',
            'msg'=>'登录成功',
            'data'=>array('token'=>'1eeee','post'=>$this->request->post('login')),
             ];
        return json($data);//返回数据
        }
        return json(['code'=>'200','msg'=>'请登录']);
        
    }

   
}

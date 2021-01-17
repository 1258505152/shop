<?php
/*
 * @name: wjl
 * @Date: 2021-01-14 22:58:56
 * @LastEditTime: 2021-01-15 00:48:02
 */
namespace app\controller;

use app\BaseController;

class Index extends BaseController
{
    public function index()
    {

        $data = [
            'code'=>'200',
            'msg'=>'成功',
            'data'=>array('1'=>'1','2'=>'2'),
        ];
        return json($data);
    }

    
    
}

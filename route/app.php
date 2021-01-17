<?php
/*
 * @name: wjl
 * @Date: 2021-01-14 22:58:56
 * @LastEditTime: 2021-01-15 00:33:32
 */
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::resource('blog', 'Blog');
Route::resource('blogn', '\app\index\controller\Blog');
//Route::get('hello/:name', 'index/hello');

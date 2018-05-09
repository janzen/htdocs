<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hemiao', function () {
	return view('hemiao');
});

//注册页面
Route::get('/register','HeMiaoAdmin\RegisterController@index');
//注册
Route::post('/register','HeMiaoAdmin\RegisterController@register');
//登陆页面
Route::get('/login','HeMiaoAdmin\LoginController@index');
//登陆
Route::post('/login','HeMiaoAdmin\LoginController@login');
//退出
Route::get('/logout','HeMiaoAdmin\LoginController@logout');
//个人信息页面
Route::get('/user','HeMiaoAdmin\UserController@index');
//个人信息页面编辑
Route::get('/user/setting','HeMiaoAdmin\UserController@setting');

//首页
Route::get('/home','HeMiaoAdmin\HomeController@index');


//订单
Route::get('/order/contractorder','HeMiaoAdmin\OrderController@index');
Route::get('/order/contractorder/info/{order_id}','HeMiaoAdmin\OrderController@info');
Route::post('/order/contractorder/upd','HeMiaoAdmin\OrderController@upd');
Route::get('/order/contractorder/del/{order_id}','HeMiaoAdmin\OrderController@del');

Route::post('/order/contractorder/ins','HeMiaoAdmin\OrderController@ins');

Route::get('/order/contractorder/ins/show','HeMiaoAdmin\OrderController@showins');



Route::get('/order/firststage','HeMiaoAdmin\OrderController@firststage');
Route::get('/order/secondstate','HeMiaoAdmin\OrderController@secondstate');
Route::get('/order/thirdstate','HeMiaoAdmin\OrderController@thirdstate');

Route::post('/order/updstage','HeMiaoAdmin\OrderController@updstage');




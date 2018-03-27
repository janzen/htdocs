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
Route::get('/register','hemiaoadmin\RegisterController@index');
//注册
Route::post('/register','hemiaoadmin\RegisterController@register');
//登陆页面
Route::get('/login','hemiaoadmin\LoginController@index');
//登陆
Route::post('/login','hemiaoadmin\LoginController@login');
//退出
Route::get('/logout','hemiaoadmin\LoginController@logout');
//个人信息页面
Route::get('/user','hemiaoadmin\UserController@index');
//个人信息页面编辑
Route::get('/user/setting','hemiaoadmin\UserController@setting');

//首页
Route::get('/home','hemiaoadmin\HomeController@index');

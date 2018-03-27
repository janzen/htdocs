<?php

namespace App\Http\Controllers\hemiaoadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

class LoginController extends Controller
{
    public function index(){
    	return view('hemiaoadmin.login');
    }

    public function login(Request $request){

    	$username = $request->input('username');
		$password = $request->input('password');

    	$userModel = new User();
    	$res = $userModel->checkUser($username,$password);
    	if($res){
    		session(['username',$username]);
    		session(['password',$password]);
    		return redirect("/home");
    	}
    	return \Redirect::back()->withInput()->with('msg',"用户名密码错误");
    }

    public function logout(){

    }
}

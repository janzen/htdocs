<?php

namespace App\Http\Controllers\hemiaoadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

class LoginController extends Controller
{
    public function index(Request $request){
        if(session('userinfo')){
            return redirect("/home");
        }
    	return view('hemiaoadmin.login');
    }

    public function login(Request $request){

    	$username = $request->input('username');
		$password = $request->input('password');

    	$userModel = new User();
    	$res = $userModel->checkUser($username,$password);
    	if($res){
            $userinfo = array('username'=>$username,'password'=>$password);
    		session(['userinfo'=>$userinfo]);
    		return redirect("/home");
    	}
    	return \Redirect::back()->withInput()->with('msg',"用户名密码错误");
    }

    public function logout(Request $request){
        $request->session()->forget('userinfo');
        return redirect("/login");
    }
}

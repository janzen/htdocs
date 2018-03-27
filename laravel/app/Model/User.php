<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    // public $table= 'user';
    // public $primarykey ='id';
    //updated_at created_at

    public function checkUser($username,$password){
    	$res = User::where('user_name','=',$username)->first();
    	if($res){
    		//验证密码
    		if(\Hash::check($password,$res->password)){
    			return true;
    		}
    		return false;
    	}
    	return false;
    }
}

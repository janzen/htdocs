<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	
	/**
		显示
	*/
    public function show(){
    	\Cookie::queue('sdfsdf',"adfd",20);
		return 'file';
    }

    /**
		用户更改
    */
	public function edit($id){
		return $id;
	}

	public function delete(){
		echo route('udelete','i');
		echo "删除";
		return view('');
	}
}

<?php

namespace App\Http\Controllers\HeMiaoAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
    	$banner = array('/home'=>'禾描');

    	return view ('hemiaoadmin.home',array('banner'=>$banner));
    }
}

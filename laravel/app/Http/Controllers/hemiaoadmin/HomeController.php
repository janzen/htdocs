<?php

namespace App\Http\Controllers\hemiaoadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

    	return view ('hemiaoadmin.home');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getAll(){
    	$res = Order::orderBy('updated_at','desc')->get();
    	if($res)
    		return $res;
    	return null;
    }
}

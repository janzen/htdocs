<?php

namespace App\Http\Controllers\HeMiaoAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;

class OrderController extends Controller
{
	protected $request;
    protected $order;

	public function __construct(Request $request){
        $this->request = $request;
        $this->order = new Order();
    }

    /*签订了合同的订单*/
	public function index(){
		$res = $this->order->getAll();
		return view('hemiaoadmin.ordershow',array('res'=>$res));
	}

	/*插入*/
	public function ins(){

	}

	/*修改*/
	public function upd(){

	}

	/*删除*/
	public function del(){

	}

}

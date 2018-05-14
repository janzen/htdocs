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
		$banner = array('/home'=>'禾描','/order/contractorder'=>'签订合同');
		return view('hemiaoadmin.ordershow',array('res'=>$res,'banner'=>$banner));
	}

	/*订单详情*/
	public function info(Request $request){
		$orderId = $request->order_id;
		$res = $this->order->getInfo($orderId);
		$orderInfo = $res[0];
		$orderStateInfo = $res[1];
		$orderTimeInfo = $res[2];
		$banner = array('/home'=>'禾描','/order/contractorder'=>'签订合同','/order/contractorder/info/'.$orderId =>'当前订单');
		return view('hemiaoadmin.orderinfo',array('orderInfo'=>$orderInfo,'orderStateInfo'=>$orderStateInfo,'orderTimeInfo'=>$orderTimeInfo,'banner'=>$banner));
	}

	/*插入页面展示*/
	public function showins(){

		$banner = array('/home'=>'禾描','/order/contractorder/ins/show'=>'添加合同');
		return view('hemiaoadmin.ordershowins',array('banner'=>$banner));
	}

	/*插入*/
	public function ins(Request $request){
		$res = $this->order->saveOrder($request);
		if($res) return redirect("/order/contractorder");
	}

	/*第一阶段*/
	public function firststage(){
		$res = array();
		$res = $this->order->showFirstStage();
		$orderInfo = $res[0];
		$orderStateArr = $res[1];
		$orderTimeArr = $res[2];
		$arrayRangeWarning = $res[3];
		$arrayRangeDanger = $res[4];
		$banner = array('/home'=>'禾描','/order/firststage'=>'第一阶段');
		return view('hemiaoadmin.orderfirststage',array('orderInfo'=>$orderInfo,'orderStateArr'=>$orderStateArr,'orderTimeArr'=>$orderTimeArr,'arrayRangeWarning'=>$arrayRangeWarning,'arrayRangeDanger'=>$arrayRangeDanger,'banner'=>$banner));
	}

	/*第二阶段*/
	public function secondstate(){
		$res = array();
		$res = $this->order->showSecondStage();
		$orderInfo = $res[0];
		$orderStateArr = $res[1];
		$orderTimeArr = $res[2];
		$arrayRangeWarning = $res[3];
		$arrayRangeDanger = $res[4];
		$banner = array('/home'=>'禾描','/order/firststage'=>'第二阶段');
		return view('hemiaoadmin.ordersecondstate',array('orderInfo'=>$orderInfo,'orderStateArr'=>$orderStateArr,'orderTimeArr'=>$orderTimeArr,'arrayRangeWarning'=>$arrayRangeWarning,'arrayRangeDanger'=>$arrayRangeDanger,'banner'=>$banner));
	}

	public function thirdstate(){
		$res = array();
		$res = $this->order->showThirdStage();
		$orderInfo = $res[0];
		$orderStateArr = $res[1];
		$orderTimeArr = $res[2];
		$arrayRangeWarning = $res[3];
		$arrayRangeDanger = $res[4];
		$banner = array('/home'=>'禾描','/order/firststage'=>'第三阶段');
		return view('hemiaoadmin.orderthirdstate',array('orderInfo'=>$orderInfo,'orderStateArr'=>$orderStateArr,'orderTimeArr'=>$orderTimeArr,'arrayRangeWarning'=>$arrayRangeWarning,'arrayRangeDanger'=>$arrayRangeDanger,'banner'=>$banner));

	}

	public function updstage(Request $request){
		$postData = json_decode($request->getContent(), true);
		$checkInfo = explode("-",$postData['dataVal']);
		$orderId = $checkInfo[0];
		$orderField = $checkInfo[1];
		$checkState = $postData['checkVal'];
		$this->order->updState($orderId,$orderField,$checkState);
		return 1;
	}


	/*修改*/
	public function upd(){

	}

	/*删除*/
	public function del(Request $request){
		$orderId = $request->order_id;
		$this->order->upd($orderId,0);
		return redirect("/order/contractorder");
	}


	public function isweixin(){
		if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {  
            echo "是";  
    }    
    echo "否";  
	}

}

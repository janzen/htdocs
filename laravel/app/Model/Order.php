<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\OrderTimeAxis;
use App\Model\OrderStateAxis;

class Order extends Model
{

 	/**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    protected $fillable = ['order_at','data_state','community','customer_name','customer_tel','stage','province','city','area','address','contract_amount','contract_amount_remarks','received_amount','received_amount_remarks','delivery_time','created_at','updated_at','remarks','file_img'];



    public function getAll(){
    	$res = Order::where("data_state",'=',1)->orderBy('stage','asc')->paginate(30);
    	if($res)
    		return $res;
    	return null;
    }

    public function saveOrder($request){
    	$orderAt = $request->input('order_at');
		$community = $request->input('community');
		$customerName = $request->input('customer_name');
		$customerTel = $request->input('customer_tel');
		$inputProvince = $request->input('input_province');
		$inputCity = $request->input('input_city');
		$inputArea = $request->input('input_area');
		$address = $request->input('address');
		$contractAmount = $request->input('contract_amount');
		$contractAmountRemarks = $request->input('contract_amount_remarks');
		$receivedAmount = $request->input('received_amount');
		$receivedAmountRemarks = $request->input('received_amount_remarks');
		$deliveryTime = $request->input('delivery_time');
		$remarks = $request->input('remarks');
		$orderAtStr = str_replace("-","",$orderAt);
		$data = date('Y-m-d H:i:s');

		if(!$orderAt || !$community || !$customerName || !$customerTel || !$inputProvince || !$inputCity || !$inputArea || !$address || !$contractAmount || !$receivedAmount || !$deliveryTime)
			exit("数据不能为空！");

		//判断请求中是否包含name=img的上传文件
		if (!$request->hasFile('file_img')) {
		    exit("请选择上传图片， <a href=''>返回上一页！</a>");
		}
		// 判断图片上传中是否出错
		$file = $request->file('file_img');
		if (!$file->isValid()) {
		    exit("上传图片出错，请重试，<a href=''>返回上一页！</a>");
		}
		 //$img_path = $file -> getRealPath(); // 获取临时图片绝对路径
		 $entension = $file -> getClientOriginalExtension(); //  上传文件后缀
		 $filename = $orderAtStr.mt_rand(100,999).'.'.$entension;  // 重命名图片
		 $path = $file->move(storage_path().'/uploads/'.$orderAtStr.$customerName.'/',$filename);  // 重命名保存
		 $arrInfo = array('order_at' => $orderAt,
		 				  'community'=>$community,
		 				  'data_state'=>1,
		 				  'customer_name'=>$customerName,
		 				  'customer_tel'=>$customerTel,
		 				  'stage'=>'1',//1预备2生产3待送货4完成5待维修6疑难7中止
		 				  'province'=>$inputProvince,
		 				  'city'=>$inputCity,
		 				  'area'=>$inputArea,
		 				  'address'=>$address,
		 				  'contract_amount'=>$contractAmount,
		 				  'contract_amount_remarks'=>$contractAmountRemarks,
		 				  'received_amount'=>$receivedAmount,
		 				  'received_amount_remarks'=>$receivedAmountRemarks,
		 				  'delivery_time'=>$deliveryTime,
		 				  'created_at'=>$data,
		 				  'updated_at'=>$data,
		 				  'remarks'=>$remarks,
		 				  'file_img'=>$filename
		 				   );
		$flight = Order::firstOrCreate($arrInfo);
		$orderTimeAxis = new OrderTimeAxis();
		$orderTimeAxis->saveDate($orderAt,$flight->attributes['id']);
		$orderStateAxis = new OrderStateAxis();
		$orderStateAxis->saveState($flight->attributes['id']);
		if($flight->wasRecentlyCreated){
    		return true;
    	}
    	return false;
    }
    public function selectWhereId($id){
    	if(!$id) return null;
		$res = Order::where('id',$id)->first();
        if($res)
            return $res;
        else
            return null;
    }

    public function getInfo($id){
    	$orderStateAxis = new OrderStateAxis();
    	$orderTimeAxis = new OrderTimeAxis();
    	$orderInfo = $this->selectWhereId($id);
    	$orderStateInfo = $orderStateAxis->selectWhereOrderId($id);
		$orderTimeInfo = $orderTimeAxis->selectWhereOrderId($id);
		return array($orderInfo,$orderStateInfo,$orderTimeInfo);
    }
    public function selectWhereIn($ids){
    	if(!$ids) return null;
		$res = Order::whereIn('id',$ids)->orderByRaw("find_in_set(id, '" . implode(",", $ids) . "')")->paginate(30);
        if($res)
            return $res;
        else
            return null;
    }

    public function showFirstStage(){
    	$orderStateAxis = new OrderStateAxis();
		$stateOne = $orderStateAxis->checkStateOne();
		$orderTimeAxis = new OrderTimeAxis();
		$descOrderArr = $orderTimeAxis->checkTimeOne($stateOne);

		$orderInfo = $this->selectWhereIn($descOrderArr[0]);
		$orderState = $orderStateAxis->selectWhereIn($descOrderArr[0]);
		$orderStateArr = array();
		if($orderState){
			foreach ($orderState as $key => $value) {
				$orderStateArr[$value['order_id']] = $value;
			}
		}
		$orderTime = $orderTimeAxis->selectWhereIn($descOrderArr[0]);
		$orderTimeArr = array();
		if($orderTime){
			foreach ($orderTime as $key => $value) {
				$orderTimeArr[$value['order_id']] = $value;
			}
		}
		$arrayRangeWarning  = $descOrderArr[2];//警告数组范围
        $arrayRangeDanger  = $descOrderArr[1];//错误数组范围
		return array($orderInfo,$orderStateArr,$orderTimeArr,$arrayRangeWarning,$arrayRangeDanger);
    }

    public function showSecondStage(){
    	$orderStateAxis = new OrderStateAxis();
		$stateTwo = $orderStateAxis->checkStateTwo();

		$orderTimeAxis = new OrderTimeAxis();
		$descOrderArr = $orderTimeAxis->checkTimeTwo($stateTwo);

		$orderInfo = $this->selectWhereIn($descOrderArr[0]);
		$orderState = $orderStateAxis->selectWhereIn($descOrderArr[0]);
		$orderStateArr = array();
		if($orderState){
			foreach ($orderState as $key => $value) {
				$orderStateArr[$value['order_id']] = $value;
			}
		}
		$orderTime = $orderTimeAxis->selectWhereIn($descOrderArr[0]);
		$orderTimeArr = array();
		if($orderTime){
			foreach ($orderTime as $key => $value) {
				$orderTimeArr[$value['order_id']] = $value;
			}
		}
		$arrayRangeWarning  = $descOrderArr[2];//警告数组范围
        $arrayRangeDanger  = $descOrderArr[1];//错误数组范围
		return array($orderInfo,$orderStateArr,$orderTimeArr,$arrayRangeWarning,$arrayRangeDanger);

    }

    public function showThirdStage(){
    	$orderStateAxis = new OrderStateAxis();
		$stateThird = $orderStateAxis->checkStateThird();

		$orderTimeAxis = new OrderTimeAxis();
		$descOrderArr = $orderTimeAxis->checkTimeThird($stateThird);

		$orderInfo = $this->selectWhereIn($descOrderArr[0]);
		$orderState = $orderStateAxis->selectWhereIn($descOrderArr[0]);
		$orderStateArr = array();
		if($orderState){
			foreach ($orderState as $key => $value) {
				$orderStateArr[$value['order_id']] = $value;
			}
		}
		$orderTime = $orderTimeAxis->selectWhereIn($descOrderArr[0]);
		$orderTimeArr = array();
		if($orderTime){
			foreach ($orderTime as $key => $value) {
				$orderTimeArr[$value['order_id']] = $value;
			}
		}
		$arrayRangeWarning  = $descOrderArr[2];//警告数组范围
        $arrayRangeDanger  = $descOrderArr[1];//错误数组范围
		return array($orderInfo,$orderStateArr,$orderTimeArr,$arrayRangeWarning,$arrayRangeDanger);
    }


    public function updState($orderId,$field,$checkState){
    	$orderStateAxis = new OrderStateAxis();
    	$orderStateAxis->updState($orderId,$field,$checkState);
    }


    public function upd($orderId,$state){
    	$orderStateAxis = new OrderStateAxis();
    	$orderStateAxis->upd($orderId,$state);

        $result = Order::where('id', '=', $orderId)  
        ->update(["data_state"=>$state]);

        $orderTimeAxis = new OrderTimeAxis();
		$orderTimeAxis->upd($orderId,$state);
    }
}

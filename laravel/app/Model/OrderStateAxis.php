<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderStateAxis extends Model
{
    public $table= 'order_state_axis';
    // public $primarykey ='id';
    //updated_at created_at
	/**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    protected $fillable = ['order_id','delivery_state','payment_state','drawing_state','drawing_finish_state','mailing_drawings_state','send_material_state','send_material_finish_state','woodworker_progress_state','woodworker_progress_finish_state','polish_state','oil_clear_state','assemble_state','packaging_logistics_state','arrival_state','check_state','delivers_state','created_at','updated_at'];


    public function saveState($orderId){
        $data = date('Y-m-d H:i:s');
    	$arrInfo = array('order_id'=>$orderId,
                         'created_at'=>$data,
                         'updated_at'=>$data,
    				);
        OrderStateAxis::firstOrCreate($arrInfo);
    }
    public function selectWhereOrderId($id){
        if(!$id) return null;
        $res = OrderStateAxis::where('order_id',$id)->first();
        if($res)
            return $res;
        else
            return null;
    }
    public function selectWhereIn($ids){
         if(!$ids) return null;
        $res = OrderStateAxis::whereIn('order_id',$ids)->get();
        if($res)
            return $res;
        else
            return null;
    }

    public function checkStateOne(){
        $res = OrderStateAxis::where("payment_state",'=',0)->orWhere("drawing_state",'=',0)->orWhere("drawing_finish_state",'=',0)->get();
        $orderIds = array();
        $orderIds['payment'] = $orderIds['drawing'] = $orderIds['drawing_finish'] = array();
        if($res){
            foreach ($res as $key => $value) {
                if($value['payment_state'] == 0)
                $orderIds['payment'][$value['id']] = $value['order_id'];
                if($value['drawing_state'] == 0)
                $orderIds['drawing'][$value['id']] = $value['order_id'];
                if($value['drawing_finish_state'] == 0)
                $orderIds['drawing_finish'][$value['id']] = $value['order_id'];
            }
        }

        return $orderIds;
    }

    public function checkStateTwo(){
        $res = OrderStateAxis::where(["payment_state"=>1,"drawing_state"=>1,"drawing_finish_state"=>1])->where(function($query){
                $query->where("mailing_drawings_state",'=',0)->orWhere("send_material_state",'=',0)->orWhere("send_material_finish_state",'=',0)->orWhere("woodworker_progress_state",'=',0)->orWhere("woodworker_progress_finish_state",'=',0)->orWhere("polish_state",'=',0)->orWhere("oil_clear_state",'=',0)->orWhere("assemble_state",'=',0)->orWhere("packaging_logistics_state",'=',0);
        })->get();
        $orderIds = array();
        $orderIds['mailing_drawings'] = $orderIds['send_material'] = $orderIds['send_material_finish'] = $orderIds['woodworker_progress'] = $orderIds['woodworker_progress_finish'] = $orderIds['polish'] = $orderIds['oil_clear'] = $orderIds['assemble'] = $orderIds['packaging_logistics'] = array();
        if($res){
            foreach ($res as $key => $value) {
            if($value['mailing_drawings_state'] == 0)
                $orderIds['mailing_drawings'][$value['id']] = $value['order_id'];
            if($value['send_material_state'] == 0)
                $orderIds['send_material'][$value['id']] = $value['order_id'];
            if($value['send_material_finish_state'] == 0)
                $orderIds['send_material_finish'][$value['id']] = $value['order_id'];
            if($value['woodworker_progress_state'] == 0)
                $orderIds['woodworker_progress'][$value['id']] = $value['order_id'];
            if($value['woodworker_progress_finish_state'] == 0)
                $orderIds['woodworker_progress_finish'][$value['id']] = $value['order_id'];
            if($value['polish_state'] == 0)
                $orderIds['polish'][$value['id']] = $value['order_id'];
            if($value['oil_clear_state'] == 0)
                $orderIds['oil_clear'][$value['id']] = $value['order_id'];
            if($value['assemble_state'] == 0)
                $orderIds['assemble'][$value['id']] = $value['order_id'];
            if($value['packaging_logistics_state'] == 0)
                $orderIds['packaging_logistics'][$value['id']] = $value['order_id'];
            }
        }

        return $orderIds;
    }

    public function checkStateThird(){
        $res = OrderStateAxis::where(["payment_state"=>1,"drawing_state"=>1,"drawing_finish_state"=>1,"mailing_drawings_state"=>1,"send_material_state"=>1,"send_material_finish_state"=>1,"woodworker_progress_state"=>1,"woodworker_progress_finish_state"=>1,"polish_state"=>1,"oil_clear_state"=>1,"assemble_state"=>1,"packaging_logistics_state"=>1])->where(function($query){
                $query->where("arrival_state",'=',0)->orWhere("check_state",'=',0)->orWhere("delivers_state",'=',0);
        })->get();
        $orderIds = array();
        $orderIds['arrival'] = $orderIds['check'] = $orderIds['delivers'] = array();
        if($res){
            foreach ($res as $key => $value) {
            if($value['arrival_state'] == 0)
                $orderIds['arrival'][$value['id']] = $value['order_id'];
            if($value['check_state'] == 0)
                $orderIds['check'][$value['id']] = $value['order_id'];
            if($value['delivers_state'] == 0)
                $orderIds['delivers'][$value['id']] = $value['order_id'];
            
            }
        }

        return $orderIds;
    }

    public function updState($orderId,$field,$checkState){
        $fieldStr = $field."_state";
        if($checkState=="true"){
            $state = 1;
        }else{
            $state = 0;
        }
        $result = OrderStateAxis::where('order_id', '=', $orderId)  
        ->update([$fieldStr=>$state]);
    }

}

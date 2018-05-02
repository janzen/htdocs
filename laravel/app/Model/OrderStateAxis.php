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
}

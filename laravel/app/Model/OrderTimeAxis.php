<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderTimeAxis extends Model
{
    public $table= 'order_time_axis';
    // public $primarykey ='id';
    //updated_at created_at
	/**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    protected $fillable = ['order_id','cycle','delivery_date','payment_date','drawing_date','drawing_finish_date','mailing_drawings_date','send_material_date','send_material_finish_date','woodworker_progress_date','woodworker_progress_finish_date','polish_date','oil_clear_date','assemble_date','packaging_logistics_date','arrival_date','check_date','delivers_date','created_at','updated_at'];


    public function saveDate($startDate,$orderId){
        $startDateStr = strtotime($startDate);
        $data = date('Y-m-d H:i:s');
    	$arrInfo = array('order_id'=>$orderId,
                         'cycle'=>60,
                         'payment_date'=>$startDate,
                         'drawing_date'=>date('Y-m-d',strtotime('+6 day',$startDateStr)),
                         'drawing_finish_date'=>date('Y-m-d',strtotime('+8 day',$startDateStr)),
                         'mailing_drawings_date'=>date('Y-m-d',strtotime('+11 day',$startDateStr)),
                         'send_material_date'=>date('Y-m-d',strtotime('+18 day',$startDateStr)),
                         'send_material_finish_date'=>date('Y-m-d',strtotime('+26 day',$startDateStr)),
                         'woodworker_progress_date'=>date('Y-m-d',strtotime('+33 day',$startDateStr)),
                         'woodworker_progress_finish_date'=>date('Y-m-d',strtotime('+41 day',$startDateStr)),
                         'polish_date'=>date('Y-m-d',strtotime('+44 day',$startDateStr)),
                         'oil_clear_date'=>date('Y-m-d',strtotime('+50 day',$startDateStr)),
                         'assemble_date'=>date('Y-m-d',strtotime('+51 day',$startDateStr)),
                         'packaging_logistics_date'=>date('Y-m-d',strtotime('+52 day',$startDateStr)),
                         'arrival_date'=>date('Y-m-d',strtotime('+53 day',$startDateStr)),
                         'check_date'=>date('Y-m-d',strtotime('+56 day',$startDateStr)),
                         'delivers_date'=>date('Y-m-d',strtotime('+59 day',$startDateStr)),
                         'created_at'=>$data,
                         'updated_at'=>$data,
    				);
        OrderTimeAxis::firstOrCreate($arrInfo);
    }
    public function selectWhereOrderId($id){
        if(!$id) return null;
        $res = OrderTimeAxis::where('order_id',$id)->first();
        if($res)
            return $res;
        else
            return null;
    }
    public function selectWhereIn($ids){
        if(!$ids) return null;

        $res = OrderTimeAxis::whereIn('order_id',$ids)->get();
        if($res)
            return $res;
        else
            return null;
    }
    public function checkTimeOne($stateOne){
        $descOrderId = array();
        $arrayRangeWarning  = array();//警告数组范围
        $arrayRangeDanger  = array();//错误数组范围
        $orderTimesPayment = $this->selectWhereIn($stateOne["payment"]);
        $orderTimesDrawing = $this->selectWhereIn($stateOne["drawing"]);
        $orderTimesDrawingFinish = $this->selectWhereIn($stateOne["drawing_finish"]);
        if($orderTimesPayment){
            foreach ($orderTimesPayment as $key => $value) {
                $paymentDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['payment_date']))/86400);
            }
            arsort($paymentDate);
            foreach ($paymentDate as $key => $value) {
                $descOrderId[] = $key;
                if($value>=0){//超出2天
                    $arrayRangeDanger[] = $key;
                }
                if($value<=-1 && $value >=-3){//日期的前3天
                    $arrayRangeWarning[] = $key;
                }
            }
        }
        if($orderTimesDrawing){
            foreach ($orderTimesDrawing as $key => $value) {
                $drawingDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['drawing_date']))/86400);
            }
            arsort($drawingDate);
            if($paymentDate){
                $diffKey = array_diff_key($drawingDate,$paymentDate);
                if($diffKey){
                    foreach ($diffKey as $key => $value) {
                        $descOrderId[] = $key;
                        if($value>=0){//超出2天
                            $arrayRangeDanger[] = $key;
                        }
                        if($value<=-1 && $value >=-3){//日期的前3天
                            $arrayRangeWarning[] = $key;
                        }
                    }
                }
            }else{
                foreach ($drawingDate as $key => $value) {
                    $descOrderId[] = $key;
                    if($value>=0){//超出2天
                        $arrayRangeDanger[] = $key;
                    }
                    if($value<=-1 && $value >=-3){//日期的前3天
                        $arrayRangeWarning[] = $key;
                    }
                }
            }
        }
        if($orderTimesDrawingFinish){
            foreach ($orderTimesDrawingFinish as $key => $value) {
                $drawingFinishDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['drawing_finish_date']))/86400);
            }
            arsort($drawingFinishDate);
            if($drawingDate){
                $diffKey = array_diff_key($drawingFinishDate,$drawingDate);
                if($diffKey){
                    foreach ($diffKey as $key => $value) {
                        $descOrderId[] = $key;
                        if($value>=0){//超出2天
                            $arrayRangeDanger[] = $key;
                        }
                        if($value<=-1 && $value >=-3){//日期的前3天
                            $arrayRangeWarning[] = $key;
                        }
                    }
                }
            }else{
                foreach ($drawingFinishDate as $key => $value) {
                    $descOrderId[] = $key;
                    if($value>=0){//超出2天
                        $arrayRangeDanger[] = $key;
                    }
                    if($value<=-1 && $value >=-3){//日期的前3天
                        $arrayRangeWarning[] = $key;
                    }
                }
            }
        }
        return array($descOrderId,$arrayRangeDanger,$arrayRangeWarning);
    }
}

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
    protected $fillable = ['order_id','data_state','cycle','delivery_date','payment_date','drawing_date','drawing_finish_date','mailing_drawings_date','send_material_date','send_material_finish_date','woodworker_progress_date','woodworker_progress_finish_date','polish_date','oil_clear_date','assemble_date','packaging_logistics_date','arrival_date','check_date','delivers_date','created_at','updated_at'];


    public function saveDate($startDate,$orderId){
        $startDateStr = strtotime($startDate);
        $data = date('Y-m-d H:i:s');
    	$arrInfo = array('order_id'=>$orderId,
                         'cycle'=>60,
                         'data_state'=>1,
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
        $paymentDate = $drawingDate = $drawingFinishDate = array();


        $orderTimesPayment = $this->selectWhereIn($stateOne["payment"]);
        $orderTimesDrawing = $this->selectWhereIn($stateOne["drawing"]);
        $orderTimesDrawingFinish = $this->selectWhereIn($stateOne["drawing_finish"]);
        if($orderTimesPayment){
            foreach ($orderTimesPayment as $key => $value) {
                $paymentDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['payment_date']))/86400);
            }
            if($paymentDate)
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
            if($drawingDate)
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
            if($drawingFinishDate)
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

    public function checkTimeTwo($stateTwo){
        $descOrderId = array();
        $arrayRangeWarning  = array();//警告数组范围
        $arrayRangeDanger  = array();//错误数组范围

        $mailingDrawingsDate = $orderSendMaterialDate = $orderSendMaterialFinishDate = $orderWoodworkerProgressDate = $orderWoodworkerProgressFinishDate = $orderPolishDate = $orderOilClearDate = $orderAssembleDate = $orderPackagingLogisticsDate = array();

        $orderMailingDrawings = $this->selectWhereIn($stateTwo["mailing_drawings"]);
        $orderSendMaterial = $this->selectWhereIn($stateTwo["send_material"]);
        $orderSendMaterialFinish = $this->selectWhereIn($stateTwo["send_material_finish"]);
        $orderWoodworkerProgress = $this->selectWhereIn($stateTwo["woodworker_progress"]);
        $orderWoodworkerProgressFinish = $this->selectWhereIn($stateTwo["woodworker_progress_finish"]);
        $orderPolish = $this->selectWhereIn($stateTwo["polish"]);
        $orderOilClear = $this->selectWhereIn($stateTwo["oil_clear"]);
        $orderAssemble = $this->selectWhereIn($stateTwo["assemble"]);
        $orderPackagingLogistics = $this->selectWhereIn($stateTwo["packaging_logistics"]);

        if($orderMailingDrawings){
            foreach ($orderMailingDrawings as $key => $value) {
                $mailingDrawingsDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['mailing_drawings_date']))/86400);
            }
            if($mailingDrawingsDate)
                arsort($mailingDrawingsDate);
            foreach ($mailingDrawingsDate as $key => $value) {
                $descOrderId[] = $key;
                if($value>=0){//超出2天
                    $arrayRangeDanger[] = $key;
                }
                if($value<=-1 && $value >=-3){//日期的前3天
                    $arrayRangeWarning[] = $key;
                }
            }
        }

        if($orderSendMaterial){
            foreach ($orderSendMaterial as $key => $value) {
                $orderSendMaterialDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['send_material_date']))/86400);
            }
            if($orderSendMaterialDate)
            arsort($orderSendMaterialDate);
            if($mailingDrawingsDate){
                $diffKey = array_diff_key($orderSendMaterialDate,$mailingDrawingsDate);
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
                foreach ($orderSendMaterialDate as $key => $value) {
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

        if($orderSendMaterialFinish){
            foreach ($orderSendMaterialFinish as $key => $value) {
                $orderSendMaterialFinishDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['send_material_finish_date']))/86400);
            }
            if($orderSendMaterialFinishDate)
            arsort($orderSendMaterialFinishDate);
            if($orderSendMaterialDate){
                $diffKey = array_diff_key($orderSendMaterialFinishDate,$orderSendMaterialDate);
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
                foreach ($orderSendMaterialFinishDate as $key => $value) {
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

        if($orderWoodworkerProgress){
            foreach ($orderWoodworkerProgress as $key => $value) {
                $orderWoodworkerProgressDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['woodworker_progress_date']))/86400);
            }
            if($orderWoodworkerProgressDate)
            arsort($orderWoodworkerProgressDate);
            if($orderSendMaterialFinishDate){
                $diffKey = array_diff_key($orderWoodworkerProgressDate,$orderSendMaterialFinishDate);
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
                foreach ($orderWoodworkerProgressDate as $key => $value) {
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


        if($orderWoodworkerProgressFinish){
            foreach ($orderWoodworkerProgressFinish as $key => $value) {
                $orderWoodworkerProgressFinishDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['woodworker_progress_finish_date']))/86400);
            }
            if($orderWoodworkerProgressFinishDate)
            arsort($orderWoodworkerProgressFinishDate);
            if($orderWoodworkerProgressDate){
                $diffKey = array_diff_key($orderWoodworkerProgressFinishDate,$orderWoodworkerProgressDate);
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
                foreach ($orderWoodworkerProgressFinishDate as $key => $value) {
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

        if($orderPolish){
            foreach ($orderPolish as $key => $value) {
                $orderPolishDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['polish_date']))/86400);
            }
            if($orderPolishDate)
            arsort($orderPolishDate);
            if($orderWoodworkerProgressFinishDate){
                $diffKey = array_diff_key($orderPolishDate,$orderWoodworkerProgressFinishDate);
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
                foreach ($orderPolishDate as $key => $value) {
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
        
        if($orderOilClear){
            foreach ($orderOilClear as $key => $value) {
                $orderOilClearDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['oil_clear_date']))/86400);
            }
            if($orderOilClearDate)
            arsort($orderOilClearDate);
            if($orderPolishDate){
                $diffKey = array_diff_key($orderOilClearDate,$orderPolishDate);
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
                foreach ($orderOilClearDate as $key => $value) {
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
        if($orderAssemble){
            foreach ($orderAssemble as $key => $value) {
                $orderAssembleDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['assemble_date']))/86400);
            }
            if($orderAssembleDate)
            arsort($orderAssembleDate);
            if($orderOilClearDate){
                $diffKey = array_diff_key($orderAssembleDate,$orderOilClearDate);
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
                foreach ($orderAssembleDate as $key => $value) {
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
        if($orderPackagingLogistics){
            foreach ($orderPackagingLogistics as $key => $value) {
                $orderPackagingLogisticsDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['packaging_logistics_date']))/86400);
            }
            if($orderPackagingLogisticsDate)
            arsort($orderPackagingLogisticsDate);
            if($orderAssembleDate){
                $diffKey = array_diff_key($orderPackagingLogisticsDate,$orderAssembleDate);
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
                foreach ($orderPackagingLogisticsDate as $key => $value) {
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

    public function checkTimeThird($stateThird){
        $descOrderId = array();
        $arrayRangeWarning  = array();//警告数组范围
        $arrayRangeDanger  = array();//错误数组范围

        $orderArrivalDate = $orderCheckDate = $orderDeliversDate = array();

        $orderArrival = $this->selectWhereIn($stateThird["arrival"]);
        $orderCheck = $this->selectWhereIn($stateThird["check"]);
        $orderDelivers = $this->selectWhereIn($stateThird["delivers"]);

        if($orderArrival){
            foreach ($orderArrival as $key => $value) {
                $orderArrivalDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['arrival_date']))/86400);
            }
            if($orderArrivalDate)
                arsort($orderArrivalDate);
            foreach ($orderArrivalDate as $key => $value) {
                $descOrderId[] = $key;
                if($value>=0){//超出2天
                    $arrayRangeDanger[] = $key;
                }
                if($value<=-1 && $value >=-3){//日期的前3天
                    $arrayRangeWarning[] = $key;
                }
            }
        }

        if($orderCheck){
            foreach ($orderCheck as $key => $value) {
                $orderCheckDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['check_date']))/86400);
            }
            if($orderCheckDate)
            arsort($orderCheckDate);
            if($orderArrivalDate){
                $diffKey = array_diff_key($orderCheckDate,$orderArrivalDate);
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
                foreach ($orderCheckDate as $key => $value) {
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
        if($orderDelivers){
            foreach ($orderDelivers as $key => $value) {
                $orderDeliversDate[$value['order_id']] = $date=floor((strtotime(date('Y-m-d',time()))-strtotime($value['delivers_date']))/86400);
            }
            if($orderDeliversDate)
            arsort($orderDeliversDate);
            if($orderCheckDate){
                $diffKey = array_diff_key($orderDeliversDate,$orderCheckDate);
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
                foreach ($orderDeliversDate as $key => $value) {
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

    public function upd($orderId,$state){
        $result = OrderTimeAxis::where('order_id', '=', $orderId)  
        ->update(["data_state"=>$state]);
    }
}

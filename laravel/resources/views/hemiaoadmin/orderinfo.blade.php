@include('hemiaoadmin.header')
@include('hemiaoadmin.bannerlist')
<!-- /section:basics/content.breadcrumbs -->
<style type="text/css">
	.line-table{
		padding-bottom: 10px;
	}
</style>
<div class="page-content">

	<div class="page-content-area">
		<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
					<!-- #section:elements.form -->
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 合同签订日期：</label>
						<div class="col-sm-10">
							<p>{{$orderInfo['order_at']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 小区名称：</label>
						<div class="col-sm-10">
							<p>{{$orderInfo['community']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 客户名称：</label>
						<div class="col-sm-10">
							<p>{{$orderInfo['customer_name']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 客户电话：</label>
						<div class="col-sm-10">
							<p>{{$orderInfo['customer_tel']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 生产阶段：</label>
						<div class="col-sm-10">
							<p>{{$orderInfo['stage']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 客户地址：</label>
						<div class="col-sm-10">
							<p>{{$orderInfo['province'].$orderInfo['city'].$orderInfo['area'].$orderInfo['address']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 合同金额：</label>
						<div class="col-sm-10">
							<p>{{$orderInfo['contract_amount']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 合同金额备注：</label>
						<div class="col-sm-10">
							<p>{{$orderInfo['contract_amount_remarks']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 实收金额：</label>
						<div class="col-sm-10">
							<p>{{$orderInfo['received_amount']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 实收金额备注：</label>
						<div class="col-sm-10">
							<p>{{$orderInfo['received_amount_remarks']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 送货时间：</label>
						<div class="col-sm-10">
							<p>{{$orderInfo['delivery_time']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 备注：</label>
						<div class="col-sm-10">
							<p>{{$orderInfo['remarks']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 清单图片：</label>
						<div class="col-sm-10">
							<a href="/storage/{{str_replace("-","",$orderInfo['order_at']).$orderInfo['customer_name']}}/{{$orderInfo['file_img']}}"><img src=/storage/{{str_replace("-","",$orderInfo['order_at']).$orderInfo['customer_name']}}/{{$orderInfo['file_img']}}></img></a>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 付款日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['payment_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 是否付款：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['payment_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 生产制作进度询问日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['drawing_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 生产制作进度是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['drawing_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 生产图完成日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['drawing_finish_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 生产图是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['drawing_finish_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 邮寄并确认图纸日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['mailing_drawings_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 邮寄并确认图纸完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['mailing_drawings_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 已派单下料日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['send_material_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 已派单下料是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['send_material_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 木工领料日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['send_material_finish_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 木工领料是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['send_material_finish_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 确认木工进度日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['woodworker_progress_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 确认木工进度是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['woodworker_progress_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 确认木工完工日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['woodworker_progress_finish_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 确认木工完工是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['woodworker_progress_finish_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 第一次打磨日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['polish_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 第一次打磨是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['polish_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 擦油清理日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['oil_clear_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 擦油清理是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['oil_clear_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 配五金组装日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['assemble_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 配五金组装是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['assemble_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 包装发货日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['packaging_logistics_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 包装发货是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['packaging_logistics_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 单号及到达日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['arrival_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 单号及到达是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['arrival_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 库房检查达日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['check_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 库房检查是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['check_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right">送货上门日期：</label>
						<div class="col-sm-10">
							<p>{{$orderTimeInfo['delivers_date']}}</p>
						</div>
					</div>
					<div class="list-group line-table">
						<label class="col-sm-2 control-label text-right"> 送货上门是否完成：</label>
						<div class="col-sm-10">
							<p><?if($orderStateInfo['delivers_state']==1){echo "是";}else{echo "否";}?></p>
						</div>
					</div>

			</div><!-- /.col -->
		</div><!-- /.row -->
		</div>
	</div><!-- /.page-content-area -->
</div><!-- /.page-content -->
@include('hemiaoadmin.footer')
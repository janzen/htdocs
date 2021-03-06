@include('hemiaoadmin.header')
@include('hemiaoadmin.bannerlist')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="page-content">
	<!-- /section:settings.box -->
	<div class="page-content-area">

		<div class="row">
			<div class="col-xs-12">

				<div class="table-responsive">

					<table id="sample-table-2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>合同签订日期</th>
								<th>小区名称</th>
			                    <th>客户姓名</th>
			                    <th>客户电话</th>
								<th>付款日期</th>
								<th>生产图制作询问日期</th>
								<th>生产图完成制作日期</th>
			                    <th>备注</th>
							</tr>
						</thead>

						<tbody>
							<? if($orderInfo){foreach($orderInfo as $value){?>
							<tr class=<? if(in_array($value['id'], $arrayRangeDanger)){echo "alert-danger";}else if(in_array($value['id'], $arrayRangeWarning)){echo "alert-warning";}else{echo "";} ?>>
								<td>{{$value['order_at']}}</td>
								<td>{{$value['community']}}</td>
			                    <td>{{$value['customer_name']}}</td>
			                    <td>{{$value['customer_tel']}}</td>
								<td>
									<?if($orderStateArr[$value['id']]['payment_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-payment" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['payment_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['drawing_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-drawing" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['drawing_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['drawing_finish_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-drawing_finish" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['drawing_finish_date']}}
								</td>
			                    <td class="hidden-480">{{$value['remarks']}}</td>
							</tr>
							<?}}?>
						</tbody>
					</table>

					
						@if($orderInfo)
						<div class="modal-footer no-margin-top">
						{!! $orderInfo->render() !!}
						</div>
						@endif
					

				</div>


			</div>
		</div>
	</div>
</div>
@include('hemiaoadmin.footer')
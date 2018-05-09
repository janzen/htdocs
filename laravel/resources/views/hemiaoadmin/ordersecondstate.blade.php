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
								<th>小区名称</th>
			                    <th>客户姓名</th>
			                    <th>客户电话</th>
								<th>邮寄并确认工厂收到图纸日期</th>
								<th>确认已派单下料日期</th>
								<th>下料拼板完成木工领料日期</th>
								<th>确认木工进度日期</th>
								<th>确认木工完成日期</th>
								<th>第一次打磨开始日期</th>
								<th>擦油清理日期</th>
								<th>配五金组装日期</th>
								<th>包装发货日期</th>
							</tr>
						</thead>

						<tbody>
							<? if($orderInfo){foreach($orderInfo as $value){?>
							<tr class=<? if(in_array($value['id'], $arrayRangeDanger)){echo "alert-danger";}else if(in_array($value['id'], $arrayRangeWarning)){echo "alert-warning";}else{echo "";} ?>>
								<td>{{$value['community']}}</td>
			                    <td>{{$value['customer_name']}}</td>
			                    <td>{{$value['customer_tel']}}</td>
								<td>
									<?if($orderStateArr[$value['id']]['mailing_drawings_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-mailing_drawings" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['mailing_drawings_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['send_material_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-send_material" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['send_material_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['send_material_finish_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-send_material_finish" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['send_material_finish_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['woodworker_progress_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-woodworker_progress" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['woodworker_progress_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['woodworker_progress_finish_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-woodworker_progress_finish" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['woodworker_progress_finish_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['polish_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-polish" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['polish_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['oil_clear_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-oil_clear" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['oil_clear_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['assemble_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-assemble" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['assemble_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['packaging_logistics_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-packaging_logistics" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['packaging_logistics_date']}}
								</td>
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
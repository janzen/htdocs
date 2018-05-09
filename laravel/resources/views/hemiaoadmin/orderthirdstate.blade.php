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
								<th>获取单号以及到达日期</th>
								<th>库房检查日期</th>
								<th>送货上门日期</th>
							</tr>
						</thead>

						<tbody>
							<? if($orderInfo){foreach($orderInfo as $value){?>
							<tr class=<? if(in_array($value['id'], $arrayRangeDanger)){echo "alert-danger";}else if(in_array($value['id'], $arrayRangeWarning)){echo "alert-warning";}else{echo "";} ?>>
								<td>{{$value['community']}}</td>
			                    <td>{{$value['customer_name']}}</td>
			                    <td>{{$value['customer_tel']}}</td>
								<td>
									<?if($orderStateArr[$value['id']]['arrival_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-arrival" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['arrival_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['check_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-check" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['check_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['delivers_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" name="checkboxs" class="ace" value="{{$value['id']}}-delivers" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['delivers_date']}}
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
@include('hemiaoadmin.header')
@include('hemiaoadmin.bannerlist')
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
										<input type="checkbox" class="ace" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['payment_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['drawing_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" class="ace" />
										<span class="lbl"></span>
									</label>
									<?}?>
									{{$orderTimeArr[$value['id']]['drawing_date']}}
								</td>
								<td>
									<?if($orderStateArr[$value['id']]['drawing_finish_state']==0){?>
									<label class="position-relative">
										<input type="checkbox" class="ace" />
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

					<div class="modal-footer no-margin-top">

						<ul class="pagination pull-right no-margin">
							<li class="prev disabled">
								<a href="#">
									<i class="ace-icon fa fa-angle-double-left"></i>
								</a>
							</li>

							<li class="active">
								<a href="#">1</a>
							</li>

							<li>
								<a href="#">2</a>
							</li>

							<li>
								<a href="#">3</a>
							</li>

							<li class="next">
								<a href="#">
									<i class="ace-icon fa fa-angle-double-right"></i>
								</a>
							</li>
						</ul>
					</div>

				</div>


			</div>
		</div>
	</div>
</div>
@include('hemiaoadmin.footer')
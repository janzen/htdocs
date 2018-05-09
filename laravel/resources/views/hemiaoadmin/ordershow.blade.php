@include('hemiaoadmin.header')
@include('hemiaoadmin.bannerlist')
<div class="page-content">
	<!-- /section:settings.box -->
	<div class="page-content-area">

		<div class="row" style="overflow-x: auto;">
			<div class="col-xs-12>

				<div class="table-responsive">

					<table id="sample-table-2" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>操作</th>
								<th>客户姓名</th>
			                    <th>客户电话</th>
								<th>小区名称</th>
			                    <th>生产阶段</th>
			                    <th>客户地址</th>
			                    <th>送货时间</th>
							</tr>
						</thead>

						<tbody>
							<? if($res){foreach($res as $value){?>
							<tr>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<a class="btn btn-xs btn-info">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</a>

										<a class="btn btn-xs btn-danger"  href="/order/del/{{$value['id']}}" onclick="return confirmAct();">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</a>
									</div>
								</td>
								<td><a href="/order/contractorder/info/{{$value['id']}}">{{$value['customer_name']}}</a></td>
			                    <td>{{$value['customer_tel']}}</td>
			                    <td>{{$value['community']}}</td>
			                    <td>{{$value['stage']}}</td>
			                    <td class="hidden-480"><span class="label label-sm label-warning">{{$value['province'].$value['city'].$value['area'].$value['address']}}</span></td>
			                    <td>{{$value['delivery_time']}}</td>
			                    <!-- <td><img width="50px" height="50px"src=/storage/{{str_replace("-","",$value['order_at']).$value['customer_name']}}/{{$value['file_img']}}></img></td> -->
			                
							</tr>
							<?}}?>
						</tbody>
					</table>
						@if($res)
						<div class="modal-footer no-margin-top">
						{!! $res->render() !!}
						</div>
						@endif
					

				</div>


			</div>
		</div>
	</div>
</div>
@include('hemiaoadmin.footer')
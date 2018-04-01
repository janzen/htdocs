@include('hemiaoadmin.header')
@include('hemiaoadmin.bannerlist')
<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="/home">禾描</a>
						</li>
						<li>
							<a href="/order/contractorder">签订合同</a>
						</li>
					</ul><!-- /.breadcrumb -->

					<!-- #section:basics/content.searchbox -->
					<div class="nav-search" id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="请输入关键字 ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div><!-- /.nav-search -->
				</div>
				<div class="page-content">

					<!-- /section:settings.box -->
					<div class="page-content-area">

						<div class="row" style="overflow-x: auto;">
							<div class="col-xs-12" style="width: 2000px;">

	<div class="table-responsive">

		<table id="sample-table-2" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>操作</th>
					<th>订单id</th>
					<th>订单名称</th>
                    <th>客户姓名</th>
                    <th>客户电话</th>
                    <th>生产阶段</th>
                    <th>客户地址</th>
                    <th>合同金额</th>
                    <th>金额备注</th>
                    <th>实收金额</th>
                    <th>实收金额备注</th>
                    <th>送货时间</th>
                    <th>文件图片</th>
                    <th>备注</th>
                    <th>添加时间</th>
				</tr>
			</thead>

			<tbody>
				<? if($res){foreach($res as $value){?>
				<tr>
					<td>
						<div class="hidden-sm hidden-xs btn-group">
							<button class="btn btn-xs btn-success" title="">
								<i class="ace-icon fa fa-search-plus bigger-120"></i>
							</button>

							<button class="btn btn-xs btn-info">
								<i class="ace-icon fa fa-pencil bigger-120"></i>
							</button>

							<button class="btn btn-xs btn-danger">
								<i class="ace-icon fa fa-trash-o bigger-120"></i>
							</button>

							<button class="btn btn-xs btn-warning">
								<i class="ace-icon fa fa-flag bigger-120"></i>
							</button>

							<button class="btn btn-xs btn-success">
								<i class="ace-icon fa fa-check bigger-120"></i>
							</button>
						</div>
					</td>
					<td><a href="#">{{$value['order_id']}}</a></td>
                    <td>{{$value['order_name']}}</td>
                    <td>{{$value['customer_name']}}</td>
                    <td>{{$value['customer_tel']}}</td>
                    <td>{{$value['stage']}}</td>
                    <td class="hidden-480"><span class="label label-sm label-warning">{{$value['address']}}</span></td>
                    <td>{{$value['contract_amount']}}</td>
                    <td class="hidden-480">{{$value['contract_amount_remarks']}}</td>
                    <td>{{$value['received_amount']}}</td>
                    <td class="hidden-480">{{$value['received_amount_remarks']}}</td>
                    <td>{{$value['delivery_time']}}</td>
                    <td>{{$value['file_img']}}</td>
                    <td class="hidden-480">{{$value['remarks']}}</td>
                    <td>{{$value['created_at']}}</td>
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


</div></div></div></div></div>
@include('hemiaoadmin.footer')
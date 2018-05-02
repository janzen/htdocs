@include('hemiaoadmin.header')
@include('hemiaoadmin.bannerlist')
<!-- /section:basics/content.breadcrumbs -->

<div class="page-content">

	<div class="page-content-area">

		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<form method="post" action="/order/contractorder/ins" class="form-horizontal" role="form" enctype="multipart/form-data" name="upload_form">
					<!-- #section:elements.form -->
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 合同签订日期：</label>
						<div class="col-sm-9">
 							<div class="input-group col-xs-10 col-sm-5">
								<input required readonly="" class="form-control date-picker" id="id-date-picker-1" type="text" name="order_at"/>
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">小区名称： </label>
						<div class="col-sm-9">
							<input type="text" required placeholder="请输入小区名称" class="col-xs-10 col-sm-5" name="community" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">客户姓名： </label>
						<div class="col-sm-9">
							<input type="text" required placeholder="请输入客户姓名" class=" col-xs-10 col-sm-5" name="customer_name" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">客户电话： </label>
						<div class="col-sm-9">
							<input type="text" required placeholder="请输入客户电话" class=" col-xs-10 col-sm-5" name="customer_tel" />
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">生产阶段：</label>
						<div class="col-sm-2">
							<div class="pos-rel">
								<select class="form-control" name="stage">
									<option value="">请选择状态</option>
									<option value="1">预备</option>
									<option value="2">生产</option>
									<option value="3">待送货</option>
									<option value="4">完成</option>
									<option value="5">待维修</option>
									<option value="6">疑难</option>
									<option value="7">终止</option>
								</select>
							</div>
						</div>
					</div> -->
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">客户地址： </label>
						
						 <div class="col-sm-2">
						    <select name="input_province" id="input_province" required class="form-control">
						      <option value="">--请选择--</option></select>
						  </div>
						  <div class="col-sm-2">
						    <select name="input_city" id="input_city" required class="form-control">
						      <option value=""></option>
						    </select>
						  </div>
						  <div class="col-sm-2">
						    <select name="input_area" id="input_area" required class="form-control">
						      <option value=""></option>
						    </select>
						  </div>

						<div class="col-md-offset-3 col-sm-9">
							<input type="text" placeholder="请输入客户详细地址" required class="col-xs-10 col-sm-5" name="address" />
						</div>

					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">合同金额： </label>
						<div class="col-sm-9">
							<input type="text" placeholder="请输入合同金额" required pattern="^[0-9]*$" title="请输入数字" class="col-sm-2" name="contract_amount" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">金额备注：</label>
						<div class="col-sm-9">
							<div class="pos-rel">
								<textarea class="form-control limited autosize-transition" maxlength="50" name="contract_amount_remarks"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">实收金额： </label>
						<div class="col-sm-9">
							<input type="text" placeholder="请输入实收金额" class="col-sm-2" required pattern="^[0-9]*$" title="请输入数字" name="received_amount" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">实收金额备注：</label>
						<div class="col-sm-9">
							<div class="pos-rel">
								<textarea class="form-control limited autosize-transition" maxlength="50" name="received_amount_remarks"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 送货时间：</label>
						<div class="col-sm-9">
 							<div class="input-group col-xs-10 col-sm-5">
								<input required readonly="" class="form-control date-picker" id="id-date-picker-2" type="text" name="delivery_time"/>
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">文件图片： </label>
						<div class="col-sm-9">
							<input type="file" class=" col-xs-10 col-sm-5" name="file_img" required accept="image/*"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">备注：</label>
						<div class="col-sm-9">
							<div class="pos-rel">
								<textarea class="form-control limited autosize-transition" maxlength="50" name="remarks"></textarea>
							</div>
						</div>
					</div>
					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<button class="btn btn-info" type="submit">
								<i class="ace-icon fa fa-check bigger-110"></i>
								立即提交
							</button>
						</div>
					</div>
					{{ csrf_field() }}
				</form>

			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content-area -->
</div><!-- /.page-content -->
@include('hemiaoadmin.footer')
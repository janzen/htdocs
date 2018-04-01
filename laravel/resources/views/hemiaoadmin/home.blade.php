@include('hemiaoadmin.header')
@include('hemiaoadmin.bannerlist')
	<!-- /section:basics/sidebar -->
	<div class="main-content">
		<!-- #section:basics/content.breadcrumbs -->
		<div class="breadcrumbs" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="/home">禾描</a>
				</li>
			</ul><!-- /.breadcrumb -->

			<!-- #section:basics/content.searchbox -->
			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="我是假的 ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->

			<!-- /section:basics/content.searchbox -->
		</div>

		<div class="page-content">
			<!-- /section:settings.box -->
			<div class="page-content-area">

				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<div class="alert alert-block alert-info">
							<button type="button" class="close" data-dismiss="alert">
								<i class="ace-icon fa fa-times"></i>
							</button>

							<i class="ace-icon fa fa-check green"></i>

							<strong class="green">最新公告：</strong>
							计划放入公司最新动态
						</div>

						<div class="row center">
							<!-- <img src="assets/avatars/logo_2.png" /> -->
						</div><!-- /.row -->

						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.page-content-area -->
		</div><!-- /.page-content -->
	</div><!-- /.main-content -->
@include('hemiaoadmin.footer')
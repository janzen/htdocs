<!-- #section:basics/sidebar -->
	<div id="sidebar" class="sidebar responsive">

		<ul class="nav nav-list">
			<li <? if(Request::path()=="home"){ ?>class="active" <? } ?> >
				<a href="/home">
					<i class="menu-icon fa fa-tachometer"></i>
					<span class="menu-text"> 总控制台 </span>
				</a>

				<b class="arrow"></b>
			</li>

			<li <? if(Request::is('order/*')){ ?>class="active hsub open" <? } ?> >
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-desktop"></i>
					<span class="menu-text">订单管理</span>
					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">

					<li <? if(Request::path()=="order/contractorder/ins/show"){ ?>class="active" <? } ?>>
						<a href="/order/contractorder/ins/show">
							<i class="menu-icon fa fa-caret-right"></i>
							添加合同
						</a>

						<b class="arrow"></b>
					</li>
					<li <? if(Request::path()=="order/contractorder"){ ?>class="active" <? } ?>>
						<a href="/order/contractorder">
							<i class="menu-icon fa fa-caret-right"></i>
							签订合同
						</a>

						<b class="arrow"></b>
					</li>

					<li <? if(Request::path()=="order/firststage"){ ?>class="active" <? } ?>>
						<a href="/order/firststage">
							<i class="menu-icon fa fa-caret-right"></i>
							第一阶段
						</a>

						<b class="arrow"></b>
					</li>
					<li <? if(Request::path()=="order/secondstate"){ ?>class="active" <? } ?>>
						<a href="/order/secondstate">
							<i class="menu-icon fa fa-caret-right"></i>
							第二阶段
						</a>

						<b class="arrow"></b>
					</li>
					<li <? if(Request::path()=="order/thirdstate"){ ?>class="active" <? } ?>>
						<a href="/order/thirdstate">
							<i class="menu-icon fa fa-caret-right"></i>
							第三阶段
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>

		</ul><!-- /.nav-list -->

		<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

	</div>

		<!-- /section:basics/sidebar -->
	<div class="main-content">
		<!-- #section:basics/content.breadcrumbs -->
		<div class="breadcrumbs" id="breadcrumbs">
			<ul class="breadcrumb">
				<? if($banner){
					foreach ($banner as $key => $value) {
					?>
				<li>
					<i <?if($value=='禾描'){?>class="ace-icon fa fa-home home-icon"<?}?>></i>
					<a href="{{$key}}">{{$value}}</a>
				</li>
				<?}}?>
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
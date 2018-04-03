<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>{{$title or '禾描 实木定制'}}</title>

		<meta name="description" content="This is page-header (.page-header &gt; h1)" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="/assets/css/ace.min.css" id="main-ace-style" />
		<!-- 日历样式 -->
		<link href="/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
		<script src="/assets/js/ace-extra.min.js"></script>

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="/assets/css/ace-rtl.min.css" />
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/assets/css/ace-ie.min.css" />
		<![endif]-->
		<!--[if lte IE 8]>
		<script src="/assets/js/html5shiv.min.js"></script>
		<script src="/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="no-skin">
<div id="navbar" class="navbar navbar-default">
	<div class="navbar-container" id="navbar-container">

		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<!-- /section:basics/sidebar.mobile.toggle -->
		<div class="navbar-header pull-left">
			<!-- #section:basics/navbar.layout.brand -->
			<a href="index.html" class="navbar-brand">
				<small>
					<!-- <img src="/assets/avatars/logo.png" alt="" /> -->
					禾描
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">

				<!-- #section:basics/navbar.user_menu -->
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="/assets/avatars/user.jpg" alt="Jason's Photo" />
						<span class="user-info">
							欢迎您<br />
							{{session('userinfo')['username']}}
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<!-- <li>
							<a href="#">
								<i class="ace-icon fa fa-cog"></i>
								系统设置
							</a>
						</li> -->

						<li>
							<a href="/profile">
								<i class="ace-icon fa fa-user"></i>
								个人信息设置
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="/logout">
								<i class="ace-icon fa fa-power-off"></i>
								登出
							</a>
						</li>
					</ul>
				</li>

				<!-- /section:basics/navbar.user_menu -->
			</ul>
		</div>

		<!-- /section:basics/navbar.dropdown -->
	</div><!-- /.navbar-container -->
</div>
<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('title')
<base href="{{asset('public')}}"/>
<link href="{{ asset('adminlte/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('adminlte/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('adminlte/css/styles.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('adminlte/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('adminlte/js/lumino.glyphs.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{asset('/thong-tin-khach-hang')}}">ISTORE SHOP</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{Auth::user()->email}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{asset('logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>				 
</div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="active"><a href="{{asset('thong-tin-khach-hang')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang tổng quan</a></li>
			<li><a href="{{route('get.info')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Thông tin cá nhân</a></li>
			<li><a href="{{route('get.billuser')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Hóa đơn</a></li>


			<li role="presentation" class="divider"></li>
		</ul>
		
	</div><!--/.sidebar-->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Trang chủ</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-blue panel-widget ">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked bag">
							<use xlink:href="#stroked-bag"></use>
						</svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{\DB::table('orders')->count()}}</div>
						<div class="text-muted">Sản phẩm đã mua</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked empty-message">
							<use xlink:href="#stroked-empty-message"></use>
						</svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large">{{number_format(DB::table('orders')->where('status','3')->sum('total'))}} </div>
						<div class="text-muted">Doanh Thu</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked male-user">
							<use xlink:href="#stroked-male-user"></use>
						</svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{\DB::table('users')->count()}}</div>
						<div class="text-muted">Người dùng</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-red panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked app-window-with-content">
							<use xlink:href="#stroked-app-window-with-content"></use>
						</svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{\DB::table('categories')->count()}}</div>
						<div class="text-muted">Danh mục</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>
	<!--/.row-->
</div>
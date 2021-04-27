<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <base href="{{ asset('public') }}" />
    <link href="{{ asset('adminlte/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/styles.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('adminlte/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('adminlte/js/lumino.glyphs.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ asset('/thong-tin-khach-hang') }}">ISTORE SHOP</a>
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
            <li class="active"><a href="{{ asset('/thong-tin-khach-hang') }}"><svg
                        class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg> Trang tổng quan</a></li>
            <li><a href="{{ route('get.info') }}"><svg class="glyph stroked calendar">
                        <use xlink:href="#stroked-calendar"></use>
                    </svg> Thông tin cá nhân</a></li>
            <li><a href="{{ route('get.billuser') }}"><svg class="glyph stroked calendar">
                        <use xlink:href="#stroked-calendar"></use>
                    </svg> Hóa đơn</a></li>


            <li role="presentation" class="divider"></li>
        </ul>

    </div>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <section class="content-header">
                    <h1>
                        Chi tiết đơn hàng
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Bill</a></li>
                        <li class="active">List</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container123  col-md-6" style="">
                                        <h4></h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-4">Thông tin khách hàng</th>
                                                    <th class="col-md-6"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Thông tin người đặt hàng</td>
                                                    <td>{{ $user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ngày đặt hàng</td>
                                                    <td>{{ $user->created_at }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Số điện thoại</td>
                                                    <td>{{ $user->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Địa chỉ</td>
                                                    <td>{{ $user->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ghi chú</td>
                                                    <td>{{ $order->note }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <table id="myTable" class="table table-bordered table-hover dataTable" role="grid"
                                        aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting col-md-1">STT</th>
                                                <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                                <th class="sorting col-md-2">Số lượng</th>
                                                <th class="sorting col-md-2">Giá tiền</th>
                                        </thead>
                                        <tbody>
                                            @foreach($order->orders as $key => $bill)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $bill->product->name }}</td>
                                                    <td>{{ $bill->quantity }}</td>
                                                    <td>{{ number_format($bill->price) }} VNĐ</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3"><b>Tổng tiền</b></td>
                                                <td colspan="1"><b class="text-red">{{ ($order->total) }} VNĐ</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

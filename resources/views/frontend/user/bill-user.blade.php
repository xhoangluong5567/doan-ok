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
                        <a href="{{ asset('logout') }}" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
                                <use xlink:href="#stroked-male-user"></use>
                            </svg> {{ Auth::user()->email }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ asset('logout') }}"><svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel"></use>
                                    </svg> Logout</a></li>
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
    <!--/.sidebar-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Danh sách sản phẩm & đơn hàng đã mua.</h2>
            </div>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="box">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">ID</th>
                                                <th class="sorting_asc col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Tên người order</th>
                                                <th class="sorting col-md-3" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Địa chỉ</th>
                                                <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Ngày đặt hàng</th>
                                                <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Email</th>
                                                <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Trạng thái</th>
                                                <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->user->address }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->user->email }}</td>
                                                <td>
                                                    @switch($order->status)
                                                    @case(1)
                                                    Chờ xử lí
                                                    @break
                                                    @case(2)
                                                    Đang giao
                                                    @break
                                                    @case(3)
                                                    Đã giao
                                                    @break
                                                    @endswitch
                                                </td>
                                                <td> 
                                                <a class=""
                                                    href="{{ route('get.billdetails', $order->id) }}"><i class="far fa-eye"></i></a>
                                                
                                                @if($order->status == 3 )
                                                
                                                @else
                                                <form class="delete" style="margin-left: 35px; margin-top: -22px;"
                                                    action="{{ route('profile.destroy', $order->id) }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button style="border: none;" class="">Huỷ đơn hàng</button>
                                                </form>
                                                @endif
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

      

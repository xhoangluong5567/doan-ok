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
                <a class="navbar-brand" href="{{ asset('/admin') }}">ISTORE SHOP</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
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
            <li class="active"><a href="{{ asset('admin') }}"><svg
                        class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg> Trang tổng quan</a></li>
            <li><a href="{{ route('get.info') }}"><svg class="glyph stroked calendar">
                        <use xlink:href="#stroked-calendar"></use>
                    </svg> Thông tin cá nhân</a></li>
            <li><a href="{{ route('get.info') }}"><svg class="glyph stroked calendar">
                        <use xlink:href="#stroked-calendar"></use>
                    </svg> Hóa đơn</a></li>


            <li role="presentation" class="divider"></li>
        </ul>

    </div>
    <!--/.sidebar-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Thông tin cá nhân</h2>
            </div>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <form action="" method="POST">
            @csrf

            <div class="form-group">
                <label>Họ tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" disabled value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <!--/.row-->

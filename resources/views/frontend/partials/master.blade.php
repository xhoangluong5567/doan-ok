<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Hoàng Lương ISTORE - Home</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/details.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}">





    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>



    </script>
    <script type="text/javascript">
        $(function() {
            var pull = $('#pull');
            menu = $('nav ul');
            menuHeight = menu.height();

            $(pull).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
            });
        });

        $(window).resize(function() {
            var w = $(window).width();
            if (w > 320 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    </script>

</head>
@if(Session::has('warning'))
<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong></strong>{{ Session::get('warning') }}
</div>
@endif
@if(Session::has('success'))

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong></strong>{{ Session::get('success') }}
</div>

@endif
<div class="container-fluid" style="height:2em; background:black">
    <div class="row nav" style="float: right;
    margin: 0px auto; ">

        @if(Auth::check())
        <a class="navbar-right" style="text-decoration: none; color:white;" href="{{ asset('logout') }}">Xin chào {{ Auth::user()->name }} !</a>
        <a class="navbar-right" style="text-decoration: none; color:white;" href="{{ route('get.profile') }}">Quản lí thông tin</a>
        <a class="navbar-right" style="text-decoration: none; color:white;" href="{{ route('get.billuser') }}">Quản lí đơn hàng</a>
        <a class="navbar-right" style="text-decoration: none; color:white;" href="{{ asset('logout') }}">Đăng xuất</a>


        @else


        <a href="{{ route('login') }}" class="navbar-right">Đăng nhập
            <a href="{{ route('register') }}" class="navbar-right">Đăng kí</a>
        </a>


        @endif
    </div>
</div>

</ul>
</div>

<header id="header">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-md-3 col-sm-12 col-xs-12">
                <h1>
                    <a href="{{ asset('/') }}"><img style="margin-top:20px;" src="{{ asset('img/logo2.png') }}"></a>
                    <nav><a id="pull" class="btn btn-danger" href="#">
                            <i class="fa fa-bars"></i>
                        </a></nav>
                </h1>
            </div>
            <div id="search" class="col-md-7 col-sm-12 col-xs-12">
                <form class="navbar-form" role="search" method="get" action="{{ asset('search/') }}">
                    <input type="text" name="result" value="" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                    <input type="submit" name="submit" value="Tìm Kiếm">
                </form>

            </div>
            <div id="cart" class="col-md-2 col-sm-12 col-xs-12">
                <a class="display" href="{{ route('get.shopping.cart') }}">Giỏ hàng</a>
                <a href="{{ route('get.shopping.cart') }}">{{ Cart::count() }}</a>
            </div>
        </div>
    </div>
</header><!-- /header -->
<div id="slide-banner">
    <div class="container slide-banner">
        <div class="row">
            <div id="sidebar" class="col-md-3">
                <nav id="menu">
                    <ul>
                        <li class="menu-item">danh mục sản phẩm</li>
                        <?php $categories = App\Category::all() ?>
                        @foreach($categories as $categories)
                        <li class="menu-item"><a href="{{ url('categories') }}/{{ $categories->id }}" style="text-decoration:none;" value="{{ $categories->id }}">{{ $categories->name }}</a></li>
                        @endforeach



                    </ul>
                    <!-- <a href="#" id="pull">Danh mục</a> -->

                </nav>
            </div>
            <div id="main" class="col-md-9">
                <!-- main -->
                <!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
                <div id="slider">
                    <div id="demo" class="carousel slide">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img style="width:855px;height: 292px;" src="{{ asset('img/frontend/ap5.png') }}">
                            </div>
                            <div class="carousel-item">
                                <img style="width:855px; height:292px;" src="{{ asset('img/frontend/ap3.png') }}">
                            </div>
                            <div class="carousel-item">
                                <img style="width:855px; height:292px;" src="{{ asset('img/frontend/ap4.png') }}">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>




            @yield('content')
        </div>
    </div>
    <hr>
    <div class="section-content relative">
        <div class="row row-small align-middle row-dashed khuong">
            <div class="col medium-3 small-6 large-3">
                <div class="col-inner">

                    <div class="icon-box">
                        <div class="icon-box-img" style="width: 46px;">
                            <div class="icon">
                                <div class="icon-inner">
                                    <img width="49" height="45" src="https://hdmobile.vn/wp-content/uploads/2018/03/1.png" class="attachment-medium size-medium" alt="" srcset="https://hdmobile.vn/wp-content/uploads/2018/03/1.png 49w, https://hdmobile.vn/wp-content/uploads/2018/03/1-24x22.png 24w, https://hdmobile.vn/wp-content/uploads/2018/03/1-36x33.png 36w, https://hdmobile.vn/wp-content/uploads/2018/03/1-48x44.png 48w" sizes="(max-width: 49px) 100vw, 49px">
                                </div>
                            </div>
                        </div>
                        <div class="icon-box-text last-reset">

                            <p><span style="font-size: 90%;"><strong>CAM KẾT CHẤT LƯỢNG&nbsp;</strong></span><br>
                                <span style="font-size: 90%;">Tuyệt đối yên tâm&nbsp;</span>
                            </p>
                        </div>
                    </div><!-- .icon-box -->
                </div>
            </div>
            <div class="col medium-3 small-6 large-3">
                <div class="col-inner">

                    <div class="icon-box">
                        <div class="icon-box-img" style="width: 46px">
                            <div class="icon">
                                <div class="icon-inner">
                                    <img width="45" height="45" src="https://hdmobile.vn/wp-content/uploads/2018/03/2-1.png" class="attachment-medium size-medium" alt="" srcset="https://hdmobile.vn/wp-content/uploads/2018/03/2-1.png 45w, https://hdmobile.vn/wp-content/uploads/2018/03/2-1-24x24.png 24w, https://hdmobile.vn/wp-content/uploads/2018/03/2-1-36x36.png 36w" sizes="(max-width: 45px) 100vw, 45px">
                                </div>
                            </div>
                        </div>
                        <div class="icon-box-text last-reset">

                            <p><span style="font-size: 90%;"><strong>BẢO HÀNH SIÊU VIỆT</strong></span></p>
                            <p><span style="font-size: 90%;">100% khách hàng hài lòng&nbsp;</span></p>
                        </div>
                    </div><!-- .icon-box -->


                </div>
            </div>
            <div class="col medium-3 small-6 large-3">
                <div class="col-inner">

                    <div class="icon-box">
                        <div class="icon-box-img" style="width: 20px">
                            <div class="icon">
                                <div class="icon-inner">
                                    <img width="23" height="45" src="https://hdmobile.vn/wp-content/uploads/2018/03/3-1.png" class="attachment-medium size-medium" alt="" srcset="https://hdmobile.vn/wp-content/uploads/2018/03/3-1.png 23w, https://hdmobile.vn/wp-content/uploads/2018/03/3-1-12x24.png 12w, https://hdmobile.vn/wp-content/uploads/2018/03/3-1-18x36.png 18w" sizes="(max-width: 23px) 100vw, 23px">
                                </div>
                            </div>
                        </div>
                        <div class="icon-box-text last-reset">

                            <p><span style="font-size: 90%;"><strong>CAM KẾT GIÁ TỐT NHẤT</strong></span></p>
                            <p><span style="font-size: 90%;">Khỏi mất công so sánh giá</span></p>
                        </div>
                    </div><!-- .icon-box -->


                </div>
            </div>
            <div class="col medium-3 small-6 large-3">
                <div class="col-inner">

                    <div class="icon-box">
                        <div class="icon-box-img" style="width: 31px">
                            <div class="icon">
                                <div class="icon-inner">
                                    <img width="36" height="45" src="https://hdmobile.vn/wp-content/uploads/2018/03/4.png" class="attachment-medium size-medium" alt="" srcset="https://hdmobile.vn/wp-content/uploads/2018/03/4.png 36w, https://hdmobile.vn/wp-content/uploads/2018/03/4-19x24.png 19w, https://hdmobile.vn/wp-content/uploads/2018/03/4-29x36.png 29w" sizes="(max-width: 36px) 100vw, 36px">
                                </div>
                            </div>
                        </div>
                        <div class="icon-box-text last-reset">

                            <p><span style="font-size: 80%;"><strong>CHẾ ĐỘ SUPPORT NHIỆT TÌNH&nbsp;</strong></span></p>
                            <p><span style="font-size: 80%;">Khách hàng thân thiết</span></p>
                        </div>
                    </div><!-- .icon-box -->


                </div>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div id="footer-t">
            <div class="container">
                <div class="row">
                    <div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">
                        <a href="#"><img style="margin-top:20px;" src="{{ asset('img/logo2.png') }}"></a>
                    </div>
                    <div id="about" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>About us</h3>
                        <p class="text-justify">ok</p>
                    </div>
                    <div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>Hotline</h3>
                        <p>Phone Sale: (+84) 096 36 000 36</p>
                        <p>Email: xhoangluong@gmail.com</p>
                    </div>
                    <div id="contact" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>Contact Us</h3>
                        <p>Hueic</p>
                    </div>
                </div>
            </div>
            <div id="footer-b">
                <div class="container">
                    <div class="row">
                        <div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
                            <p>Hueic</p>
                        </div>
                        <div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
                            <p>© 2021. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
                <div id="scroll">
                    <a href="#"><img src="{{ asset('frontend/img/home/scroll.png') }}"></a>
                </div>
            </div>
        </div>
    </footer>
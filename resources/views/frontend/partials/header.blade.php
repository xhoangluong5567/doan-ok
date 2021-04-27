<nav class="nav nav-fill">
        <a class="login" href="#">Đăng nhập</a>
        <a class="dangky" href="#">Đăng Kí</a>
    </nav>
    <header id="header">
        <div class="container">
            <div class="row">
                <div id="logo" class="col-md-3 col-sm-12 col-xs-12">
                    <h1>
                        <a href="{{asset('/')}}"><img src="{{asset('/img/logo.png')}}"></a>
                        <nav><a id="pull" class="btn btn-danger" href="#">
                                <i class="fa fa-bars"></i>
                            </a></nav>
                    </h1>
                </div>
                <div id="search" class="col-md-7 col-sm-12 col-xs-12">
                    <input type="text" name="text" value="" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                    <input type="submit" name="submit" value="Tìm Kiếm">
                </div>
                <div id="cart" class="col-md-2 col-sm-12 col-xs-12">
                    <a class="display" href="#">Giỏ hàng</a>
                    <a href="#">6</a>
                </div>
            </div>
        </div>
    </header><!-- /header -->
<div id="slide-banner">
        <div class="container slide-banner">
            <div class="row">
                <div id="sidebar" class="col-md-3">
                    <nav id="menu">
                        <ul>
                            <li class="menu-item">danh mục sản phẩm</li>
                            <?php $categories = App\Category::all() ?>
                            @foreach($categories as $categories)
                            <li class="menu-item"><a href="{{url('category')}}/{{$categories->id}}" style="text-decoration:none;" value="{{$categories->id}}">{{ $categories->name }}</a></li>
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
                                    <img style="width:855px;height: 292px;" src="img/frontend/ap5.png">
                                </div>
                                <div class="carousel-item">
                                    <img style="width:855px; height:292px;" src="img/frontend/ap3.png">
                                </div>
                                <div class="carousel-item">
                                    <img style="width:855px; height:292px;" src="img/frontend/ap4.png">
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
                <div class="banner">
                    <div class="col-md-6 chinh">
                        <img src="https://cdn.tgdd.vn/2021/03/banner/800-300-800x300-11.png" alt="">
                    </div>
                    <div class="col-md-6 phu1">
                        <img src="https://cdn.tgdd.vn/2021/03/banner/iphone-chung-398-110-398x110.png" alt="">
                    </div>
                    <div class="col-md-3 phu2">
                        <img src="https://images.fpt.shop/unsafe/fit-in/385x100/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/3/1/637501931585291129_LaptopOnline-H2_385x100.png" alt="">
                    </div>
                </div>
            </div>

            <div class="gif">
                <img style="cursor:pointer;margin-top: 5px;" src="https://cdn.tgdd.vn/2021/02/banner/1200-75-1200x75.gif" alt="Big" width="1109px" height="75">
            </div>
        </div>
    </div>
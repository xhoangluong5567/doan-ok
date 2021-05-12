@extends('frontend.partials.master')
@section('content')
@include('frontend.partials.banner')


<link rel="stylesheet" href="{{ asset('frontend/css/test.css') }}">

<div class="product-hot" style="margin-bottom: 130px;">
    <div class="container">
        <h3
            style=" margin-top: 40px; margin-bottom: 30px;color: var(--red);font-size: 22px;font-weight: 700; text-transform: uppercase;">
            Sản phẩm nổi bật
        </h3>
        <div class="autoplay">
            @if(isset($productHot))
                @foreach($productHot as $hot)

                    <div class="col-md-3" style="text-align: center;">
                        @if($hot->quantity == 0)
                            <span
                                style="position: absolute; background:#e91e63; color:white; padding: 2px 6px;border-radius:5px;font-size:10px;left:0">Tạm
                                hết hàng</span>
                        @endif
                        @if($hot->discount)
                            <span
                                style="position: absolute; background:red; color:white; padding: 2px 6px;border-radius:5px;font-size:12px;right:0">Giảm
                                đến {{ number_format($hot->discount) }} ₫</span>
                            <i class="discount%"
                                style="position: absolute; background:#fbda00;margin-top:25px; color:black; padding: 2px 6px;border-radius:5px;font-size:13px;right:0">- <?php 
                                        $number = (($hot->discount/$hot->price)*100);
                                        echo round($number, 1);
                                    ?>%</i>

                        @endif
                        <a href="{{ url('product') }}/{{ $hot->id }}">
                            <td><img style="width:200px; height:200px; margin: 0px auto;"
                                    src="{{ url('upload') }}/{{ $hot->images }}" class="">
                        </a></td>
                        <h5>{{ $hot->name }}</h5>
                        <strong style="color: red;">{{ number_format($hot->price - $hot->discount) }} ₫
                        </strong>
                        <span style="font-size:14px;color:#919191;line-height:15px;display:block;"><strike>{{ number_format($hot->price) }}
                                ₫</strike></span>

                        <!-- <p> <a style="color:white;" href="{{ route('add.cart',$hot->id) }}" class="btn btn-warning">Mua Hàng</a>
                    <a style="color:white;" href="{{ url('product') }}/{{ $hot->id }}" class="btn btn-danger">Xem chi tiết</a>
                </p> -->
                    </div>

                @endforeach
            @endif
        </div>

    </div>
    <!-- Left and right controls -->

    <script type="text/javascript">
        $('.autoplay').slick({
            infinite: true,
            autoplay: true,
            mobileFirst: true,
            autoplaySpeed: 4000,
            arrows: false,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 1008,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 568,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 800,
                    settings: "unslick"
                }

            ]
        });

    </script>




    <div class="container products">
        <div class="products">

            <?php $categories = App\Category::all() ?>
            @foreach($categoriesPublic as $categoriesPublic)
                <a>
                    <h1 style="text-align:center; margin-top:30px; margin-bottom:30px; color:black; border:2px solid orange; "
                        value="{{ $categoriesPublic->id }}">{{ $categoriesPublic->name }}</h1>
                </a>
                <div class="product-list row">

                    @foreach($categoriesPublic->products as $product)

                        <div class="product-item col-md-3 col-sm-6 col-xs-12">


                            @if($product->quantity == 0)
                                <span class="noti"
                                    style="position: absolute; background:#e91e63; color:white; padding: 2px 6px;border-radius:5px;font-size:10px;left:0;z-index: 2;">Tạm
                                    hết hàng</span>
                            @endif
                            @if($product->discount)
                                <span
                                    style="position: absolute; background:red; color:white; padding: 2px 6px;border-radius:5px;font-size:12px;right:0; z-index: 2;">Giảm
                                    đến {{ number_format($product->discount) }} ₫</span>
                                <i class="discount%"
                                    style="position: absolute; background:#fbda00;margin-top:25px; color:black; padding: 2px 6px;border-radius:5px;font-size:13px;right:0">- <?php 
                                        $number = (($product->discount/$product->price)*100);
                                        echo round($number, 1);
                                    ?>%</i>

                            @endif
                            <div class="product-grid">
                                <a href="{{ url('product') }}/{{ $product->id }}"><img
                                        src="{{ url('upload') }}/{{ $product->images }}"
                                        style="width: 180px;; height:200px;"></a>
                                <ul class="social">
                                    <li><a href="{{ url('product') }}/{{ $product->id }}" data-tip="Xem chi tiết đơn hàng"><i class="fa fa-search"></i></a></li>
                                    <li><a href="{{ route('add.cart',$product->id) }}" data-tip="Thêm hàng vào giỏ"><i class="fa fa-shopping-cart"></i></a>
                                    </li>
                                </ul>
                                <div class="product-content">
                                    <p class="name">{{ ($product->name) }}</p>

                                    <div class="price">
                                        <strong>{{ number_format($product->price - $product->discount) }} ₫
                                        </strong>
                                        <span
                                            style="font-size:14px;color:#919191;line-height:15px;display:block;"><strike>{{ number_format($product->price) }}
                                                ₫</strike></span> </div>
                                    <a class="add-to-cart" href="{{ route('add.cart',$product->id) }}">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>

                    @endforeach




                </div>
            @endforeach
        </div>
    </div>
</div>


<!-- end main -->
</div>
</div>
</div>

<!-- endmain -->

<!-- footer -->
@endsection

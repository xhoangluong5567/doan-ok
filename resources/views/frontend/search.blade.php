@extends('frontend.partials.master')
@section('content')


<div class="container">
    <div class="products">
        <hr>
        <h3>Tìm kiếm với từ khóa: <span>{{ $keyword }}</span></h3>
        <div class="product-list row">
            @foreach( $items as $item )
                <div class="product-item col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ url('product') }}/{{ $item->id }}"><img
                            style="width:250px; height:250px"
                            src="{{ url('upload') }}/{{ $item->images }}" class=""></a>
                    <p><a href="{{ url('product') }}/{{ $item->id }}"></a>{{ $item->name }}</p>
                    <p class="price">{{ number_format($item->price) }} VND</p>
                </div>
                <div class="marsk">
                    <a style="text-decoration: none;"
                        href="{{ url('products') }}/{{ $item->id }}">Xem chi tiết</a>
                </div>
            @endforeach
        </div>

    </div>




    <!-- end main -->
</div>
</div>
</div>
<hr>

</section>
<!-- endmain -->

<!-- footer -->

</body>

</html>
@endsection

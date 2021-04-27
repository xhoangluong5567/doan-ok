@extends('frontend.partials.master')
@section('content')

<div class="container">
		<div class="products">
			
			<h1 style="border: 2px solid orange; text-align:center; margin-top:20px; margin-bottom:20px;">{{ $category->name}}</h1>
			<div class="product-list row">
				@foreach( $category->products as $product )
				<div class="product-item col-md-3 col-sm-6 col-xs-12">
				@if ($product->quantity == 0)
                    <span style="position: absolute; background:#e91e63; color:white; padding: 2px 6px;border-radius:5px;font-size:10px;left:0">Tạm hết hàng</span>
                    @endif
                    @if ($product->discount)
                    <span style="position: absolute; background:red; color:white; padding: 2px 6px;border-radius:5px;font-size:10px;right:0">Giảm đến {{$product->discount}}%</span>
                    @endif
					<a href="{{url('product')}}/{{$product->id}}"><img style="width:250px; height:250px" src="{{url('upload')}}/{{$product->images}}" class="img-thumbnail"></a>
					<p><a href="{{url('product')}}/{{$product->id}}"></a>{{$product->name}}</p>
					<p class="price">{{number_format($product->price)}} VND</p>
				</div>
				<div class="marsk">
						<a style="text-decoration: none;" href="{{url('products')}}/{{$product->id}}">Xem chi tiết</a>
					</div>
				@endforeach
				
				</div>
			</div>
						
			<ul id="pagination-lg">
			</ul>
		</div>	
						

		@endsection
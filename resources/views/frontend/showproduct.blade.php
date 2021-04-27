@extends('frontend.partials.master')
@section('content')
@section('title', 'Giỏ Hàng')







<div class="container">
	<div id="list-cart">
		<h1>Giỏ hàng</h1>
		@if(Cart::count() >= 1)
		<form>
			<table class="table table-bordered .table-responsive text-center">
				<tr class="active">
					<td width="11.111%">Ảnh mô tả</td>
					<td width="22.222%">Tên sản phẩm</td>
					<td width="22.222%">Số lượng</td>
					<td width="16.6665%">Đơn giá</td>
					<td width="16.6665%">Thành tiền</td>
					<td width="11.112%">Xóa</td>
					@foreach ($products as $product)
				<tr>
					<td><img class="img-responsive" style="width: 130px; height: 150px;" src="{{ url('upload') }}/{{$product->options->images}}"></td>
					<td>{{ $product->name }}</td>
					<td>
						<div class="form-group">
												<input name="qty" class="formcontrol" type="number" required pattern="[1-9]"
												value="{{$product->qty}}" onChange="updateCart(this.value,'{{$product->rowId}}')">	
											</div>
							<script type="text/javascript">
								function updateCart(qty, rowId) {

									$.get('{{asset('shopping/update')}}', {
											qty: qty,
											rowId: rowId
										},
										function() {
											location.reload();
										}
									);

								}
							</script>

						</div>

					</td>
					<td><span class="price" >{{number_format($product->price)}} VND</span></td>
					<td><span style="color:red; font-weight: bold;" class="prices">{{number_format($product->price*$product->qty)}} VND</span></td>
					<td><a href="{{asset('cart/delete/'.$product->rowId)}}" class="">X</a></td>
				</tr>
				@endforeach
			</table>
			<div class="row" id="total-price">
				<div class="col-md-6 col-sm-12 col-xs-12">
					Tổng thanh toán: <span class="total-price">{{Cart::subtotal()}}</span>

				</div>
				<a class="btn btn-warning" href="{{route('get.form.pay')}}">Thanh toán</a>
				<a href="{{asset('cart/delete/all')}}" class="btn btn-success">Xóa tất cả hàng trong giỏ</a>
				</div>
			</div>
		</form>
	</div>

	@else
	<script>
		alert("Giỏ Hàng Trống!!");
	</script>
	<h3 style="text-align: center;">Giỏ Hàng Trống</h3>
	@endif

</div>



</div>


@endsection
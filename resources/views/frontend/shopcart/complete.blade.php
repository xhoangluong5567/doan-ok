@extends('frontend.partials.master')
@section('content')
<!-- <link rel="stylesheet" href="{{ asset('frontend/css/complete.css') }}"> -->

<div class="container">
    <hr>
    <hr>
    <div id="khach-hang">
        <h3>Thông tin khách hàng</h3>
        <p>
            <span class="info">Khách hàng: </span>
            {{ get_data_user('web','name') }}
            <p>
                <span class="info">Email: </span>
                {{ get_data_user('web','email') }}
            </p>
            <p>
                <span class="info">Điện thoại: </span>
                {{ get_data_user('web','phone') }}
            </p>
            <p>
                <span class="info">Địa chỉ: </span>
                {{ get_data_user('web','address') }}
    </div>
    <div id="hoa-don">
        <h3>Hóa đơn mua hàng</h3>
        <table class="table-bordered table-responsive" style="border:2px;">
            <tr class="bold">
                <td width="30%">Tên sản phẩm</td>
                <td width="25%">Giá</td>
                <td width="20%">Số lượng</td>
                <td width="15%">Thành tiền</td>
            </tr>
            @foreach(Cart::content() as $row)
            <tr>
                 <td>{{ $row->name }}</td>
                    <td class="price">{{ $row->price }}</td>
                    <td>{{ $row->qty }}</td>
                    <td class="price">{{ $row->price*$row->qty }}</td>
                </tr>
                <tr>
                    <td colspan="3">Tổng tiền:</td>
                    <td class="total-price">{{ Cart::subtotal() }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    </table>

    <div id="complete">
        <p class="info">Quý khách đã đặt hàng thành công!</p>
        <p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của
            chúng Tôi</p>
        <p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời
            gian 2 đến 3 ngày, tính từ thời điểm này.</p>
        <p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
        <p>Cám ơn Quý khách đã sử dụng Sản phẩm của chúng Tôi!</p>
    </div>
    <p class="text-right return"><a href="#">Quay lại trang chủ</a></p>
</div>
@endsection

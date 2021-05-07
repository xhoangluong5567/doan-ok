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
                    <td class="price">{{number_format($row->price)  }} vnđ</td>
                    <td>{{ $row->qty }}</td>
                    <td class="price">{{number_format($row->price*$row->qty) vnđ }}</td>
                </tr>
                
            @endforeach
            <tr>
                    <td colspan="3">Tổng tiền:</td>
                    <td class="total-price">{{ Cart::subtotal() }} vnđ </td>
                </tr>
        </table>
    </div>

    </table>

    <div id="complete">
        <p class="info">Quý khách đã đặt hàng thành công!</p>
        <p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của
            chúng tôi</p>
        <p>• Sản phẩm của Quý khách sẽ được chuyển đến địa có trong phần thông tin khách hàng của chúng tôi trong thời
            gian nhanh nhất.</p>
        <p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua số điện thoại trước khi giao hàng.</p>
        <p>Cám ơn Quý khách đã sử dụng Sản phẩm của chúng Tôi!</p>
    </div>
    <p class="text-right return"><a href="#">Quay lại trang chủ</a></p>
</div>
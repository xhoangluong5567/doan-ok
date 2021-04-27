@extends('frontend.partials.master')
@section('content')
@section('title', 'Giỏ Hàng')
<link rel="stylesheet" href="{{ asset('frontend/css/pay.css') }}">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
            <form class="form-horizontal" action="{{ url('/checkout') }}" method="post">
                @csrf 
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading" style="color: white;">Đơn hàng đã đặt  
                        <div class="pull-right"><small><a class="afix-1" href="#">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                                                    @foreach($products as $product)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{{ url('upload') }}/{{$product->options->images}}"/>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                <div class="col-xs-12">{{$product->name}}</div>
                                <div class="col-xs-12"><small>Số lượng:<span>{{$product->qty}}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                <h6><span>Đơn Giá:<br></span>{{number_format($product->price)}}VND</h6>
                                <h6><span>Tổng Giá:<br></span>{{number_format($product->price * $product->qty)}}VND</h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            @endforeach

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng tiền: </strong>
                                    <div class="pull-right" style="color:red; font-weight: bold;"><span>{{Cart::subtotal()}} VND </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading" style="color:white">Thông tin người đặt hàng</div>
                        <div class="panel-body">
                        <div class="form-group">
                              <div class="col-md-12"><strong>Họ tên:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control" value="{{get_data_user('web','name')}}" placeholder="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12"><input type="text" name="email" class="form-control" value="{{get_data_user('web','email')}}" /></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone" class="form-control" value="{{get_data_user('web','phone')}}" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="{{get_data_user('web','address')}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="note" class="form-control" value="" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default check_out"
                            href="{{ url('checkout')}}">Gửi đơn hàng</button></td>
                          
                        </div>
                    </div>
                    
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>





@endsection

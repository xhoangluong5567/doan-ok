@extends('backend.admin')
<title>Dashboard - Chỉnh Sửa Edit</title>


@include('backend.partials.header')

@include('backend.partials.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <section class="content-header">
                    <h1>
                        Chi tiết đơn hàng
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Bill</a></li>
                        <li class="active">List</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container123  col-md-6" style="">
                                        <h4></h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-4">Thông tin khách hàng</th>
                                                    <th class="col-md-6"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Thông tin người đặt hàng</td>
                                                    <td>{{ $user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ngày đặt hàng</td>
                                                    <td>{{ $user->created_at }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Số điện thoại</td>
                                                    <td>{{ $user->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Địa chỉ</td>
                                                    <td>{{ $user->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ghi chú</td>
                                                    <td>{{ $order->note }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <table id="myTable" class="table table-bordered table-hover dataTable" role="grid"
                                        aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting col-md-1">STT</th>
                                                <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                                <th class="sorting col-md-2">Số lượng</th>
                                                <th class="sorting col-md-2">Giá tiền</th>
                                        </thead>
                                        <tbody>
                                            @foreach($order->orders as $key => $bill)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $bill->product->name }}</td>
                                                    <td>{{ $bill->quantity }}</td>
                                                    <td>{{ number_format($bill->price) }} VNĐ</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3"><b>Tổng tiền</b></td>
                                                <td colspan="1"><b class="text-red">{{ ($order->total) }} VNĐ</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <form action="{{ url('admin/bill') }}/{{ $order->id }}"
                                    method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <div class="form-inline">
                                            <label>Trạng thái giao hàng: </label>
                                            <select required name="status" class="form-control input-inline"
                                                style="width: 200px">
                                                <option value="1">Chưa giao</option>
                                                <option value="2">Đang giao</option>
                                                <option value="3">Đã giao</option>
                                            </select>

                                            <input type="submit" value="Xử lý" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

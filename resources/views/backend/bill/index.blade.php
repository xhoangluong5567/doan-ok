@extends('backend.admin')
<title>Dashboard - Bill</title>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


@include('backend.partials.header')

@include('backend.partials.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <section class="content-header">
                    <h1>
                        Danh sách đơn hàng
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Bill</a></li>
                        <li class="active">List</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    @if (Session::has('message'))
                    <div class="alert alert-info"> {{ Session::get('message') }}</div>
                    @endif
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">ID</th>
                                                <th class="sorting_asc col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Tên người order</th>
                                                <th class="sorting col-md-3" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Địa chỉ</th>
                                                <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Ngày đặt hàng</th>
                                                <th>Email</th>
                                                <th>Trạng thái</th>
                                                <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->customer->name }}</td>
                                                <td>{{ $order->customer->address }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->customer->email }}</td>
                                                <td>
                                                    @switch($order->status)
                                                    @case(1)
                                                    Chờ xử lí
                                                    @break
                                                    @case(2)
                                                    Đang giao
                                                    @break
                                                    @case(3)
                                                    Đã giao
                                                    @break
                                                    @endswitch
                                                </td>
                                                <td> <a class=""
                                                    href="{{ route('bill.edit', $order->id) }}"><i class="far fa-eye"></i></i></a>

                                                <form class="delete" style="margin-left: 35px; margin-top: -22px;"
                                                    action="{{ route('bill.destroy', $order->id) }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button style="border: none;" class="">X</button>
                                                </form>
                                            </td>



                                                <!-- <td><a href="{{ url('bill')}}/{{ $order->id }}/edit"><i class="far fa-eye"></i></a>

                                                    <form action="{{ route('bill.destroy',$order->id) }}" method="post" id="formDelete">
                                                        @csrf
                                                        @method("DELETE")
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="submit" name="id" value="X">
                                                    </form>
                                                </td> -->
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
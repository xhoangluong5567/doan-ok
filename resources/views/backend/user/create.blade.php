@extends('backend.admin')
<title>Dashboard - Người Dùng</title>


@include('backend.partials.header')

@include('backend.partials.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Thêm User</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Họ tên:</label>
                                    <input required="abc" type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required type="text" name="email" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label>Password</label><br>

                                    <input required name="password" name="password" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label>Phân Quyền</label>
                                            <select required name="level" class="form-control input-inline"
                                                style="width: 200px">
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>

                                            </select>
                                </div>
                                <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                <a href="{{ route('user.index')}}" class="btn btn-danger">Hủy bỏ</a>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>


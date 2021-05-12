@extends('backend.admin')
<title>Dashboard - Chỉnh Sửa Người Dùng</title>


@include('backend.partials.header')

@include('backend.partials.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thương Hiệu</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Sửa Thương Hiệu</div>
                <div class="panel-body">
                    <form action="{{ route('user.update', $user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" value="{{$user->password }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Phân Quyền</label>
                                            <select required name="level" class="form-control input-inline"
                                                style="width: 200px">
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>

                                            </select>
                                </div>
                        
									<!-- <textarea required name="desc" style="width: 700px; height: 200px"></textarea> -->
                                </div>
                            </div>
                        </div>
                        <div class="btn giua" style="width: 100%;">
                                <input type="submit" name="submit" value="Update" class="btn btn-primary" >
                                <a href="{{ route('user.index')}}" class="btn btn-danger">Hủy bỏ</a>
                            </div>
                        </div>
			</div>
                        
                        <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>




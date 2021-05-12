@extends('backend.admin')
<title>Dashboard - Sửa Sản Phẩm</title>


@include('backend.partials.header')

@include('backend.partials.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thương Hiệu</h1>
                <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
                        <li class="#">Sửa danh mục</li>
                    </ol>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Sửa danh mục</div>
                <div class="panel-body">
                    <form action="{{ route('categories.update', $categories->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $categories->name }}" class="form-control">
                                </div>
                        
									<!-- <textarea required name="desc" style="width: 700px; height: 200px"></textarea> -->
                                </div>
                            </div>
                        </div>
                        <div class="btn giua" style="width: 100%;">
                                <input type="submit" name="submit" value="Update" class="btn btn-primary" >
                                <a href="{{ route('categories.index')}}" class="btn btn-danger">Hủy bỏ</a>
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




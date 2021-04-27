@extends('backend.admin')
<title>Dashboard - Thêm Danh Mục</title>


@include('backend.partials.header')

@include('backend.partials.sidebar')
@section('content')
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
    @if (Session::has('success'))

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Them thanh cong</strong>{{Session::get('success')}}
    </div>
    @endif
    
        <div class="col-lg-12">
            <h1 class="page-header">Danh mục</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Thêm danh mục</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('categories.index') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input required type="text" name="name" value="{{old('name')}}" class="form-control">
                                    @if ($errors->has('name'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('name')}}</strong></br>
									</span>
									@endif
                                </div>
                                <div class="checkbox">
                                <label><input type="checkbox" name="hot">Noi bat</label>

  </div>
                                <input type="submit" name="submit" value="Thêm" class="btn btn-danger">
                                <a href="{{ route('categories.index')}}" class="btn btn-danger">Hủy bỏ</a>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


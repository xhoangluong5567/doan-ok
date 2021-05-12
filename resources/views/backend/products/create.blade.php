@extends('backend.admin')
<title>Dashboard - Thêm Sản Phẩm</title>


@include('backend.partials.header')

@include('backend.partials.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sản phẩm</h1>
			<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
                        <li class="#">Thêm sản phẩm</li>
                    </ol>
		</div>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">
				<div class="panel-heading">Thêm sản phẩm</div>
				<div class="panel-body">

					<form method="post" action="{{ route('products.index') }}" enctype="multipart/form-data">
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group">
									<label>Tên sản phẩm</label>
									<input required type="text" name="name" value="{{old('name')}}" class="form-control">
									@if ($errors->has('name'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('name')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Giá sản phẩm</label>
									<input required type="number" name="price" class="form-control" value="">
									@if ($errors->has('price'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('price')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Số lượng sản phẩm</label>
									<input required type="text" name="quantity" class="form-control" value="">
								</div>
								<div class="form-group">
                                    <label>Ảnh chi tiết sản phẩm</label>
                                    <input type="file" multiple class="form-control-file" value="{{old(' images ')}}" name="images">
									@if ($errors->has('images'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('images')}}</strong></br>
									</span>
									@endif
                                    
                                </div>
								<div class="form-group">
                                    <label>Ảnh phụ</label>
                                    <input type="file" multiple class="form-control-file" value="{{old('images_phu')}}" name="images_phu[]">
									@if ($errors->has('images_phu'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('images_phu')}}</strong></br>
									</span>
									@endif
                                    
                                </div>
								
								<div class="form-group">
									<label>Bảo hành</label>
									<input required type="text" name="warranty" class="form-control" value="12 tháng">
								</div>
								<div class="form-group">
									<label>Phụ kiện</label>
									<input required type="text" name="accessories" class="form-control" value="Cáp - Sạc -Tai nghe">
								</div>
								<div class="form-group">
									<label>% Khuyến mãi</label>
									<input required type="text" name="discount" class="form-control" value="">
								</div>
								<div class="form-group">
									<label>Tình trạng</label>
									<input required type="text" name="status" class="form-control" value="Nguyên Seal - Chính Hãng">
								</div>
								<div class="form-group">
									<label>Miêu tả</label>
									<textarea id="my-editor" name="desc" value="{{ old ('desc') }}" class="form-control"></textarea>
									@if ($errors->has('desc'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('desc')}}</strong></br>
									</span>
									@endif
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
CKEDITOR.replace('my-editor', options);
</script>
								</div>
								<div class="form-group">
									<label>Danh mục</label>

									<?php $categories = App\Category::all() ?>
									<select required name="categories_id" class="form-control"><br />
										@foreach($categories as $categories)
										<option value="{{$categories->id}}">{{ $categories->name }}</option>
										@endforeach
									</select>

								</div>
								
								<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
								<a href="#" class="btn btn-danger">Hủy bỏ</a>
							</div>
						</div>
						{{csrf_field()}}
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
</div>
<!--/.main-->
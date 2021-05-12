@extends('backend.admin')
<title>Dashboard - Sửa Sản Phẩm</title>


@include('backend.partials.header')

@include('backend.partials.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm</h1>
            <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
                        <li class="#">Sửa sản phẩm</li>
                    </ol>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Sửa sản phẩm</div>
                <div class="panel-body">
                    <form action="{{ route('products.update', $products->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $products->name }}" class="form-control">
                                </div>
                                <div class="form-group">
									<label>% Khuyến mãi</label>
									<input required type="text" name="discount" class="form-control" value="{{$products->discount}}">
								</div>
                                <div class="form-group">
									<label>Số lượng sp</label>
									<input required type="text" name="quantity" class="form-control" value="{{$products->quantity}}">
								</div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input required type="nuuber" name="price" value="{{ $products->price }}" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label><br>
                                    <img id="avatar" multiple class="form-control-file" width="300px" src="{{url('upload')}}/{{$products->images}}">
                                    <input type="file" name="images" multiple class="form-control-file">

                                </div>
                                <div class="form-group">
                                    <label>Ảnh phụ</label>
                                    <input type="file" multiple class="form-control-file" name="images_phu[]">
                                    @foreach($product_images as $anhphu)
                                    <img style="width: 150px; height:150px;" id="images_phu" multiple class="form-control-file" src="{{url('/')}}/{{$anhphu->image}}">
                                    @endforeach
                                </div>



                                <div class="form-group">
                                    <label>Miêu tả</label>
                                    <textarea class="ckeditor" required type="desc" name="desc" value="{{ $products->desc }}">{{ $products->desc }}</textarea>
                                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('description', {
                                            language: 'vi',
                                            filebrowserBrowseUrl: '../../editor/ckfinder/ckfinder.html',
                                            filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
                                            filebrowserUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                            filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                                        });
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label>Brand</label><br>
                                    <?php $categories = App\Category::all() ?>
                                    <select name="categories_id" style="height: 35px; width: 1000px;"><br />
                                        @foreach($categories as $categories)
                                        <option value="{{$categories->id}}">{{ $categories->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
                        <a href="{{ route('products.index')}}" class="btn btn-danger">Hủy bỏ</a>
                </div>
            </div>
            </>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
<!--/.row-->
</div>
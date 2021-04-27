@extends('backend.admin')
<title>Dashboard - Danh Mục</title>


@include('backend.partials.header')

@include('backend.partials.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách danh mục</div>
                    <div class="panel-body">
                         <div class="bootstrap-table">
                              <div class="table-responsive">
                                  <a href="{{ asset('admin/categories/create') }}" class="btn btn-primary">Thêm danh mục</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Thuong hieu</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Sua</th>
                                        <th scope="col">Xoa</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $categories)
                                        <tr>
                                            <th scope="row">{{ $categories->id }}</th>
                                            <td>{{ $categories->name }}</td>
                                            <td>{{ $categories->status }}
                                            <a href="{{route('backend.categories.index',['active',$categories->id])}}" class="label {{$categories->getStatus($categories->active)['class']}}">{{$categories->getStatus($categories->active)['name']}}</a> 
                                    </td>

                                    <td> <a class="btn btn-warning" href="{{ route('categories.edit', $categories->id) }}">Edit</a> </td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $categories->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                                    <button style="border: none;" class="">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

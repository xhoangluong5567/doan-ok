@extends('backend.admin')
<title>Dashboard - Người Dùng</title>


@include('backend.partials.header')

@include('backend.partials.sidebar')


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <!-- <form action="/search" method="get" style="margin-bottom:20px;" class="form-inline">
  <div class="form-group" >
    <input type="text" class="form-control" name="search" placeholder="Tên sản phẩm..." value="">
  
  </div>
  
  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> </button>
  <option></option>
</form> -->


    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách User</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <a href="{{ asset('admin/user/create') }}" class="btn btn-primary">Thêm User</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Họ Tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Quyền:</th>
                                        <th scope="col">Thao tác</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="">************</td>
                                            <td>
                                                        @switch($user->level)
                                                        @case(0)
                                                        User
                                                        @break
                                                        @case(1)
                                                        Admin
                                                        @break
                                                        @endswitch
                                                    </td>


                                            <td> <a class=""
                                                    href="{{ route('user.edit', $user->id) }}"><i
                                                        class="fa fa-edit"></i></a>

                                                <form class="delete" style="margin-left: 35px; margin-top: -22px;"
                                                    action="{{ route('user.destroy', $user->id) }}"
                                                    method="POST">
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

                    </div>



                </div>

                <div class="clearfix"></div>
            </div>

        </div>

    </div>

</div>

<!--/.row-->
</div>

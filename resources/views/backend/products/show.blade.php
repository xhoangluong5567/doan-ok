@extends('layouts.admin')
@section('title', 'Danh sach product')

@section('content') -->

@foreach
<table border="1">
    <tr>
        <td>ID</td>
        <td>Product Name</td>
        <td>Price</td>
        <td>Decripsion</td>

    </tr>
    <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->desc}}</td>


        <?php $brand = App\Category::find($products->brand_id) ?>
        <td> {{ $brand->name }}</td>

    
    </tr>

</table>

@endforeach

@endsection
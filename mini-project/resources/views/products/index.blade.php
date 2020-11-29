@extends('layouts.master')

@section('title')
Products
@endsection

@section('content')
<a href="{{route('product.create')}}" class="btn btn-primary">Create New Product</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Stock</th>
        <th scope="col">Price</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Image</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->created_at}}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <img width="30%" src="{{ url('storage/products/'.$product->image) }}" alt="Image"/>
                </td>
                <td>
                    <a href="{{'/products/show/'.$product->id}}" class="btn btn-outline-primary">View</a>
                    <a href="{{'/products/update/'.$product->id}}" class="btn btn-outline-warning">Edit</a>
                    <a href="{{route('product.delete', $product->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
    {{$products->links()}}
@endif
@endsection

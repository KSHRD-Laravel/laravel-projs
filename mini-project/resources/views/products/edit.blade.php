@extends('layouts.master')

@section('title')
Create Product
@endsection

@section('content')
<form action="{{url('/products/edit/'.$product->id)}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
    <input value="{{$product->name}}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name">

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input value="{{$product->description}}" name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product description">

      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Stock</label>
        <input value="{{$product->stock}}" name="stock" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product stock">

      </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input value="{{$product->price}}" name="price" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product price">

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

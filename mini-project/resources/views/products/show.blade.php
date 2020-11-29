@extends('layouts.master')
@section('title')
Product Detail
@endsection

@section('content')
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{url("storage/products/$product->image")}}" alt="Card image cap">
    <div class="card-body">
        <h3 class="card-title">{{$product->name}}</h3>
        <p class="card-text">{{$product->description}}</p>

        <p id="created_at">{{$product->created_at}}</p>
        <p id="updated_at">{{$product->updated_at}}</p>
    </div>
</div>
@endsection

@section('script')
@parent
<script>
    let created = document.getElementById('created_at')
    created.innerText = moment(created.innerText).fromNow();

    let updated_at = document.getElementById('updated_at')
    updated_at.innerText = moment(updated_at.innerText).fromNow();
</script>
@endsection

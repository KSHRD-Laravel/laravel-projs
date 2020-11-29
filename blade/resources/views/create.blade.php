@extends('layout.master')
@section('content')
<div class="container">
<form action="/articles/create" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>

      <input type="text" class="form-control" name="title" placeholder="Enter title">

      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <input type="text" class="form-control" name="description" placeholder="Enter description">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection

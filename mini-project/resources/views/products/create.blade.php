@extends('layouts.master')

@section('title')
Create Product
@endsection

@section('content')
<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name" value="{{old('name')}}">
      @error('name')
        <small id="emailHelp" class="form-text" style="color: red">Please input name.</small>
      @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product description">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Stock</label>
        <input name="stock" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product stock">
      </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input name="price" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product price">
    </div>

    <div class="custom-file">
        <input name="image" type="file" class="custom-file-input" id="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>

    <img id="preview" width="50%"/>

    <hr>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#image").change(function() {
            readURL(this);
        });
    })
</script>
@endsection

@extends('layout.master')
@section('content')
    <div class="container">
        <form action="/login" method="POST">
            @csrf
            <input class="form-control" type="text" name="email" placeholder="Email">
            <input class="form-control" type="password" name="password" placeholder="Password">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src={{asset('js/bootstrap.min.js')}}></script>
</body>
</html>
@endsection

@extends('layout.master')
@section('content')
<div class="container">
<a href="/articles/create">Create Article</a>
<table class="table" border="1">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Created At</th>
      </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->description}}</td>
                <td>{{$article->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{!! $articles->links() !!}}
@endsection

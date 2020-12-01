@extends('layout.app')
@section('content')

<a class="btn btn-secondary" href="/posts">Back</a>
<div class="card" style="width: 100%">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
    <div class="card-body">
        <h5 class="card-title">
           {{$posts->title}}
        </h5>
        <p class="card-text">{{$posts->body}}</p>
        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
        <a href="/posts/{{$posts->id}}/edit" class="btn-sm btn-outline-primary">Edit</a>

        <form method="POST" action="{{action('App\Http\Controllers\PostsController@destroy', $posts->id)}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>

@endsection
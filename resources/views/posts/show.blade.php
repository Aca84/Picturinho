@extends('layout.app')
@section('content')

<a class="btn btn-secondary mb-2" href="/posts">Back</a>
{{-- <div class="card" style="width: 100%"> --}}
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
    {{-- <div class="card-body">
        <h5 class="card-title">
           {{$posts->title}}
        </h5>
        <p class="card-text">{!!$posts->body!!}</p>

        <a href="/posts/{{$posts->id}}/edit" class="btn-sm btn-outline-primary">Edit</a>
        <form method="POST" action="{{action('App\Http\Controllers\PostsController@destroy', $posts->id)}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div> --}}
{{-- </div> --}}

<div class="card mb-3" style="max-width: 100%">

    <div class="row no-gutters">
      {{-- <div class="image w-50 p-3">
        <img src="https://dummyimage.com/300x200/000/fff&text=Dummy+picture" class="card-img" alt="...">
      </div> --}}

      <div class="clearfix p-3 w-100">
        <div class="card-body">
            
            <h4 class="card-title">
                <a class="text-decoration-none text-dark" href="/posts/{{$posts->id}}">{{$posts->title}}</a>
            </h4>

            <img src="https://dummyimage.com/300x200/000/fff&text=Dummy+picture" class="card-img w-50 float-right p-1" alt="...">
            <p class="clearfix h-100">
                {!!$posts->body!!}
            </p>
            <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
            </p>
        {{-- </div> --}}

        <div class="d-flex justify-content-end">
            <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary text-decoration-none mx-2">Edit</a>
            <form method="POST" action="{{action('App\Http\Controllers\PostsController@destroy', $posts->id)}}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger float-right">Delete</button>
            </form>
        </div>
            </div>
      </div>
    </div>
{{-- </div> --}}

@endsection
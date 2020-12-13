@extends('layouts.app')
@section('content')

{{-- Back button --}}
<a class="text-secondary mb-2" href="/posts"><i class="far fa-arrow-alt-circle-left fa-2x">back</i></a>

<div class="card mb-3" style="max-width: 100%">

    <div class="row no-gutters">

    <div class="clearfix p-3 w-100">
        <div class="card-body">
     
            <h4 class="card-title">
                <a class="text-decoration-none text-dark" href="/posts/{{$posts->id}}">{{$posts->title}}</a>
            </h4>

            <img src="/storage/images/{{$posts->image}}" class="card-img w-50 float-right p-1" alt="Slika">
            <p class="clearfix h-100">
                {!!$posts->body!!}
            </p>
            <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
            </p>
        {{-- </div> --}}
        {{-- Check if logged user is auth user for edit/delete post --}}
        @if(Auth::user()->id == $posts->user_id) 
        <div class="d-flex justify-content-end">
            <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary text-decoration-none mx-2">Edit</a>
            <form method="POST" action="{{action('App\Http\Controllers\PostsController@destroy', $posts->id)}}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger float-right">Delete</button>
            </form>
        </div>
        @endif
    </div>
    </div>
</div>

@endsection
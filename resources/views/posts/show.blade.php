@extends('layouts.app')
@section('content')

{{-- Back button --}}
@if(Auth::check() && Auth::user()->id == $posts->user_id)
    <a class="text-secondary mb-2" href="/home"><i class="far fa-arrow-alt-circle-left fa-2x">back</i></a>
@else {{-- For guest back button --}}
    <a class="text-secondary mb-2" href="/posts"><i class="far fa-arrow-alt-circle-left fa-2x">back</i></a>
@endif

<div class="card-deck">
    <div class="card w-100">
        <div class="row w-100 no-gutters">
            <div class="col-6 h-100">
                <a href="/posts/{{$posts->id}}">
                    <img src="/storage/images/{{$posts->image}}" class="card-img responsive" alt="Slika">
                </a>
            </div>
            <div class="col-6 card m-0 p-2">
                <h4 class="card-title mt-2">
                    <a class="text-decoration-none text-dark" href="/posts/{{$posts->id}}">{{$posts->title}}</a>
                </h4>
                <p class="card-text text-left">{!!$posts->body!!}</p>
                <p class="card-text">
                    <small class="text-muted">by {{$posts->user['name']}} on {{$posts->created_at->format('d-m-yy H:i')}}</small>
                </p>
                @if (!Auth::guest())
                {{-- Check if logged user is auth user for edit/delete post --}}
                @if(Auth::user()->id == $posts->user_id) 
                <div class="card-footer position-static d-flex justify-content-end">
                    <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary text-decoration-none mx-2"><i class="far fa-edit"></i></a>
                    <form method="POST" action="{{action('App\Http\Controllers\PostsController@destroy', $posts->id)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger float-right"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
                @endif
                @endif
            </div>      
        </div>
    </div>
</div>
@endsection
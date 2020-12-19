@extends('layouts.app')

@section('content')

<p>Founded {{$posts->count()}} result's for "{{request()->input('searchQuery')}}" </p>
@if(count($posts)>0)

<div class="card-deck">
    @foreach ($posts as $post)

    <div class="row w-100 mb-3 no-gutters">
        <div class="col-4 h-100">
            <a href="/posts/{{$post->id}}">
                <img src="/storage/images/{{$post->image}}" class="card-img rounded" alt="Slika">
            </a>
        </div>
        <div class="col-8 card p-2 ml-1">
            <h4 class="card-title mt-2">
                <a class="text-decoration-none text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a>
            </h4>
            <p class="card-text h-100">{!!$post->body!!}</p>
            @if (!Auth::guest())
                {{-- Check if logged user is auth user for edit/delete post --}}
            @if(Auth::user()->id == $post->user_id) 
            <div class="card-footer d-flex justify-content-end">
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary text-decoration-none mx-2"><i class="far fa-edit"></i></a>
                <form method="POST" action="{{action('App\Http\Controllers\PostsController@destroy', $post->id)}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger float-right"><i class="far fa-trash-alt"></i></button>
                </form>
            </div>
            @endif
            @endif
        </div>     
    </div>

    @endforeach
</div>

@else
    <h3>Nothing found</h3>
@endif

@endsection
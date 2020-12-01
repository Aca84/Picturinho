@extends('layout.app')
@section('content')
    <h2>Posts</h2> 

    {{-- Create post button --}}
    <a class="btn btn-secondary" href="/posts/create">Create</a>

    @foreach ($posts as $post)

        <div class="card my-2" style="width: 18rem;">
            {{-- <img src="..." class="card-img-top" alt="..."> --}}
            <div class="card-body">
                <h5 class="card-title">
                    <a class="text-decoration-none text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a>
                </h5>
                <p class="card-text">{{$post->body}}</p>
                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
            </div>
        </div>
    
    @endforeach
@endsection
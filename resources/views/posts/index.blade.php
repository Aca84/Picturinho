@extends('layouts.app')
@section('content')

<div class="card-columns">

    @foreach ($posts as $post)
        <div class="card shadow-sm">
            <a href="/posts/{{$post->id}}">
                {{-- <img src="/storage/images/{{$post->image}}" class="card-img-top" alt="Slika"> --}}
                <img src= "{{asset('/storage/images/'.$post->user['name'].'/'.$post->image)}}" class="card-img-top" alt="Slika">
            </a>
            <div class="card-body">
                <h5 class="card-title">
                    <a class="text-decoration-none text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a>
                </h5>
                {{-- <p class="card-text">{!!$post->body!!}</p> --}}
                <p class="card-text"><small class="text-muted">by {{$post->user['name']}} on {{$post->created_at->format('d-m-yy H:i')}}</small></p>
            </div>
        </div>         
    @endforeach

</div>
    {{-- Pagination --}}
    <div class="pagination justify-content-center mt-3">{{$posts->links()}}</div>     
@endsection
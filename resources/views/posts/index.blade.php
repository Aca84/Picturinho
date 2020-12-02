@extends('layouts.app')
@section('content')
    <h2>Posts</h2> 

    {{-- Create post button
    <a class="btn btn-secondary my-2" href="/posts/create">Create</a> --}}

{{-- <div class="row row-cols-1 row-cols-md-2"> --}}
<div class="card-columns">

    @foreach ($posts as $post)

            <div class="card">
              <img src="https://dummyimage.com/300x200/000/fff&text=Dummy+picture" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><a class="text-decoration-none text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a></h5>
                <p class="card-text">{!!$post->body!!}</p>
                <p class="card-text"><small class="text-muted">by {{$post->user['name']}} 
                    on {{$post->created_at->format('d-m-yy H:i')}}</small></p>
              </div>
            </div>
                
    @endforeach

</div>
    {{-- Pagination --}}
    <div class="pagination justify-content-center w-100">{{$posts->links()}}</div>     
@endsection
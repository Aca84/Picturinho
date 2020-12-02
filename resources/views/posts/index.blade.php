@extends('layouts.app')
@section('content')
    <h2>Posts</h2> 

    {{-- Create post button --}}
    <a class="btn btn-secondary my-2" href="/posts/create">Create</a>

{{-- <div class="row row-cols-1 row-cols-md-2"> --}}
<div class="card-columns">

    @foreach ($posts as $post)

          {{-- <div class="row row-cols-1 row-cols-md-2"> --}}

            {{-- <div class="col mb-4">
              <div class="card">
                <img src="https://dummyimage.com/300x200/000/fff&text=Dummy+picture" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                  <p class="card-text">{!!$post->body!!}</p>
                </div>
              </div>
            </div> --}}
            
          {{-- </div> --}}
          {{-- <div class="card-columns"> --}}
            <div class="card">
              <img src="https://dummyimage.com/300x200/000/fff&text=Dummy+picture" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{!!$post->body!!}</p>
              </div>
            </div>
                
    @endforeach

</div>

    {{-- Pagination --}}
    <div class="pagination justify-content-center w-100">{{$posts->links()}}</div>     
@endsection
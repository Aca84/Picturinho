@extends('layout.app')
@section('content')
    <h2>Posts</h2> 

    {{-- Create post button --}}
    <a class="btn btn-secondary my-2" href="/posts/create">Create</a>

    @foreach ($posts as $post)

        {{-- <div class="card my-2" style="width: 18rem;">
            {{-- <img src="..." class="card-img-top" alt="..."> --}}
            {{-- <div class="card-body"> --}}
                {{-- <h5 class="card-title"> --}}
                    {{-- <a class="text-decoration-none text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a> --}}
                {{-- </h5> --}}
                {{-- <p class="card-text">{!!$post->body!!}</p> --}}
                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
            {{-- </div> --}}
        {{-- </div> --}}

        <div class="card mb-3" style="max-width: 100%">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="https://dummyimage.com/300x200/000/fff&text=Dummy+picture" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">
                    <a class="text-decoration-none text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a>
                  </h5>
                  <p class="card-text">{!!$post->body!!}</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
                
    @endforeach
    {{-- Pagination --}}
    <div class="pagination justify-content-center w-100">{{$posts->links()}}</div>     
@endsection
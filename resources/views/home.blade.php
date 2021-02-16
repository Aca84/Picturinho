@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Dashboard') }}
        <small class="float-right">Ukupno: {{$posts->total()}}</small>
    {{-- </div> --}}

    <div class="card-body">
        {{-- Pagination --}}
    <div class="pagination justify-content-center w-100 mt-3">{{$posts->links()}}</div>
    </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        {{-- {{ __('You are logged in!') }} --}}
        <div class="card-deck">
            @foreach ($posts as $post)

            <div class="row w-100 mb-3 no-gutters">
                <div class="col-4 h-100">
                    <a href="/posts/{{$post->id}}">
                        {{-- <img src="/storage/images/{{$post->image}}" class="card-img" alt="Slika"> --}}
                        <img src={{asset('/storage/images/'.$post->user['name'].'/'.$post->image)}} class="card-img" alt="Slika">
                    </a>
                </div>
                <div class="col-8 card p-2 ml-1">
                    <h4 class="card-title mt-2">
                        <a class="text-decoration-none text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a>
                    </h4>
                    <p class="card-text h-100">{!!$post->body!!}</p>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary text-decoration-none mx-2"><i class="far fa-edit"></i></a>
                        <form method="POST" action="{{action('App\Http\Controllers\PostsController@destroy', $post->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger float-right"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>      
            </div>

            @endforeach
        </div>
        {{-- Pagination --}}
    <div class="pagination justify-content-center w-100 mt-3">{{$posts->links()}}</div>
</div>
{{-- </div>
</div> --}}
@endsection
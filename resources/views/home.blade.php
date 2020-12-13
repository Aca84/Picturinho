@extends('layouts.app')

@section('content')

{{-- <div class="container"> --}}
    {{-- <div class="row justify-content-center"> --}}
        {{-- <div class="col-md-8"> --}}
            <div class="card">
                <div class="card-header">
                  {{ __('Dashboard') }}
                  <small class="float-right">Ukupno:  {{$posts->total()}}</small>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                  <div class="card-deck">

                    @foreach ($posts as $post)
                    {{-- {{$post->title}}
                    {!!$post->body!!} --}}
                    {{-- <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                                <th scope="col-3">Img</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>{{$post->title}}</td>
                                <td>{!!$post->body!!}</td>
                                <td>
                                  <a href="/posts/{{$post->id}}/edit" class="btn btn-primary text-decoration-none mx-2">Edit</a>
                                  <form method="POST" action="{{action('App\Http\Controllers\PostsController@destroy', $post->id)}}">
                                      @method('DELETE')
                                      @csrf
                                      <button type="submit" class="btn btn-danger float-right">Delete</button>
                                  </form>
                                </td>
                              </tr>
                             
                            </tbody>
                          </table> --}}
                      {{-- </div> --}}
                      {{-- <div class="card-deck"> --}}
                        <div class="card">
                          <img src="/storage/images/{{$post->image}}" class="card-img-top" alt="Slika">
                          <div class="card-body">
                            <h5 class="card-title"><a class="text-decoration-none text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a></h5>
                            <p class="card-text">{!!$post->body!!}</p>
                            {{-- <p class="card-text"> --}}

                              <div class="card-footer d-flex justify-content-end">
                                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary text-decoration-none mx-2">Edit</a>
                                <form method="POST" action="{{action('App\Http\Controllers\PostsController@destroy', $post->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger float-right">Delete</button>
                                </form>
                              </div>

                            {{-- </p> --}}
                          </div>
                        </div>
                                            
                    @endforeach
                  </div>
                  {{-- Pagination --}}
                  <div class="pagination justify-content-center w-100 mt-3">{{$posts->links()}}</div>     
                </div>
            </div>
        </div>
    {{-- </div> --}}
{{-- </div> --}}
@endsection

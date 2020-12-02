@extends('layouts.app')

@section('content')

{{-- <div class="container"> --}}
    {{-- <div class="row justify-content-center"> --}}
        {{-- <div class="col-md-8"> --}}
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @foreach ($posts as $post)
                    {{-- {{$post->title}}
                    {!!$post->body!!} --}}
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                                <th scope="col">Img</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>{{$post->title}}</td>
                                <td>{!!$post->body!!}</td>
                                <td>Slika</td>
                              </tr>
                             
                            </tbody>
                          </table>
                      </div>
                        
                    @endforeach
                    {{-- Pagination --}}
    <div class="pagination justify-content-center w-100">{{$posts->links()}}</div>     
                </div>
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
{{-- </div> --}}
@endsection

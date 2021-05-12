@extends('layouts.app')
@section('content')
    
    {{-- <caption>List of Posts</caption> --}}

    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Users</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Posts</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Items</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        users
        @include('admin/users')
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        posts
        @include('admin/posts')
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">items</div>
    </div>

        {{-- <div class="table-responsive border-primary bg-light rounded">
            <table class="table"> 
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Created</th>
                    <th scope="col">Posts</th>
                    <th scope="col">Rola</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead> 
            @foreach ($users as $user)         
                <tbody>
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->format('d-m-yy H:i')}}</td>
                    <td>{{$user->posts->count()}} 
                        {{-- Not working --}}
                        {{-- <a class="text-decoration-none text-dark" href="/home/{{$user->user_id}}">>></a></td> --}} 
                    {{-- <td> --}}
                        {{-- {{ $user->role }} --}}
                        {{-- <select name="role" id="">
                            <option value="{{ $user->role }}">{{ $user->role }}</option>  
                            <option value="{{ $user->role }}">user</option>  
                        </select>              --}}
                    {{-- </td> --}}
                    {{-- <td>edit</td> --}}
                    {{-- <td>delete</td> --}}
                    {{-- </tr> --}}
                {{-- </tbody>
            @endforeach
            </table>
        </div> --}}
   
@endsection

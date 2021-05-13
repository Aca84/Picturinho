@extends('layouts.app')
@section('content')
    
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Users</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="false">Posts</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="items-tab" data-toggle="tab" href="#items" role="tab" aria-controls="items" aria-selected="false">Items</a>
        </li>
    </ul>
    
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
        Users
        @include('admin/users')
    </div>
    <div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="posts-tab">
        Posts
        @include('admin/posts')
    </div>
    <div class="tab-pane fade" id="items" role="tabpanel" aria-labelledby="items-tab">
        Items
    </div>
    </div>
   
@endsection

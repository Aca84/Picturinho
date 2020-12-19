@extends('layouts.app')
@section('content')

<form method="POST" action="{{action('App\Http\Controllers\PostsController@update', $posts->id)}}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <input type="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title" value="{{$posts->title}}">
    </div>
    <div class="form-group">
      <label for="bodyText">Body</label>
      <textarea class="form-control" placeholder="Body" id="editor" name="body" rows="10">{{$posts->body}}</textarea>
    </div>
    <div class="form-group w-25 float-left">
      <input type="file" class="form-control-file w-25 " id="fileUpload" name="image">
    </div>
    <button type="submit" class="btn btn-warning w-25 rounded float-right">Update</button>
</form>
@endsection
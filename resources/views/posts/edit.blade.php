@extends('layout.app')
@section('content')

<form method="POST" action="{{action('App\Http\Controllers\PostsController@update', $posts->id)}}">
    @method('PATCH')
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <input type="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title" value="{{$posts->title}}">
    </div>
    <div class="form-group">
      <label for="bodyText">Body</label>
    <textarea class="form-control" placeholder="Body" id="textBody" name="body" rows="7">{{$posts->body}}</textarea>
    </div>
    {{-- <div class="input-group mb-3">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="fileUpload" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="uploadFile">Choose file</label>
        </div>
    </div> --}}
    <button type="submit" class="btn btn-warning">Update</button>
</form>
@endsection
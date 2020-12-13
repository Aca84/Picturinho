@extends('layouts.app')
@section('content')


<form method="POST" action="{{action('App\Http\Controllers\PostsController@store')}}" enctype="multipart/form-data">
    @csrf  
    <div class="form-group">
      @error('title')
        <div class="alert alert-danger">{{ $message }}
          <button type="button" class="close" data-dismiss="alert">x</button>
        </div>
      @enderror
        <label for="exampleFormControlInput1">Title</label>
        <input type="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title" class="@error('title') is-invalid @enderror">
    </div>
    <div class="form-group" >
      @error('body')
        <div class="alert alert-danger">{{ $message }}
          <button type="button" class="close" data-dismiss="alert">x</button>
        </div>
      @enderror
        <label for="bodyText">Body</label>
        <textarea class="form-control" placeholder="Body" id="editor"  name="body" rows="10" class="@error('body') is-invalid @enderror" ></textarea>
    </div>

    <div class="form-group w-25 float-left">
      <input type="file" class="form-control-file w-25 " id="fileUpload" name="image">
      @error('image')
        <div class="alert alert-danger">{{ $message }}
          <button type="button" class="close" data-dismiss="alert">x</button>
        </div>
      @enderror
    </div>
      <button type="submit" class="btn btn-success w-25 rounded float-right">Submit</button>
  </form>
@endsection
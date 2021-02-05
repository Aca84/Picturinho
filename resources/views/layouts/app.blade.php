<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Picblog') }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-pro/css/all.css">
        {{-- Bootstrap --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"  type="text/css">
        {{-- CKEditor 5 --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>     
    </head>
    <body>

        {{-- button for return on top of page --}}
        <div onclick="goToTop()" id="onTop" style="font-size: 30px;">
            {{-- <i class="fas fa-hand-point-up"></i> --}}
            <i class="fas fa-angle-double-up"></i>
        </div>
        {{-- <div id="app"> --}}
            @include('include/navbar')
        
                @if (session('success'))
                <div id="alert" class="alert alert-success text-center mx-auto">   
                    <button type="button" class="close" data-dismiss="alert">x</button>     
                    {{session('success')}}
                </div>  
                @endif

            <div class="main">
                @yield('content')
            </div>

            {{-- JS --}}
            <script src="{{ asset('js/main.js') }}"></script>
            {{-- Bootstrap JS --}}
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
            {{-- Mansory Bootstrap JS --}}
            <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
            {{-- CKEditor --}}
            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor' ) )
                    // .then( editor => {
                    // editor.ui.view.editable.element.style.height = '250px'; //textarea height manipulation
                    // } )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
        {{-- </div> --}}
    </body>
</html>

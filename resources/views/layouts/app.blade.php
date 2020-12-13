<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <title>{{ config('app.name', 'Picblog') }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-pro/css/all.css">
        {{-- Bootstrap --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- JS --}}

        {{-- CKEditor 5 --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>     
    </head>
    <body>
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

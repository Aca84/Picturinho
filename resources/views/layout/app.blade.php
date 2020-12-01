<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <title>{{ config('app.name', 'Picblog') }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- JS --}}
        
    </head>
    <body>
        @include('include/navbar')

        <div class="main">
            @yield('content')
        </div>

        {{-- JS --}}
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

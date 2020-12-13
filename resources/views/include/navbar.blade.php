<nav class="navbar navbar-expand-md navbar-light sticky-top bg-white shadow-sm">
    {{-- <div class="m-0"> --}}
        <a class="navbar-brand text-light" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#userMenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="userMenu">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <!-- Right Side Of Navbar -->
            {{-- <ul class="navbar-nav ml-auto"> --}}
            <ul class="navbar-nav justify-content-end mr-0">
                {{-- Search field --}}
                <form class="form-inline border-bottom border-secondary mr-2 w-100">
                    <input class="form-control bg-dark text-light border-0 w-100 fa" type="search" placeholder="&#xf002 Search" aria-label="Search" id="search">
                </form>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                            <a class="nav-link text-light" href="{{ route('login') }}"><i class="fas fa-user"></i></a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('register') }}"><i class="fas fa-user-edit"></i></a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        {{-- Create post --}}
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/posts/create">Create</a>
                            <a class="dropdown-item" href="/home">Home</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    {{-- </div> --}}

</nav>

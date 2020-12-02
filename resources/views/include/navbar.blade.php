{{-- <nav class="navbar sticky-top navbar-dark"> --}}
    {{-- <a class="navbar-brand" href="/posts">Picturinho</a> --}}

{{-- Login-register icons --}}
{{-- <div class="align-items-end">
    <a class="m-1 text-light" href=""><i class="fas fa-user"></i></a>
    <a class="m-1 text-light" href=""><i class="fas fa-user-edit"></i></a>
</div> --}}
{{-- Dropdown menu for loged user --}}
{{-- <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
    <a class="navbar-brand" href="/posts">Picturinho</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
            {{-- Search field --}}
            {{-- <form class="form-inline border-bottom border-dark m-0 w-75">
                <input class="form-control bg-dark text-light border-0 w-100 fa" type="search" placeholder="&#xf002 Search" aria-label="Search" id="search">
            </form>
        </li>
        <li class="nav-item ">
            <a class="m-1 text-light" href=""><i class="fas fa-user"></i></a>
            <a class="m-1 text-light" href=""><i class="fas fa-user-edit"></i></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
    </div> --}}
  {{-- </nav> --}}

{{-- </nav> --}}

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand text-light" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                {{-- Search field --}}
                <form class="form-inline border-bottom border-dark m-0 w-75">
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
    </div>

</nav>
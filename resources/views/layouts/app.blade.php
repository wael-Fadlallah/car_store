<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl'}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Latest compiled and minified JavaScript -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @if (app()->getLocale() == 'en')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @else
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    @endif

    <!-- CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- menu --}}
    {{-- <link href="{{ asset('libraries/mmneu/mmenu.css') }}" rel="stylesheet">
    <script src="{{asset('libraries/mmneu/mmenu.js')}}"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    {{-- datatables --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>

    {{-- font awosame --}}
    <script src="https://kit.fontawesome.com/9765ef6713.js" crossorigin="anonymous"></script>
    {{-- sweet alert --}}
    <script src="{{ asset('libraries/sweetalert/sweetalert.js') }}"></script>
    {{-- <script>
        document.addEventListener(
            "DOMContentLoaded", () => {
                new Mmenu( "#menu", {
                   "extensions": [
                      "pagedim-black",
                      "theme-dark"
                   ],
                   "navbars": [
                      {
                         "position": "bottom",
                         "content": [
                            "<a class='fa fa-envelope' href='#/'></a>",
                            "<a class='fa fa-twitter' href='#/'></a>",
                            "<a class='fa fa-facebook' href='#/'></a>"
                         ]
                      }
                   ]
                });
            }
        );
    </script> --}}
</head>
<body>
    {{-- <nav id="menu">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/work">Our work</a></li>
            <li><span>About us</span>
                <ul>
                    <li><a href="/about/history">History</a></li>
                    <li><span>The team</span>
                        <ul>
                            <li><a href="/about/team/management">Management</a></li>
                            <li><a href="/about/team/sales">Sales</a></li>
                            <li><a href="/about/team/development">Development</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><span>Services</span>
                <ul>
                    <li><a href="/services/design">Design</a></li>
                    <li><a href="/services/development">Development</a></li>
                    <li><a href="/services/marketing">Marketing</a></li>
                </ul>
            </li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </nav> --}}
    <div id="app">
        @guest

        @else
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('lan.dashboard') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::user()->hasRole('SuperAdmin'))
                            <li class="nav-item">
                                <a href="{{Route('cars.create')}}" class="nav-link">{{ __('lan.add_car') }}</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{Route('cars.index')}}" class="nav-link">{{ __('lan.list_cars') }}</a>
                        </li>
                        @if (Auth::user()->hasRole('SuperAdmin'))
                            <li class="nav-item">
                                <a href="{{Route('stores.create')}}" class="nav-link">{{ __('lan.add_store') }}</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{Route('stores.index')}}" class="nav-link">{{ __('lan.stores_list') }}</a>
                        </li>
                        @if (Auth::user()->hasRole('SuperAdmin'))
                            <li class="nav-item">
                                <a href="{{Route('categories.create')}}" class="nav-link">{{ __('lan.add_category') }}</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{Route('categories.index')}}" class="nav-link">{{ __('lan.list_category') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('lan.language') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('lang','ar') }}">
                                    {{ __('lan.arabic') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('lang','en') }}">
                                    {{ __('lan.english') }}
                                </a>
                            </div>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
        @endguest


        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>
    @yield('scripts')

</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>


    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"> -->


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    @yield('styles')
    <style>
body{
    background-color:white;
}
</style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand pr-3" style='border-right:1px solid black;' href="{{ url('/') }}">
                        E-Procurement
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                   @if (Route::has('Register'))
                   @endif
                   @else
                    <ul class="navbar-nav mr-auto">
                            <li class='nav-item'>
                                <a class='nav-link' href="{{ route('home') }}">Home</a>
                            </li>

                            <li class='nav-item'>
                                <a class='nav-link' href="{{url('tenderlist')}}">Tenders</a>
                            </li>

                            <li class='nav-item'>
                                <a class='nav-link' href="">About</a>
                            </li>

                            <li class='nav-item'>
                                <a class='nav-link' href="">Contact</a>
                            </li>
                    </ul>
                    @endguest
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left " aria-labelledby="navbarDropdown">

                                  <a href="{{url('dash')}}" target='_blank' class='dropdown-item'>Dashboard</a>
                                    <!-- <a href="{{url('profile')}}" class='dropdown-item'>Profile</a>
                                    <a href="{{url('uploads')}}" class='dropdown-item'>My Uploads</a>
                                    <a href="{{url('complete')}}" class='dropdown-item'>Tasks Completed</a>
                                    <a href="{{url('progress')}}" class='dropdown-item'>Tasks in Progress</a>
                                    <a href="{{url('award')}}" class='dropdown-item'>All Awards</a> -->
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class='fas fa-power-off pr-2'></i>Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready( function () {
            console.log('jani');
        $('#example').DataTable();
        });
    </script>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* width */
        #search-box::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        #search-box::-webkit-scrollbar-track {
            border-radius: 10px;
        }

        /* Handle */
        #search-box::-webkit-scrollbar-thumb {
            background:#cdbd15;
            border-radius: 10px;
        }

        /* Handle on hover */
        #search-box::-webkit-scrollbar-thumb:hover {
            background:#cdbd15;
        }
        </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-cover bg-center h-screen" style="background-image: url('img/background.png'); background-repeat: no-repeat; overflow: hidden;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/img/logo.png') }}" alt="Logo" style="height: 26px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a href="/login" class="px-4 py-3 font-bold rounded text-xl navlink no-underline" style="color: #CDBD15">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li>
                                    <a href="/register" class="px-4 py-3 font-light rounded text-xl no-underline" style="color: #969696" >Sign Up</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

        <main class=" ">
            @yield('content')
        </main>
    </div>
</body>
</html>

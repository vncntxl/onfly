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
    <head>
        <!-- ... other meta tags and stylesheets ... -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

    </head>
    <link rel="icon" type="image/x-icon" href="/img/favicon.svg" style="height: 10px;">


    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .autocomplete-results {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 999;
            width: 100%;
            margin-top: -5.9rem;
            padding: 0.5rem;
            background-color: #fff;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 0.5rem 0.5rem;
        }

        .autocomplete-results>div {
            padding: 0.5rem;
            cursor: pointer;
        }

        .autocomplete-results>div:hover {
            background-color: #f5f5f5;
        }

        #search-results li {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            width: 100%;
            display: flex;
        }

        #search-results li .pinpoint {
            margin-right: 10px;
        }


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
            background: #cdbd15;
            border-radius: 10px;
        }

        /* Handle on hover */
        #search-box::-webkit-scrollbar-thumb:hover {
            background: #cdbd15;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-cover bg-center h-screen"
    style="background-image: url('img/background.png'); background-repeat: no-repeat; overflow: hidden;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/img/logo.png') }}" alt="Logo" style="height: 26px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                    <a href="/login" class="px-4 py-3 font-bold rounded text-xl navlink no-underline"
                                        style="color: #CDBD15">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li>
                                    <a href="/register" class="px-4 py-3 font-light rounded text-xl no-underline"
                                        style="color: #969696">Sign Up</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <a href="/profile">
                                @if (Auth::user()->profile_picture == null)
                                    <img src="{{ asset('../img/default-profile-picture.png') }}" style="width: 25px; height: 25px; margin-top: -18px; margin-right: 60px;" alt="Default Profile Picture">
                                @else
                                    <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile Picture "  style="width: 25px; height: 25px;
                                    margin-top: -18px;
                                    margin-right: 60px;
                                    border-radius: 50%;
                                    object-fit: cover;">
                                @endif
                                </a>
                             </a>
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

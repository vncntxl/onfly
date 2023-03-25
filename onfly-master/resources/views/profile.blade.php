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
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <style>
            .profile-picture {
              position: relative;
              display: inline-block;
            }

            .profile-picture img {
              width: 150px;
              height: 150px;
              object-fit: cover;
              border-radius: 50%;
            }

            .profile-picture .overlay {
              position: absolute;
              bottom: 0;
              right: 0;
              width: 100%;
              height: 100%;
              background-color: rgba(0, 0, 0, 0.5);
              display: flex;
              justify-content: center;
              align-items: center;
              opacity: 0;
              border-radius: 50%;
              transition: opacity 0.3s ease-in-out;
            }

            .profile-picture:hover .overlay {
              opacity: 1;
            }

            .profile-picture .overlay label {
              color: white;
              cursor: pointer;
            }

            .profile-picture .overlay input[type="file"] {
              display: none;
            }
            </style>

</head>
<script>
    function previewProfilePicture(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.querySelector('.profile-picture img');
        output.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
    </script>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white" style="border-bottom: 1px solid #ccc;">
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

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="">
                    <div class="flex">
                        <a href="/home" class="text-gray-600 hover:text-gray-900 mr-4">
                            <svg width="15" height="30" viewBox="0 0 26 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.8298 5.4L9.68619 18.9L25.8298 32.4L22.6011 37.8L0 18.9L22.6011 0L25.8298 5.4Z" fill="#CDBD15"/>
                            </svg>
                        </a>
                        <div class="card-header text-lg  font-extrabold"> {{ __(' Your Profile') }}</div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="mb-4">
                            <form method="POST" action="/update" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                {{-- <input id="name" type="hidden" class="form-control" name="name"
                                value="{{ Auth::user()->name }}" readonly>
                                <input id="email" type="hidden" class="form-control" name="email"
                                value="{{ Auth::user()->email }}" readonly> --}}
                                <div class=" mb-4">
                                    <div class="profile-picture mx-60">
                                        @if (Auth::user()->profile_picture == null)
                                            <img src="{{ asset('../img/default-profile-picture.png') }}" alt="Default Profile Picture">
                                        @else
                                            <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile Picture">
                                        @endif
                                        <div class="overlay">
                                            <label for="profile-picture-input" class="btn btn-secondary">{{ __('Change Profile Picture') }}</label>
                                            <input id="profile-picture-input" type="file" name="profile_picture" accept="image/*" onchange="previewProfilePicture(event)">
                                        </div>
                                    </div>
                                    <div class="mb-4 border-b border-black py-2">
                                        <label class="block text-gray-700 font-bold" for="email">
                                            Name
                                        </label>
                                        <input id="name" type="text"  class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"  name="name"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="mb-4 border-b border-black py-2">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" name="email"
                                            value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                    <div class="mb-4 border-b border-black py-2">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" name="password" value="********"
                                            disabled>
                                        </div>
                                        <div class="d-grid gap-2 mt-4">
                                            <button type="submit" style="background-color: #CDBD15; border: none; " class="btn btn-primary ">{{ __('Save Changes') }}</button>
                                        </div>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    <div class="d-grid gap-2 mt-4">
                                        <button class="btn btn-danger" type="button"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</button>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

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
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="">
                    <div class="card-header">{{ __('Profile') }}</div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <form method="POST" action="/update" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                {{-- <input id="name" type="hidden" class="form-control" name="name"
                                value="{{ Auth::user()->name }}" readonly>
                                <input id="email" type="hidden" class="form-control" name="email"
                                value="{{ Auth::user()->email }}" readonly> --}}
                                <div class="text-center mb-4">
                                    <div class="profile-picture">
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
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Name') }}</label>
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control" name="password" value="********"
                                            disabled>
                                        </div>
                                        <div class="d-grid gap-2 mt-4">
                                            <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
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

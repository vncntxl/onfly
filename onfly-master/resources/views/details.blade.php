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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <head>
        <!-- ... other meta tags and stylesheets ... -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

    </head>
    <link rel="icon" type="image/x-icon" href="/img/favicon.svg" style="height: 10px;">


    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cabe78b626.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <style>
        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

        .starrating>input {
            display: none;
        }

        /* Remove radio buttons */

        .starrating>label:before {
            content: "\f005";
            /* Star */
            margin: 2px;
            font-size: 2em;
            font-family: FontAwesome;
            display: inline-block;
        }

        .starrating>label {
            color: gray;
            /* Start color when not clicked */
        }

        .starrating>input:checked~label {
            color: #ffca08;
        }

        /* Set yellow color when star checked */

        .starrating>input:hover~label {
            color: #ffca08;
        }

        /* Set yellow color when star hover */


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

        textarea#comment {
            width: 100%;
            max-width: none;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-cover bg-center h-screen" style="background-repeat: no-repeat;">
    <div id="app">
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
        <div class="container mx-auto p-10">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center">
                    <a href="/home" class="text-gray-600 hover:text-gray-900 mr-4">
                        <svg width="15" height="30" viewBox="0 0 26 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25.8298 5.4L9.68619 18.9L25.8298 32.4L22.6011 37.8L0 18.9L22.6011 0L25.8298 5.4Z" fill="#CDBD15"/>
                        </svg>
                    </a>
                    <h1 class="text-3xl font-bold">{{ $place->name }}</h1>
                </div>
            </div>
            <div class="flex items-center mb-6">
                <img src="{{ asset('storage/' . $place->place_picture) }}" alt="{{ $place->name }}"
                    class="w-96 h-64 object-contain mr-8 rounded-md" style="width: 700px; height: 400px;">
                <div style="max-width: 50%;">
                    <h1 class="text-3xl font-bold">{{ $place->name }}</h1>
                    <div class="flex">
                        <i class="fa fa-map-marker mt-2" aria-hidden="true" style="color: red"  ></i>
                        <h2 class="text-lg text-gray-600 mb-2 ml-1">{{ $place->location }}</h2>
                    </div>
                    <p class="text-gray-700 text-lg mb-4 mt-2" style="max-width: 500px;">{{ $place->description }}</p>
                    <div class="flex">
                        <i class="fas fa-star text-yellow-400 mt-2 mr-2"></i>
                        <p class="text-black font-bold text-2xl">{{ $place->getAvgRating() }}</p>
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <hr>
                <h3 class="text-lg font-bold mb-4">Leave a Comment</h3>
                <div class="flex justify-between">

                    <form method="POST" action="{{ route('add_review', $place->id) }}" class="mb-4">
                        @csrf
                        <div class="flex items-center mb-2">
                            <label for="rating" class="mr-2 font-bold">Rating:</label>
                            <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                <input type="radio" id="star5" name="rating" value="5" /><label
                                    for="star5" title="5 star"></label>
                                <input type="radio" id="star4" name="rating" value="4" /><label
                                    for="star4" title="4 star"></label>
                                <input type="radio" id="star3" name="rating" value="3" /><label
                                    for="star3" title="3 star"></label>
                                <input type="radio" id="star2" name="rating" value="2" /><label
                                    for="star2" title="2 star"></label>
                                <input type="radio" id="star1" name="rating" value="1" /><label
                                    for="star1" title="1 star"></label>
                            </div>
                        </div>
                        <div class="w-3/5 flex items-center">
                            <div class="w-24">
                                @if (auth()->check())
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                    <input type="hidden" value="{{ auth()->user()->name }}" name="user_name"
                                        class="w-full px-2 py-1 border border-gray-400 rounded-lg">
                                @else
                                    <input type="text" name="user_name" placeholder="Your name"
                                        class="w-full px-2 py-1 border border-gray-400 rounded-lg">
                                @endif
                            </div>
                            <div class="flex flex-col">
                                <textarea name="comment" id="comment" class="w-full h-24 px-2 py-1 border border-gray-400 rounded-lg mb-4"
                                    placeholder="Write your review here" style= "max-width: none; width: 1300px;"></textarea>
                                <button type="submit"
                                    class="ml-auto bg-yellow-600 text-white px-4 py-1  rounded-lg hover:bg-yellow-700 items-end  ">Comment</button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="flex">

                    <h3 class="text-lg font-bold mb-4 mr-4">Comments</h3>

    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="mb-3 text-black bg-blue-700 hover:bg-blue-800  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" style="background-color: white;">Sort Ratings  <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
    <!-- Dropdown menu -->
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 ">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
          <li>
            <a href="{{ route('place.sort', ['place_name' => $place->name, 'sort' => 'asc']) }}" class="text-black block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" style="text-decoration: none">lowest to highest</a>
          </li>
          <li>
            <a href="{{ route('place.sort', ['place_name' => $place->name, 'sort' => 'desc']) }}" class="text-black block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" style="text-decoration: none"s>highest to lowest</a>
          </li>
        </ul>
    </div>
                </div>



                <div class="divide-y divide-gray-400">
                    @foreach ($reviews as $review)
                        <div class="flex items-start py-4">
                            <div class="flex-shrink-0 mr-4">
                                @if (Auth::user()->profile_picture == null)
                                <img src="{{ asset('../img/default-profile-picture.png') }}" style="width: 50px; height: 50px; ;" alt="Default Profile Picture">
                            @else
                                <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile Picture "  style="width: 50px; height: 50px;
                                border-radius: 50%;
                                object-fit: cover;">
                            @endif
                            </div>
                            <div class="flex-grow">
                                <div class="flex items-center mb-2">
                                    <span class="font-bold mr-2">{{ $review->user_name }}</span>
                                    <span
                                        class="text-gray-600 text-sm">{{ $review->created_at->format('F d, Y') }}</span>
                                </div>
                                <div class="flex items-center mb-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <i class="fas fa-star text-yellow-400"></i>
                                    @else
                                        <i class="far fa-star text-gray-400"></i>
                                    @endif
                                @endfor

                                    <span
                                        class="text-gray-600 text-sm ml-2">{{ $review->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="text-gray-700">{{ $review->comment }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>



    </div>

    {{--
    <h1>{{ $place->name }}</h1>
    <p>{{ $place->location }}</p>
    <p>{{ $place->description }}</p>
    <img src="{{ asset('storage/' . $place->place_picture) }}" alt="{{ $place->name }}">

    <!-- display average rating for the place -->
    <p>Average rating: {{ $place->getAvgRating() }}</p>

    <!-- form to sort the reviews -->
    <a href="{{ route('place.sort', ['place_name' => $place->name, 'sort' => 'asc']) }}">Sort by rating (lowest to highest)</a>
    <a href="{{ route('place.sort', ['place_name' => $place->name, 'sort' => 'desc']) }}">Sort by rating (highest to lowest)</a>
    <!-- display list of previous reviews for the place -->
    <ul>
        @foreach ($reviews as $review)
            <li>{{ $review->rating }} stars - {{ $review->user_name }} - {{ $review->comment }}</li>
        @endforeach
    </ul>

    <!-- form to add new review -->
    <form method="POST" action="{{ route('add_review', $place->id) }}">
        @csrf
        @if (auth()->check())
            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
            <input type="text" value="{{ auth()->user()->name }}" name="user_name">
        @endif

        <label for="rating">Rating (1-5):</label>
        <input type="number" name="rating" id="rating" required min="1" max="5"><br><br>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment"></textarea><br><br>
        <button type="submit">Submit Review</button>
    </form> --}}

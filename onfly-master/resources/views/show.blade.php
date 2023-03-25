@extends('layouts.app')

@section('content')
    <div class="flex h-full items-center justify-center relative max-w-100" style="margin-top: 180px;">
        <div class="flex flex-col items-center justify-center h-screen bg-center bg-cover"
            style="position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);">
            <form action="{{ route('search') }}" method="get">
                {{ csrf_field() }}
                <div class="relative">
                    <input type="text" class="px-20 rounded-xl w-full h-16 mb-20" placeholder="Search..."
                        style="outline: none; width : 600px;" id="search-input" name="search" value="">
                <ul id="search-results" class="autocomplete-results cursor-pointer" style="top: 140px"></ul>
                    <button type="submit"
                        class="absolute border-r left-0 top-2 bottom-0 pl-5 pr-5 h-12 outline-none border-gray-300 rounded button">
                        <img src="img/explore.png" alt="Button Image" style="width: 25px">
                    </button>
            </form>
            <div class="mb-4" style="margin-left: -450px;">
                <form method="GET" action="{{ route('place.sorting', ['query' => $query]) }}">

                    <select name="category_id" id="category_id"
                        class="px-4 py-2 rounded-md border border-gray-300">
                        <option value="" {{ !request('category_id') ? 'selected' : '' }}>All categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == request('category_id') ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <select name="sort" id="sort"
                        class="px-4 py-2 rounded-md border border-gray-300 ml-4">
                        <option value="desc" {{ request('sorting') == 'desc' ? 'selected' : '' }}>Sort by highest rating</option>
                        <option value="asc" {{ request('sorting') == 'asc' ? 'selected' : '' }}>Sort by lowest rating</option>
                    </select>

                    <button type="submit" class="ml-4 px-4 py-2 rounded-md text-white font-bold"
                        style="background-color: #CDBD15;;">Sort</button>
                </form>
            </div>
            <div class="search-results-box absolute bg-white rounded-lg shadow-lg border border-gray-200 z-50"
                style="width: 1500px; left: -450px; height: 550px; overflow-y: scroll;">
                @if (isset($errorMessage))
                    <p>{{ $errorMessage }}</p>
                @elseif (isset($nocategory))
                    <p class="flex text-white">No data found.</p>
                @else
                @foreach ($places as $place)
                <div class="flex mb-4 relative">
                    <a href="{{ route('details', ['name' => $place->name]) }}" style="text-decoration: none;" class="flex w-full">
                        <div class="mr-4 flex">
                            <img src="{{ asset('storage/' . $place->place_picture) }}" alt="{{ $place->name }}"
                                class="w-80 h-48 ml-5 mt-5 object-cover rounded-lg">
                        </div>
                        <div class="flex flex-col justify-center m-4 w-full">
                            <h2 class="text-xl font-bold mt-12" style="color: #000;">{{ $place->name }}</h2>
                            <p class="text-gray-600 ">{{ $place->review_count }} reviews</p>
                            <p class="text-black font-bold mt-3">{{ $place->location }}</p>
                            <div class="absolute top-0 right-0">
                                <div class="flex" style="margin-top: 120px; margin-right: 20px;">
                                    <img src="../img/star.png" alt="" class="" style="height: 30px;">
                                    <div class="ml-2 mt-1">
                                        <p class="text-black font-bold">{{ $place->getAvgRating() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <hr>
            @endforeach


                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            // Get the search input field and results div
            var searchInput = $('#search-input');
            var searchResults = $('#search-results');

            // Create a function to show the autocomplete results
            function showResults(results, query) {
                // Clear the current results
                searchResults.empty();

                // Filter the results based on the search query
                var filteredResults = results.filter(function(result) {
                    return result.name.toLowerCase().indexOf(query.toLowerCase()) !== -1;
                });

                // Loop through the filtered results and add them to the results div
                filteredResults.forEach(function(result) {
                    var li = $('<li></li>').text(result.name);
                    li.click(function() {
                        // Add the clicked text to the search input field
                        searchInput.val(result.name);

                        // Clear the search results
                        searchResults.empty();
                    });
                    searchResults.append(li);
                });
            }

            // Handle keyup events on the search input field
            searchInput.keyup(function() {
                // Get the search query
                var query = searchInput.val();

                if (query.length === 0) {
                    searchResults.empty();
                    return;
                }

                // Make an AJAX request to get the autocomplete results
                $.ajax({
                    url: '/autocomplete',
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(results) {
                        // Show the autocomplete results
                        showResults(results, query);
                    },
                    error: function() {
                        // Show an error message
                        searchResults.html('<li>Error retrieving autocomplete results.</li>');
                    }
                });
            });

            // When the search input is focused, hide the search text
            $('#search-input').on('focus', function() {
                $('.search-text').hide();
            });

            // When the search input is blurred, show the search text if the input is empty
            $('#search-input').on('blur', function() {
                if ($(this).val() === '') {
                    $('.search-text').show();
                }
            });
        });
    </script>

@endsection

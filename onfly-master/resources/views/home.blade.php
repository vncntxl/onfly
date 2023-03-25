@extends('layouts.app')

@section('content')

    <main class="bg-cover bg-center" style="background-image: url('img/background.png');">
        <div class="flex h-full items-center justify-center">
            <div class="flex flex-col items-center justify-center h-screen bg-center bg-cover"
                style="position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);">
                @php
                    $query = $query ?? '';
                @endphp
                <form style="width: 700px;" action="{{ route('search') }}" method="get">
                    {{ csrf_field() }}
                    <div class="relative">
                        <input type="hidden" name="query" value="{{ $query }}">
                        <input type="text" class="px-20 rounded-xl w-full h-16 mb-20" placeholder="Search..."
                            style="outline: none;" id="search-input" name="search" value="{{ $query }}">
                            <ul id="search-results" class="autocomplete-results cursor-pointer" style="top: 140px"></ul>
                            <button type="submit"
                            class="absolute border-r left-0 top-2 bottom-0 pl-5 pr-5 h-12 outline-none border-gray-300 rounded button">
                            <img src="img/explore.png" alt="Button Image" style="width: 25px">
                        </button>
                    </div>
                </form>

                <div class="text-center text-white text-7xl font-extrabold tracking-normal mb-3 search-text"
                    style="font-family: 'Montserrat', sans-serif;">Search Around</div>
                <div
                    class="text-center text-white text-7xl font-extrabold tracking-normal mb-4 search-text"style="font-family: 'Montserrat', sans-serif;">
                    The World</div>
                <div class="text-center text-white font-light text-2xl search-text">Enjoy your life.</div>
            </div>
        </div>
    </main>


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

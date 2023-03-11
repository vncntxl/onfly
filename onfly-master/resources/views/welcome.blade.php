@extends('layouts.app')

@section('content')
    <main class="bg-cover bg-center" style="background-image: url('img/background.png');">
        <div class="flex h-full items-center justify-center">
            <div class="flex flex-col items-center justify-center h-screen bg-center bg-cover"
                style="position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);">
                <form style="width: 700px;" action="{{ route('search') }}" method="get">
                    {{ csrf_field() }}
                    <div class="relative">
                        <input type="text" class="px-20 rounded-xl w-full h-16 mb-20" placeholder="Search..."
                            style="outline: none;" id="search-input" name="search">
                        <ul id="search-results" class="autocomplete-results "></ul>
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
    <a href="/home" src="img/help.png" alt="Help" class="help-button"
        style="
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 50px;
  height: 50px;
  background-image: url('path/to/help-icon.png');
  background-size: contain;
  background-repeat: no-repeat;
  cursor: pointer;">
        </div>
        <script>
            $(function() {
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

                // Handle search input keyup event
                $('#search-input').on('keyup', function() {
                    var query = $(this).val();
                    if (query === '') {
                        // Hide autocomplete results if query is empty
                        $('#search-results').empty();
                        return;
                    }
                    $.ajax({
                        url: "{{ route('search') }}",
                        type: "GET",
                        data: {
                            q: query
                        },
                        success: function(response) {
                            // Clear the search results
                            $('#search-results').empty();
                            // Add each place returned by the server to the search results
                            $.each(response, function(index, place) {
                                $('#search-results').append(
                                    '<li class="autocomplete-item" data-name="' + place.name + '">' +
                                    '<img src="img/iconmonstr-location-1.svg" class="pinpoint" alt="location">' +
                                    place.name + '<br><span class="search-result-location">, ' +
                                    place.location + '</span></li>'
                                );
                            });
                            // Handle autocomplete item click event
                            $('.autocomplete-item').on('click', function() {
                                var name = $(this).data('name');
                                $('#search-input').val(name);
                                $('#search-results').empty();
                            });
                        }
                    });
                });
            });
        </script>

    @endsection

@extends('layouts.app')

@section('content')
<main class="bg-cover bg-center h-screen" style="background-image: url('../img/background.png');">
    <form style="width: 700px;" action="{{ route('test') }}" method="get" class="m-auto ">
        {{ csrf_field() }}
        <div class="relative">
            <input type="text" class="px-20 rounded-xl w-full h-16 mb-20 shadow-md mt-5" placeholder="Enter a location" style="outline: none;" name="query">
            <button type="submit" class="absolute border-r left-0 top-2 bottom-0 pl-5 pr-5 h-12 outline-none border-gray-300 rounded button mt-5">
              <img src="../img/explore.png" alt="Button Image" style="width: 25px">
            </button>
        </div>
    </form>

    <div id="search-results" class="max-w-lg mx-auto my-4 p-4 border rounded-lg">
        @if(isset($places))
            @foreach($places as $place)
                <div class="mb-4">
                    <h2 class="text-lg font-bold">{{ $place['name'] }}</h2>
                    <p>{{ $place['formatted_address'] }}</p>
                </div>
            @endforeach
        @endif
    </div>
</main>
@endsection

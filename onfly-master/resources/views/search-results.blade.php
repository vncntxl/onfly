@extends('layouts.app')

@section('content')
    {{-- <body>
        <div class="container">
            <p>You searched for: {{ $query }}</p>
        </div>
    </body> --}}
    <style>

    </style>
    <main class="bg-cover bg-center h-screen" style="background-image: url('../img/background.png');" style="overflow: hidden;">
    <form style="width: 700px;" action="{{ route('search') }}" method="get" class="m-auto ">
        {{ csrf_field() }}
        <div class="relative">
            <input type="text" class="px-20 rounded-xl w-full h-16 mb-20 shadow-md mt-5" placeholder="You've searched for: '{{ $query }}'" style="outline: none;" name="query">
            <button type="submit" class="absolute border-r left-0 top-2 bottom-0 pl-5 pr-5 h-12 outline-none border-gray-300 button mt-5">
              <img src="../img/explore.png" alt="Button Image" style="width: 25px">
            </button>
          </div>
    </form>
    <div class=" container-fluid">
        <div id="search-box" class="bg-white h-screen w-full rounded-3xl opacity-90 overflow-scroll px-5 py-4	">
        </div>
    </div>
    {{-- <div id="search-results" class="max-w-lg mx-auto my-4 p-4 border rounded-lg">
        @if(isset($places))
            @foreach($places as $place)
                <div class="mb-4">
                    <h2 class="text-lg font-bold">{{ $place['name'] }}</h2>
                    <p>{{ $place['formatted_address'] }}</p>
                </div>
            @endforeach
        @endif
    </div> --}}

</main>

@endsection

@extends('layouts.app')

@section('content')
<form style="width: 700px;" action="{{ route('test') }}" method="get" class="m-auto ">
    {{ csrf_field() }}
    <div class="relative">
        <input type="text" class="px-20 rounded-xl w-full h-16 mb-20 shadow-md mt-5" placeholder="Enter a location" style="outline: none;" name="query">
        <button type="submit" class="absolute border-r left-0 top-2 bottom-0 pl-5 pr-5 h-12 outline-none border-gray-300 rounded button mt-5">
          <img src="../img/explore.png" alt="Button Image" style="width: 25px">
        </button>
    </div>
</form>
        @if(!empty($places))
            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4">Search Results:</h2>
                <ul>
                    @foreach($places as $place)
                        <li class="mb-4">
                            <h3 class="text-xl font-bold">{{ $place['name'] }}</h3>
                            <p class="mb-2">{{ $place['formatted_address'] }}</p>
                            @if(!empty($place['photos']))
                                <img src="{{ $place['photos'][0]['html_attributions'][0] }}" alt="{{ $place['name'] }}" class="mb-2">
                            @endif
                            <p>Rating: {{ $place['rating'] }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

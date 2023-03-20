@extends('layouts.app')

@section('content')
    @if (isset($errorMessage))
        <p>{{ $errorMessage }}</p>
    @else
        <ul>
        @foreach ($places as $place)
            <li><a href="{{ route('details', $place->name) }}">{{ $place->name }} - {{ $place->location }}</a></li>
        @endforeach
        </ul>
    @endif
@endsection

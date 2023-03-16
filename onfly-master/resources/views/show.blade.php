@extends('layouts.app')

@section('content')
    @if (isset($errorMessage))
        <p>{{ $errorMessage }}</p>
    @else
        @foreach ($places as $place)
            <li>{{ $place->name }} - {{ $place->location }}</li>
        @endforeach
    @endif
@endsection

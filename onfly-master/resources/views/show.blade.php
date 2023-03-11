@extends('layouts.app')

@section('content')
    <h1>Search Results for "{{ $query }}"</h1>
    <ul>
        @foreach ($places as $place)
            <li>{{ $place->name }} - {{ $place->location }}</li>
        @endforeach
    </ul>
@endsection

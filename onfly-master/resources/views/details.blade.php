@extends('layouts.app')

@section('content')
    <h1>{{ $place->name }}</h1>
    <p>{{ $place->location }}</p>
    <p>{{ $place->description }}</p>
    <img src="{{ asset('storage/' . $place->place_picture) }}" alt="{{ $place->name }}">
@endsection

@extends('layouts.app')

@section('content')
<form method="GET" action="{{ route('place.filter') }}">
    <label for="category_id">Select a category:</label>
    <select name="category_id" id="category_id">
        <option value="" {{ !request('category_id') ? 'selected' : '' }}>All categories</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == request('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form>


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

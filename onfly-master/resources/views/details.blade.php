
    <h1>{{ $place->name }}</h1>
    <p>{{ $place->location }}</p>
    <p>{{ $place->description }}</p>
    <img src="{{ asset('storage/' . $place->place_picture) }}" alt="{{ $place->name }}">

    <!-- display average rating for the place -->
    <p>Average rating: {{ $place->getAvgRating() }}</p>

    <!-- form to sort the reviews -->
    <a href="{{ route('place.sort', ['place_name' => $place->name, 'sort' => 'asc']) }}">Sort by rating (lowest to highest)</a>
    <a href="{{ route('place.sort', ['place_name' => $place->name, 'sort' => 'desc']) }}">Sort by rating (highest to lowest)</a>
    <!-- display list of previous reviews for the place -->
    <ul>
        @foreach ($reviews as $review)
            <li>{{ $review->rating }} stars - {{ $review->user_name }} - {{ $review->comment }}</li>
        @endforeach
    </ul>

    <!-- form to add new review -->
    <form method="POST" action="{{ route('add_review', $place->id) }}">
        @csrf
        @if (auth()->check())
            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
            <input type="text" value="{{ auth()->user()->name }}" name="user_name">
        @endif

        <label for="rating">Rating (1-5):</label>
        <input type="number" name="rating" id="rating" required min="1" max="5"><br><br>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment"></textarea><br><br>
        <button type="submit">Submit Review</button>
    </form>

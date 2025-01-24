@extends('app')

@section('content')
    <div class="container mx-auto py-10">
        <h2 class="text-2xl font-bold mb-4">Reviews for {{ $product->name }}</h2>

        @foreach ($reviews as $review)
            <div class="bg-white shadow-md p-4 mb-4 rounded-lg">
                <div class="font-semibold">{{ $review->name ?: 'Anonymous' }}
                </div>
                <div class="text-gray-600">{{ $review->created_at->diffForHumans() }}</div>
                <div class="mt-2">{{ $review->content }}</div>
                <div class="mt-2">Rating: {{ $review->rating }} / 5</div>
            </div>
        @endforeach

        <h3 class="text-xl font-semibold mt-8">Add a Review</h3>
        <form action="{{ route('reviews.store', $product->id) }}" method="POST" class="mt-4">
            @csrf
            <textarea name="content" class="w-full p-3 border rounded" placeholder="Write your review..." required></textarea>
            <div class="mt-4">
                <label for="rating" class="mr-2">Rating:</label>
                <select name="rating" id="rating" class="p-2 border rounded" required>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
            </div>
            <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-6 rounded">Submit Review</button>
        </form>
    </div>
@endsection

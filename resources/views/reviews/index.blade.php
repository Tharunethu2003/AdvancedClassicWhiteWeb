@extends('layouts.app')

@section('content')
@include('navbar') <!-- Include the navbar -->

<!-- Banner -->

<!-- Main Content -->
<div class="bg-gray-100 py-24">
    <div class="container mx-auto px-6 text-center">
        <div class="text-gray-800 text-lg font-semibold bg-gray-100 rounded-lg p-8">
            <p class="text-2xl font-bold mb-6" style="color:rgb(131, 92, 153);">
                “Read what our customers say about Classic White products. We are passionate about delivering quality skincare that enhances your natural beauty and gives your skin a radiant glow.”
            </p>
        </div>
    </div>
</div>

<!-- Reviews Section -->
<div class="bg-white py-16" style="background-color:rgb(255, 255, 255);">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-8" style="color:rgb(98, 50, 132);">Customer Reviews</h2>

        <!-- Displaying Reviews in Flexbox -->
        <div class="flex flex-wrap justify-center gap-8">
            @foreach ($reviews as $review)
                <div class="bg-white shadow-md p-6 rounded-lg" style="width: 300px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 6px rgba(52, 33, 59, 0.85);">
                    <div class="font-semibold" style="color:rgb(114, 75, 124);">
                    {{ $review->name ?: 'Anonymous' }}
                    </div>
                    <div class="text-gray-600 mb-4" style="font-size: 0.875rem; color: #7f8c8d;">{{ $review->created_at->diffForHumans() }}</div>
                    <div class="mt-4 mb-4 text-lg" style="color:rgb(82, 61, 99);">{{ $review->content }}</div>

                    <div class="mt-2" style="color:rgb(223, 244, 66);">
                        <!-- Star rating -->
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="fa fa-star" style="color: {{ $i <= $review->rating ? '#f4c542' : '#ddd' }};"></span>
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Add a Review Section -->
<div class="bg-gray-200 py-16" style="background-color: #ecf0f1;">
    <div class="container mx-auto px-6">
        <h3 class="text-2xl font-semibold text-center mb-8" style="color: #8A2BE2;">Share Your Thoughts</h3>
        
        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-4 rounded" style="border-radius: 5px; padding: 15px; background-color: #f8d7da; color: #721c24;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reviews.store') }}" method="POST" id="review-form" class="max-w-xl mx-auto bg-white p-8 shadow-md rounded-lg" style="border-radius: 8px; background-color: #ffffff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            @csrf
            <input type="text" name="name" class="w-full p-3 border rounded mb-4" placeholder="Your Name " style="border-color: #ddd;"/>

            <textarea name="content" class="w-full p-3 border rounded mb-4" placeholder="Write your review..." required style="border-color: #ddd;"></textarea>
            
            <div class="mb-4">
                <label for="rating" class="mr-2" style="color: #34495e; font-size: 1rem; margin-right: 10px;">Rating:</label>
                
                <!-- Star Rating with Radio Buttons -->
                <div class="flex items-center">
                    @for ($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden" required />
                        <label for="star{{ $i }}" class="fa fa-star text-gray-300 cursor-pointer text-2xl hover:text-yellow-400 transition duration-200" style="color: #ddd;"></label>
                    @endfor
                </div>
            </div>

            <button type="submit" class="mt-4 text-white py-2 px-6 rounded-lg w-full" style="background-color: #8A2BE2; border-radius: 5px;">Submit Review</button>
        </form>
    </div>
</div>

@include('footer')
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll('label[for^="star"]');
    const form = document.getElementById('review-form');
    
    // Handle star rating fill on click
    stars.forEach(star => {
        star.addEventListener('click', function () {
            const rating = this.getAttribute('for').replace('star', '');
            // Fill stars based on clicked rating
            updateStarColors(rating);
            // Set the selected rating as the value of the radio button
            document.querySelector('input[name="rating"][value="'+ rating +'"]').checked = true;
        });
    });

    function updateStarColors(rating) {
        stars.forEach((star, index) => {
            star.style.color = index < rating ? '#f4c542' : '#ddd';
        });
    }

    // Handle mouse hover for star preview
    stars.forEach(star => {
        star.addEventListener('mouseenter', function () {
            const index = Array.from(stars).indexOf(star) + 1;
            updateStarColors(index);
        });

        star.addEventListener('mouseleave', function () {
            const selectedRating = document.querySelector('input[name="rating"]:checked');
            const rating = selectedRating ? selectedRating.value : 0;
            updateStarColors(rating);
        });
    });
});
</script>
@endsection

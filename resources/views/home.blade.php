<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
@include('navbar') <!-- Include the reusable navbar -->

<!-- Banner Image -->
<div class="w-full">
    <img src="{{ asset('images/banner2.jpg') }}" alt="Banner" class="w-full h-auto">
</div>
<!-- Main Content Box -->
<div style="background: linear-gradient(145deg, #9b6c8f, #6a4c91); color: white; text-align: center; padding: 2rem 2.5rem; margin-top: 3rem; border-radius: 1rem; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease-in-out; width: 80%; max-width: 500px; margin-left: auto; margin-right: auto;">
    <h2 style="font-size: 2.25rem; font-weight: 700; margin-bottom: 1rem;">Get your Personalized Skincare Routine!</h2>
    <p style="font-size: 1.125rem; margin-bottom: 1rem;">Answer these questions to discover a skincare routine tailored just for you.</p>
    
    <a href="{{ route('quiz.index') }}" style="background-color:rgb(154, 116, 165); color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; font-size: 0.875rem; font-weight: 500; text-decoration: none; transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out; box-shadow: 0 4px 10px rgba(141, 100, 136, 0.2); display: inline-block; transform: scale(1); position: relative; overflow: hidden;">
        DO QUIZ!
        <span style="position: absolute; top: 50%; left: 50%; width: 120%; height: 120%; background: rgba(255, 255, 255, 0.1); opacity: 0.6; pointer-events: none; transform: translate(-50%, -50%) rotate(45deg);"></span>
    </a>
</div>
<!-- Trending Products Section -->
<div style="margin-top: 3rem; text-align: center; font-family: 'Georgia', serif;">
    <h3 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 3rem; color: #2F2F2F;">TRENDING PRODUCTS</h3>

    <div style="display: flex; justify-content: space-between; margin: 0 auto; gap: 2rem; max-width: 1120px; flex-wrap: wrap;">
        <!-- Product 1 -->
        <div style="background-color:rgb(116, 106, 134); color: white; padding: 2rem; width: 30%; text-align: center; border-radius: 12px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); transition: transform 0.3s; transform: scale(1); cursor: pointer;">
            <img src="{{ asset('images/product1.jpg') }}" alt="Anti-Blemish Cream" style="width: 100%; height: 16rem; object-fit: cover; margin-bottom: 1.5rem; border-radius: 12px;">
            <h4 style="font-weight: 600; margin-bottom: 0.5rem; font-size: 1.25rem;">ANTI-BLEMISH</h4>
            <p style="margin-bottom: 1rem; font-size: 1rem;">Pigmentation Control Cream</p>
            <a href="#" style="background-color: #F2D0A4; color: #4B4B4B; padding: 0.75rem 2rem; border-radius: 8px; font-size: 1rem; font-weight: 600; text-decoration: none; transition: background-color 0.2s; border: 2px solid #F2D0A4;">SEE MORE</a>
        </div>

        <!-- Product 2 -->
        <div style="background-color:rgb(116, 106, 134); color: white; padding: 2rem; width: 30%; text-align: center; border-radius: 12px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); transition: transform 0.3s; transform: scale(1); cursor: pointer;">
            <img src="{{ asset('images/product2.jpg') }}" alt="Brightening Day Cream" style="width: 100%; height: 16rem; object-fit: cover; margin-bottom: 1.5rem; border-radius: 12px;">
            <h4 style="font-weight: 600; margin-bottom: 0.5rem; font-size: 1.25rem;">Radiant & Protective</h4>
            <p style="margin-bottom: 1rem; font-size: 1rem;">Brightening Day Cream</p>
            <a href="#" style="background-color: #F2D0A4; color: #4B4B4B; padding: 0.75rem 2rem; border-radius: 8px; font-size: 1rem; font-weight: 600; text-decoration: none; transition: background-color 0.2s; border: 2px solid #F2D0A4;">SEE MORE</a>
        </div>

        <!-- Product 3 -->
        <div style="background-color:rgb(116, 106, 134); color: white; padding: 2rem; width: 30%; text-align: center; border-radius: 12px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); transition: transform 0.3s; transform: scale(1); cursor: pointer;">
            <img src="{{ asset('images/product3.jpg') }}" alt="Rejuvenating Day Cream" style="width: 100%; height: 16rem; object-fit: cover; margin-bottom: 1.5rem; border-radius: 12px;">
            <h4 style="font-weight: 600; margin-bottom: 0.5rem; font-size: 1.25rem;">Rejuvenating & Brightening</h4>
            <p style="margin-bottom: 1rem; font-size: 1rem;">Day Cream</p>
            <a href="#" style="background-color: #F2D0A4; color: #4B4B4B; padding: 0.75rem 2rem; border-radius: 8px; font-size: 1rem; font-weight: 600; text-decoration: none; transition: background-color 0.2s; border: 2px solid #F2D0A4;">SEE MORE</a>
        </div>
    </div>
</div>

<!-- WHY CHOOSE US Section -->
<div class="flex bg-dusty-purple text-white p-6 mt-8" style="height: 400px;">
    <div class="w-1/2 pr-3" style="max-height: 100%; overflow: hidden;">
        <img src="{{ asset('images/scrub.jpg') }}" alt="Choose Us" class="w-full h-auto object-cover rounded-lg shadow-lg">
    </div>
    <div class="w-1/2 flex flex-col justify-center items-center text-center bg-dusty-purple" style="max-height: 100%; padding: 1rem;">
        <h3 class="text-2xl font-serif font-bold mb-4" style="font-size: 1.75rem;">WHY CHOOSE US?</h3>
        <p class="text-lg mb-4" style="font-size: 1rem; line-height: 1.5;">
            At Advanced Classic White, we create personalized skincare routines tailored to your unique needs. Our products are crafted with natural, cruelty-free ingredients and backed by expert research to deliver long-lasting results. Trust us for healthier, glowing skin - because you deserve the best care!
        </p>

        <!-- Review Section -->
        <div class="mt-4">
            <p class="text-lg mb-4 font-serif italic text-white-200" style="font-size: 1rem;">Reviews help us expand</p>
            <a href="{{ route('reviews.index') }}" class="bg-pink-500 text-white px-8 py-3 rounded-lg text-sm font-medium hover:bg-pink-600 shadow-lg transform transition-transform duration-300 ease-in-out hover:scale-105" style="font-size: 0.875rem;">Add Review</a>
        </div>
    </div>
</div>


<!-- Dermatologist Section -->
<div class="flex justify-center mt-12 text-center">
    <div class="w-full sm:w-2/3 md:w-1/2 lg:w-1/3 bg-white text-dusty-purple p-8 rounded-lg shadow-xl">
        <h3 class="text-4xl font-bold mb-4">Want a more professional opinion?</h3>
        <p class="text-lg mb-6">With us, you can book an online appointment with a dermatologist for a more professional and medical skincare opinion.</p>
        <a href="{{ route('appointments.create') }}" class="bg-dusty-purple text-white px-8 py-3 rounded-lg text-sm font-semibold hover:bg-dusty-purple-600 shadow-md transform transition-transform duration-300 ease-in-out hover:scale-105">
            BOOK APPOINTMENT
        </a>
    </div>
</div>

@include('footer')
@endsection

<script>
    // Add hover animations using JavaScript
    const cards = document.querySelectorAll("div[style*='transform']");
    cards.forEach(card => {
        card.addEventListener("mouseover", () => {
            card.style.transform = "scale(1.05)";
        });
        card.addEventListener("mouseout", () => {
            card.style.transform = "scale(1)";
        });
    });

    const buttons = document.querySelectorAll("a[style*='background-color']");
    buttons.forEach(button => {
        button.addEventListener("mouseover", () => {
            button.style.backgroundColor = "#5A6268";
        });
        button.addEventListener("mouseout", () => {
            button.style.backgroundColor = "#6C757D";
        });
    });
</script>

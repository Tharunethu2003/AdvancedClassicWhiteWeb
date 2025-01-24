<!-- resources/views/about-us.blade.php -->
@extends('layouts.app')

@section('content')
@include('navbar') <!-- Include the navbar -->

<!-- Banner -->


<!-- Main Content -->
<div class="bg-gray-100 py-24"> <!-- Increased the padding to make the first text section bigger in height -->
    <div class="container mx-auto px-6 text-center">
        <div class="text-gray-800 text-lg font-semibold bg-gray-100 rounded-lg p-8">
            <p class="text-2xl font-bold mb-6">
                “Welcome to a world where all skin types find a home
                with advanced Classic White. We focus on making every type of skin look radiant,
                celebrating your natural beauty while giving you that goddess or god-like glow.
                Our products are designed to nourish, enhance, and bring out the best in every complexion,
                because beauty is for everyone.”
            </p>
        </div>
    </div>
</div>

<!-- Creators Section -->
<div class="bg-gray-300 py-16">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center space-y-8 md:space-y-0">
        <div class="md:w-1/2">
            <img src="{{ asset('images/creators.jpg') }}" alt="Creators" class="rounded-lg shadow-lg w-4/5 mx-auto md:w-2/5"> <!-- Smaller image -->
        </div>
        <div class="md:w-1/2 text-center text-white bg-gray-700 p-8 rounded-lg h-full"> <!-- Increased height for the text section -->
            <p class="text-xl font-bold italic">what do our</p>
            <h2 class="text-4xl font-cursive mb-6">creators say?</h2>
            <p class="leading-relaxed">
                “Our journey with Advanced Classic White began from a deep passion for skincare and a desire to
                create products that truly cater to Sri Lankan beauty, for all genders and ages. We believe in
                celebrating the unique beauty of all our people and are committed to crafting formulas that deliver
                visible results, offering care for both young and old.”
            </p>
            <p class="mt-4 font-semibold">
                - Manuja Jayathunga &<br>
                Nandana Wickremasinghe<br>
                Founders of Advanced Classic White
            </p>
        </div>
    </div>
</div>

<!-- Certifications Section -->
<div class="py-16">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="h-62 overflow-hidden">
            <img src="{{ asset('images/cruelty.jpg') }}" alt="Cruelty-Free" class="w-full h-full object-cover rounded-lg shadow-lg">
        </div>
        <div class="h-62 overflow-hidden">
            <img src="{{ asset('images/gmp.jpg') }}" alt="GMP Certified" class="w-full h-full object-cover rounded-lg shadow-lg">
        </div>
        <div class="h-62 overflow-hidden">
            <img src="{{ asset('images/heart.jpg') }}" alt="Made with Love" class="w-full h-full object-cover rounded-lg shadow-lg">
        </div>
    </div>
</div>

<!-- Instagram Images Section -->
<div class="py-16">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Instagram 1 -->
        <div class="overflow-hidden">
            <img src="{{ asset('images/insta1.jpg') }}" alt="Instagram Image 1" class="w-4/5 object-cover rounded-lg shadow-lg"> <!-- Slightly smaller -->
        </div>
        <!-- Instagram 2 -->
        <div class="overflow-hidden">
            <img src="{{ asset('images/insta2.jpg') }}" alt="Instagram Image 2" class="w-full object-cover rounded-lg shadow-lg">
        </div>
    </div>
</div>

@include('footer')
@endsection

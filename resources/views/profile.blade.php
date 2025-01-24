@extends('layouts.app')

@section('content')
@include('navbar') <!-- Include the navbar -->

<div class="container mx-auto p-6">
    <!-- Profile Header -->
    <div class="profile-header text-center mb-8">
        <img src="{{ asset('images/pfp.jpeg') }}" alt="Profile Picture" class="rounded-full mx-auto mb-4 w-32 h-32 object-cover shadow-lg">
        @auth
            <h1 class="text-3xl font-semibold text-gray-800">{{ Auth::user()->name }}</h1>
        @else
            <h1 class="text-3xl font-semibold text-gray-800">Guest</h1>
        @endauth
    </div>

    <!-- Routine Section -->
    <div class="routine bg-gradient-to-r from-pink-100 via-purple-200 to-indigo-100 shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">My Routine</h2>
        <p class="text-gray-700">Your skincare routine will appear here.</p>
    </div>
</div>

@include('footer') <!-- Include the footer -->
@endsection

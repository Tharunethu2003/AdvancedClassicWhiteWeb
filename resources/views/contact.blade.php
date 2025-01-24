@extends('layouts.app')

@section('content')
@include('navbar') <!-- Include the navbar -->

<!-- Contact Section -->
<div class="container mx-auto my-8">

    <!-- Contact Us Page Header with Image and Form Side by Side -->
    <div class="flex items-start mb-6">
        <!-- Image Section -->
        <div class="flex-1 pt-20">
            <img src="{{ asset('images/contact.jpg') }}" alt="Contact Us" class="w-full h-auto rounded-md">
        </div>

        <!-- Form Section -->
        <div class="ml-6 w-1/2">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Get In Touch</h1>
            
            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Contact Form -->
            <form action="{{ route('contact.submit') }}" method="POST" class="bg-gray-700 p-6 rounded-lg">
                @csrf
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-white font-semibold">Name</label>
                    <input type="text" id="name" name="name" class="w-full p-3 mt-2 bg-gray-600 border border-gray-500 rounded-lg" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-white font-semibold">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-3 mt-2 bg-gray-600 border border-gray-500 rounded-lg" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subject -->
                <div class="mb-4">
                    <label for="subject" class="block text-white font-semibold">Subject</label>
                    <input type="text" id="subject" name="subject" class="w-full p-3 mt-2 bg-gray-600 border border-gray-500 rounded-lg" value="{{ old('subject') }}">
                    @error('subject')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message -->
                <div class="mb-4">
                    <label for="message" class="block text-white font-semibold">Message</label>
                    <textarea id="message" name="message" class="w-full p-3 mt-2 bg-gray-600 border border-gray-500 rounded-lg" rows="4">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3 bg-purple-600 text-white rounded-lg mt-4 hover:bg-purple-700">Submit</button>
            </form>
        </div>
    </div>

    <!-- Contact Information Below Form -->
    <div class="grid grid-cols-2 gap-6 mt-8">
        <div class="flex items-center bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('images/hotline.png') }}" alt="Hotline" class="w-16 h-16 rounded-lg mr-4">
            <div>
                <h3 class="text-xl font-semibold">Hotline</h3>
                <p class="text-gray-700">+94 76 211 0111</p>
            </div>
        </div>

        <div class="flex items-center bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('images/whatsapp.png') }}" alt="WhatsApp" class="w-16 h-16 rounded-lg mr-4">
            <div>
                <h3 class="text-xl font-semibold">WhatsApp</h3>
                <p class="text-gray-700">+94 76 211 0111</p>
            </div>
        </div>

        <div class="flex items-center bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('images/mail.png') }}" alt="Mail" class="w-16 h-16 rounded-lg mr-4">
            <div>
                <h3 class="text-xl font-semibold">Mail</h3>
                <p class="text-gray-700">acw@gmail.com</p>
            </div>
        </div>

        <div class="flex items-center bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('images/location.png') }}" alt="Location" class="w-16 h-16 rounded-lg mr-4">
            <div>
                <h3 class="text-xl font-semibold">Location</h3>
                <p class="text-gray-700">11/B. Pallekale, Kandy</p>
            </div>
        </div>
    </div>

</div>

@include('footer') <!-- Include the footer -->
@endsection

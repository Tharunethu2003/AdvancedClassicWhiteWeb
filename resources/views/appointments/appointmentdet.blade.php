@extends('layouts.app')

@section('content')
@include('navbar') <!-- Include your navbar component -->

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="container" style="max-width: 800px; text-align: center;">
        <h2 class="my-4" style="font-family: Arial, sans-serif; color: #4B0082;">Appointment Summary</h2>

        <div class="appointment-summary" style="border: 1px solid #ddd; border-radius: 10px; padding: 20px; background-color: #fff; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <h4 style="color: #4B0082;">Thank you for booking!</h4>
            <p style="font-size: 16px; color: #555;">Your appointment has been successfully booked. We will contact you soon.</p>

            <div style="margin-top: 30px;">
                <img src="{{ asset('images/hearticon.jpg') }}" alt="Heart Icon" style="width: 100px; height: auto; margin-bottom: 20px;">
            </div>
        </div>
    </div>
</div>

@include('footer') <!-- Include your footer component -->
@endsection

@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div style="max-width: 600px; margin: 0 auto; text-align: center; padding: 24px;">
    <h1 style="font-size: 2rem; font-weight: bold; margin-bottom: 16px;">Make Payment</h1>
    <p style="font-size: 1rem; color: #6b7280; margin-bottom: 32px;">
        Your total amount is ${{ $amount }}.
    </p>
    <form id="payment-form">
        <div id="card-element"></div>
        <button id="submit" style="margin-top: 16px; padding: 12px 24px; background-color: #A888B5; color: white; border: none; border-radius: 4px;">
            Pay Now
        </button>
    </form>
    <div id="error-message" style="color: red; margin-top: 16px;"></div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('services.stripe.public') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const form = document.getElementById('payment-form');
    const errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const { error, paymentIntent } = await stripe.confirmCardPayment('{{ $clientSecret }}', {
            payment_method: {
                card: cardElement,
            },
        });

        if (error) {
            errorMessage.textContent = error.message;
        } else {
            window.location.href = "{{ route('home') }}";
        }
    });
</script>
@endsection

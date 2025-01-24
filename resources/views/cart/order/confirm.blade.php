@extends('layouts.app')

@section('title', 'Order Confirmation')

@section('content')
<div style="max-width: 600px; margin: 0 auto; text-align: center; padding: 24px;">
    <h1 style="font-size: 2rem; font-weight: bold; margin-bottom: 16px;">Order Placed Successfully!</h1>
    <p style="font-size: 1rem; color: #6b7280; margin-bottom: 32px;">
        Thank you for your order. Your order is being processed and will be shipped to:
    </p>

    <form method="POST" action="{{ route('checkout.create') }}">
        @csrf
        <button type="submit" style="padding: 12px 24px; background-color: #A888B5; color: white; border: none; border-radius: 4px;">
            Proceed to Payment
        </button>
    </form>

</div>
@endsection

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const form = document.getElementById('checkout-form');
form.addEventListener('submit', async (event) => {
    event.preventDefault();

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        });

        const session = await response.json();

        if (session.url) {
            // Redirect to Stripe Checkout
            window.location.href = session.url;
        } else {
            alert('Failed to create Stripe session. Please try again.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please check the console for details.');
    }
});

</script>
@endpush

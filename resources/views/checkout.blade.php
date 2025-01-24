@extends('app')

@section('content')
@include('navbar')

<div class="container mx-auto py-10">
    <!-- Progress Steps -->
    <div class="flex items-center justify-between mb-8">
        <div class="text-center">
            <div class="font-semibold text-lg">Shopping Cart</div>
            <div class="h-1 bg-blue-500 w-full mt-2"></div>
        </div>
        <div class="text-center">
            <div class="font-semibold text-lg">Shipping</div>
        </div>
        <div class="text-center">
            <div class="font-semibold text-lg">Payment</div>
        </div>
    </div>

    <!-- Main Section -->
    <div class="flex">
        <!-- Left Section: Shopping Cart Items -->
        <div class="w-2/3 pr-8">
            <h2 class="text-2xl font-bold mb-4">Shopping Cart</h2>
            @forelse($cartItems as $item)
            <div class="flex items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4">
                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-md">
                <div class="flex-1 px-4">
                    <div class="text-lg font-semibold">{{ $item['name'] }}</div>
                    <div class="text-gray-600">${{ number_format($item['price'], 2) }}</div>
                </div>
                <div class="flex items-center space-x-2">
                    <button onclick="updateQuantity('{{ $item['id'] }}', -1)" class="px-3 py-1 bg-gray-200 rounded">-</button>
                    <span>{{ $item['quantity'] }}</span>
                    <button onclick="updateQuantity('{{ $item['id'] }}', 1)" class="px-3 py-1 bg-gray-200 rounded">+</button>
                </div>
                <button onclick="removeItem('{{ $item['id'] }}')" class="text-red-500 font-semibold">Remove</button>
            </div>
            @empty
            <p>Your cart is empty!</p>
            @endforelse
        </div>

        <!-- Right Section: Order Summary -->
        <div class="w-1/3">
            <h2 class="text-2xl font-bold mb-4">Total</h2>
            <div class="bg-white shadow-md rounded-lg p-4">
                <div class="flex justify-between mb-4">
                    <span>Subtotal:</span>
                    <span>${{ number_format($subtotal, 2) }}</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span>Shipping:</span>
                    <span>Calculated at the checkout</span>
                </div>
                <div class="flex justify-between text-lg font-bold">
                    <span>Total:</span>
                    <span>${{ number_format($subtotal, 2) }}</span>
                </div>
                <div class="mt4">
                    <a href="{{ route('shipping') }}" class="block w-full bg-blue-500 text-white text-center py-2 rounded">Checkout Now</a>-
                </div>
                <div class="mt-2">
                    <a href="{{ route('store') }}" class="block text-blue-500 text-center">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function updateQuantity(itemId, change) {
        fetch(`/cart/update/${itemId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ change })
        }).then(response => {
            if (response.ok) location.reload();
        });
    }

    function removeItem(itemId) {
        fetch(`/cart/remove/${itemId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        }).then(response => {
            if (response.ok) location.reload();
        });
    }

</script>
@endsection

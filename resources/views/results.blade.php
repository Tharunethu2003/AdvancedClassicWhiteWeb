@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
@include('navbar') <!-- Include the navbar -->

<div class="font-sans">

    <!-- Summary Section -->
    <div class="max-w-4xl mx-auto py-10 px-4">
        <div class="text-center">
            <h1 class="text-3xl font-bold" style="color: #1A1A1D;">SUMMARY</h1>
            <hr class="w-1/4 mx-auto my-4" style="border-color: #3B1C32;">
            <p class="text-gray-700 text-lg">
                Based on your answers, we’ve created a skincare routine tailored just for you.
                Here’s what we recommend to keep your skin looking and feeling its best!
            </p>
        </div>

        <!-- Product Recommendations Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
            @foreach($recommendation as $product)
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover rounded-lg mb-4">

                    <div class="flex flex-col">
                        <h3 class="font-semibold text-lg" style="color: #1A1A1D;">{{ $product['name'] }}</h3>
                        <p class="text-sm" style="color: #3B1C32;">{{ $product['subtitle'] }}</p>
                        <p class="text-sm" style="color: #6A1E55;">{{ $product['description'] ?? 'No description available.' }}</p>
                        
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold" style="color: #6A1E55;">Rs. {{ number_format($product['price'], 2) }}</span>
                            <div class="space-x-3">
                                <!-- Add to Cart Button with Pink Color -->
                                <button class="px-4 py-2 rounded-full text-sm add-to-cart" 
                                    style="background-color: #6A1E55; color: white;" 
                                    onmouseover="this.style.backgroundColor='#A64D79'" 
                                    onmouseout="this.style.backgroundColor='#6A1E55'"
                                    data-name="{{ $product['name'] }}" 
                                    data-price="{{ $product['price'] }}">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col items-center mt-10 space-y-4">
            <a href="{{ route('products.index') }}" class="flex items-center justify-center px-12 py-3 w-72 rounded-full text-white transition-all duration-300"
                style="background-color: rgb(103, 57, 90);" 
                onmouseover="this.style.backgroundColor='#6A1E55'" 
                onmouseout="this.style.backgroundColor='rgb(103, 57, 90)'">
                Browse Products
            </a>
        </div>

    </div>
</div>

<!-- Cart Dropdown -->
<div class="cart-dropdown hidden absolute top-0 right-0 bg-white p-4 shadow-lg mt-12 mr-6 rounded-md">
    <h4 class="font-semibold">Your Cart</h4>
    <div class="cart-items max-h-60 overflow-y-auto"></div>
    <p class="cart-total font-semibold">Total: Rs. 0</p>
    <button class="clear-cart" style="background-color: #e53e3e; color: white; padding: 10px 20px; border-radius: 8px; margin-top: 16px;">Clear Cart</button>
</div>

<!-- Success Message -->
<div class="success-message hidden bg-green-500 text-white p-4 fixed bottom-4 left-1/2 transform -translate-x-1/2 rounded-md z-50"
     style="font-size: 16px; display: flex; align-items: center; gap: 8px;">
    <span>Item added to cart successfully! <span style="color: red; font-size: 20px;">❤️</span></span>
</div>

@include('footer')

@endsection

<script>
document.addEventListener("DOMContentLoaded", function () {
    const cartDropdown = document.querySelector(".cart-dropdown");
    const cartItemsContainer = document.querySelector(".cart-items");
    const cartTotalElement = document.querySelector(".cart-total");
    const clearCartButton = document.querySelector(".clear-cart");
    const successMessage = document.querySelector(".success-message");

    // Clear cart functionality
    clearCartButton.addEventListener("click", () => {
        fetch('{{ route('cart.clear') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        })
        .then(() => {
            cartItemsContainer.innerHTML = '';
            cartTotalElement.textContent = 'Total: Rs. 0';
        });
    });

    // Populate cart items from the session
    const cart = @json(session('cart', []));
    let total = 0;

    cartItemsContainer.innerHTML = Object.values(cart).map(item => {
        total += item.price * item.quantity;
        return `<div class="flex justify-between p-2">
            <span>${item.name} x ${item.quantity}</span>
            <span>Rs. ${item.price * item.quantity}</span>
        </div>`; 
    }).join(''); 

    cartTotalElement.textContent = `Total: Rs. ${total}`;

    // Add to Cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');  // Get product ID
            const productName = this.getAttribute('data-name');  // Get product name
            const productPrice = this.getAttribute('data-price');  // Get product price

            // Perform AJAX request to add the item to the cart
            fetch('{{ route('cart.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    id: productId,
                    name: productName,
                    price: productPrice,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the cart UI dynamically
                    updateCart(data.cart);

                    // Show success message
                    showSuccessMessage();

                    // Show the cart dropdown
                    cartDropdown.classList.remove('hidden');
                }
            });
        });
    });

    // Update Cart UI dynamically
    function updateCart(cart) {
        let total = 0;
        cartItemsContainer.innerHTML = cart.map(item => {
            total += item.price * item.quantity;
            return `<div class="flex justify-between p-2">
                        <span>${item.name} x ${item.quantity}</span>
                        <span>Rs. ${item.price * item.quantity}</span>
                    </div>`; 
        }).join(''); 
        cartTotalElement.textContent = `Total: Rs. ${total}`;
    }

    // Show success message
    function showSuccessMessage() {
        successMessage.classList.remove('hidden');
        setTimeout(() => {
            successMessage.classList.add('hidden');
        }, 3000); // Hide after 3 seconds
    }
});
</script>

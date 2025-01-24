@extends('layouts.app')

@section('content')
@include('navbar')

<div class="w-full">
    <img src="{{ asset('images/banner2.jpg') }}" alt="Banner" class="w-full h-auto">
</div>

<!-- First Row: Category Images -->
<div class="container mx-auto px-6 py-12 text-center">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
        <!-- Category Images here -->
        <!-- Category links same as your current code -->
    </div>
</div>

<!-- Product Grid (Page 1) -->
<div class="container mx-auto px-6 py-12" id="page-1">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach ($products as $product)
        <div class="text-center">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full mb-4">
        <p class="font-semibold">{{ $product->name }}</p>
            <p class="text-gray-700">Rs. {{ number_format($product->price, 2) }}</p>
            <button style="background-color: #2d3748; color: white; padding: 10px 20px; border-radius: 8px; margin-top: 16px; transition: background-color 0.3s;"
                onmouseover="this.style.backgroundColor='#4a5568'" onmouseout="this.style.backgroundColor='#2d3748'">
                SHOP NOW
            </button>
            <button 
                class="add-to-cart" 
                style="background-color: #2d3748; color: white; padding: 10px 20px; border-radius: 8px; margin-top: 16px; transition: background-color 0.3s;"
                onmouseover="this.style.backgroundColor='#4a5568'" onmouseout="this.style.backgroundColor='#2d3748'" 
                data-id="{{ $product->id }}" 
                data-name="{{ $product->name }}" 
                data-price="{{ $product->price }}">
                ADD TO CART
            </button>
        </div>
        @endforeach
    </div>
</div>

<!-- Cart Dropdown -->
<div id="cart-dropdown" class="hidden absolute top-0 right-0 bg-white p-4 shadow-lg mt-12 mr-6 rounded-md">
    <h4 class="font-semibold">Your Cart</h4>
    <div id="cart-items" class="max-h-60 overflow-y-auto"></div>
    <p id="cart-total" class="font-semibold">Total: Rs. 0</p>
    <button id="clear-cart" style="background-color: #e53e3e; color: white; padding: 10px 20px; border-radius: 8px; margin-top: 16px;">Clear Cart</button>
</div>

<!-- Success Message -->
<div id="success-message" class="hidden bg-green-500 text-white p-4 fixed bottom-4 left-1/2 transform -translate-x-1/2 rounded-md z-50"
     style="font-size: 16px; display: flex; align-items: center; gap: 8px;">
    <span>Item added to cart successfully! <span style="color: red; font-size: 20px;">❤️</span></span>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const cartDropdown = document.getElementById("cart-dropdown");
    const cartItemsContainer = document.getElementById("cart-items");
    const cartTotalElement = document.getElementById("cart-total");
    const clearCartButton = document.getElementById("clear-cart");
    const successMessage = document.getElementById("success-message");

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
            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');

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

                    // Refresh the page after 3 seconds
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
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

@include('footer')
@endsection

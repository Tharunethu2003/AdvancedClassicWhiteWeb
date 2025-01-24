<nav class="bg-gray-300 p-4">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-1 flex items-center justify-start sm:items-stretch sm:justify-start ml-0">
                <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="mb-1 w-16">
            </div>

            <!-- Navbar links -->
            <div class="ml-4 flex items-center justify-center w-full space-x-6">
                <a href="{{ route('home') }}" class="text-gray-800 hover:bg-gray-400 px-4 py-2 rounded-md text-sm font-medium">Home</a>
                <a href="{{ route('products.index') }}" class="text-gray-800 hover:bg-gray-400 px-4 py-2 rounded-md text-sm font-medium">Store</a>
                <a href="{{ route('about-us') }}" class="text-gray-800 hover:bg-gray-400 px-4 py-2 rounded-md text-sm font-medium">About Us</a>
                <a href="{{ route('contact') }}" class="text-gray-800 hover:bg-gray-400 px-4 py-2 rounded-md text-sm font-medium">Contact Us</a>
                <a href="{{ route('reviews.index') }}" class="text-gray-800 hover:bg-gray-400 px-4 py-2 rounded-md text-sm font-medium">Reviews</a>
                <a href="{{ route('profile') }}" class="text-gray-800 hover:bg-gray-400 px-4 py-2 rounded-md text-sm font-medium">Profile</a>
            </div>

            <!-- User logout button -->
            <!-- User logout button and User Name -->
<div class="flex items-center space-x-4">
    @auth
        <span class="text-gray-800 text-sm font-medium">
            Welcome, {{ Auth::user()->name }}!
        </span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-white bg-purple-600 px-4 py-2 rounded-md text-sm font-medium hover:bg-purple-700">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="text-gray-800 hover:bg-gray-400 px-4 py-2 rounded-md text-sm font-medium">Login</a>
    @endauth
</div>

            <!-- Cart Section -->
            <div class="relative">
                <button id="cart-button" class="flex items-center relative" style="border: none; background: none; cursor: pointer;">
                    <img src="{{ asset('images/cart.png') }}" alt="Cart" class="w-8 h-8">
                    <span style="position: absolute; top: 0; right: 0; transform: translate(50%, -50%); background-color: #f44336; color: #ffffff; font-size: 12px; border-radius: 50%; padding: 2px 6px;">+</span>
                </button>

                <!-- Cart Dropdown -->
                <div id="cart-dropdown" 
                    style="position: absolute; right: 0; margin-top: 8px; width: 320px; background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; display: none;">
                    <h2 style="font-size: 18px; font-weight: 600; color: #4b5563; border-bottom: 1px solid #e5e7eb; padding-bottom: 8px; margin-bottom: 16px;">Your Cart</h2>

                    <div id="cart-items" style="display: flex; flex-direction: column; gap: 16px;">
                        <!-- Static text or placeholder for items -->
                        <p style="font-size: 14px; color: #6b7280;">Your cart is empty.</p>
                    </div>

                    <a href="{{ route('cart.index') }}" 
                        style="display: block; margin-top: 16px; text-align: center; background-color: #2563eb; color: #ffffff; font-size: 14px; font-weight: 500; padding: 12px 0; border-radius: 8px; text-decoration: none;">
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    const cartDropdown = document.getElementById('cart-dropdown');
    const cartButton = document.getElementById('cart-button');

    // Toggle cart dropdown visibility
    cartButton.addEventListener('click', function () {
        cartDropdown.style.display = cartDropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Close cart if clicked outside
    document.addEventListener('click', function (e) {
        if (!cartButton.contains(e.target) && !cartDropdown.contains(e.target)) {
            cartDropdown.style.display = 'none';
        }
    });
</script>

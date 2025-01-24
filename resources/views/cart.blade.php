@extends('layouts.app')

@section('content')
@include('navbar')

<div style="width: 100%;">
    <img src="{{ asset('images/banner2.jpg') }}" alt="Banner" style="width: 100%; height: auto;">
</div>

<!-- First Row: Category Images -->
<div style="max-width: 1200px; margin: 0 auto; padding: 30px 20px; text-align: center;">
    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
        <!-- First Image (For Hair) -->
        <a href="#" style="border-radius: 9999px; border: 4px solid #ddd; padding: 20px;">
            <img src="{{ asset('images/hair.jpg') }}" alt="For Hair" style="width: 100%; border-radius: 9999px; object-fit: cover; margin-bottom: 10px;">
            <p style="font-weight: bold;">For Hair</p>
        </a>

        <!-- Second Image (Face Essentials) -->
        <a href="#" style="border-radius: 9999px; border: 4px solid #ddd; padding: 20px;">
            <img src="{{ asset('images/face.jpg') }}" alt="Face Essentials" style="width: 100%; border-radius: 9999px; object-fit: cover; margin-bottom: 10px;">
            <p style="font-weight: bold;">Face Essentials</p>
        </a>

        <!-- Third Image (Body Bliss) -->
        <a href="#" style="border-radius: 9999px; border: 4px solid #ddd; padding: 20px;">
            <img src="{{ asset('images/body.jpg') }}" alt="Body Bliss" style="width: 100%; border-radius: 9999px; object-fit: cover; margin-bottom: 10px;">
            <p style="font-weight: bold;">Body Bliss</p>
        </a>

        <!-- Fourth Image (Beauty Bundles) -->
        <a href="#" style="border-radius: 9999px; border: 4px solid #ddd; padding: 20px;">
            <img src="{{ asset('images/bundle.jpg') }}" alt="Beauty Bundles" style="width: 100%; border-radius: 9999px; object-fit: cover; margin-bottom: 10px;">
            <p style="font-weight: bold;">Beauty Bundles</p>
        </a>
    </div>
</div>

<!-- Product Grid (Page 1) -->
<div style="max-width: 1200px; margin: 0 auto; padding: 30px 20px;" id="page-1">
    <div style="display: grid; grid-template-columns: repeat(1, 1fr); gap: 20px;">
        <!-- Product 1 -->
        <div style="text-align: center;">
            <img src="{{ asset('images/prd1.jpg') }}" alt="Rejuvenating Night-time Body Lotion" style="width: 100%; margin-bottom: 16px;">
            <p style="font-weight: bold;">Rejuvenating Night-time Body Lotion</p>
            <p style="color: #4a4a4a;">Rs. 690</p>
            <button style="background-color: #2d2d2d; color: white; padding: 12px 24px; border-radius: 4px; margin-top: 16px;">SHOP NOW</button>
            <button 
                class="add-to-cart" 
                style="background-color: #2d2d2d; color: white; padding: 12px 24px; border-radius: 4px; margin-top: 16px;" 
                data-id="1" 
                data-name="Rejuvenating Night-time Body Lotion" 
                data-price="690">
                ADD TO CART
            </button>
        </div>
        <!-- Repeat for other products... -->
    </div>
</div>

<!-- Product Grid (Page 2) -->
<div style="max-width: 1200px; margin: 0 auto; padding: 30px 20px; display: none;" id="page-2">
    <div style="display: grid; grid-template-columns: repeat(1, 1fr); gap: 20px;">
        <!-- Product 13 -->
        <div style="text-align: center;">
            <img src="{{ asset('images/prd13.jpg') }}" alt="Rose & Aloe Vera Body Lotion" style="width: 100%; margin-bottom: 16px;">
            <p style="font-weight: bold;">Rose & Aloe Vera Body Lotion</p>
            <p style="color: #4a4a4a;">Rs. 750</p>
            <button style="background-color: #2d2d2d; color: white; padding: 12px 24px; border-radius: 4px; margin-top: 16px;">SHOP NOW</button>
            <button 
                class="add-to-cart" 
                style="background-color: #2d2d2d; color: white; padding: 12px 24px; border-radius: 4px; margin-top: 16px;" 
                data-id="13" 
                data-name="Rose & Aloe Vera Body Lotion" 
                data-price="750">
                ADD TO CART
            </button>
        </div>
        <!-- Repeat for other products... -->
    </div>
</div>

<!-- Toggle Switch for Pagination -->
<div style="display: flex; justify-content: center; margin-top: 48px;">
    <label for="toggle" style="display: inline-flex; align-items: center; cursor: pointer;">
        <span style="font-size: 18px; font-weight: 600;">Page 1 / Page 2</span>
        <input type="checkbox" id="toggle" style="display: none;">
        <span style="margin-left: 8px; position: relative;">
            <span style="display: block; width: 56px; height: 28px; background-color: #ddd; border-radius: 9999px;"></span>
            <span style="width: 24px; height: 24px; background-color: white; position: absolute; top: 4px; left: 4px; border-radius: 9999px; transition: all 0.3s;"></span>
        </span>
    </label>
</div>

<!-- Cart Popup -->
<div id="cart-popup" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: flex; align-items: center; justify-content: center; display: none;">
    <div style="background-color: white; padding: 24px; border-radius: 8px; text-align: center;">
        <p style="font-size: 20px;">Product added to cart! ❤️</p>
        <button id="close-popup" style="margin-top: 16px; background-color: #2d2d2d; color: white; padding: 12px 24px; border-radius: 4px;">Close</button>
    </div>
</div>

<script>
    const toggle = document.getElementById('toggle');
    const page1 = document.getElementById('page-1');
    const page2 = document.getElementById('page-2');

    toggle.addEventListener('change', () => {
        if (toggle.checked) {
            page1.style.display = 'none';
            page2.style.display = 'block';
        } else {
            page1.style.display = 'block';
            page2.style.display = 'none';
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        const cartPopup = document.getElementById('cart-popup');
        const closePopupButton = document.getElementById('close-popup');
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        const updateCartUI = () => {
            let total = 0;
            const cartItemsContainer = document.getElementById('cart-items');
            const cartCount = document.getElementById('cart-count');
            const cartTotal = document.getElementById('cart-total');
            cartItemsContainer.innerHTML = '';

            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '<p style="padding: 10px; color: #4a4a4a;">Your cart is empty.</p>';
            } else {
                cart.forEach(item => {
                    const itemHTML = `
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; border-bottom: 1px solid #ddd;">
                            <p>${item.name}</p>
                            <p>Rs. ${item.price} x ${item.quantity}</p>
                            <button 
                                class="remove-item" 
                                style="color: red;" 
                                data-id="${item.id}">Remove</button>
                        </div>`;
                    cartItemsContainer.innerHTML += itemHTML;
                    total += item.price * item.quantity;
                });
            }

            cartCount.textContent = cart.length;
            cartTotal.textContent = `Total: Rs. ${total}`;
        };

        const addToCart = (id, name, price) => {
            const existingItem = cart.find(item => item.id === id);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ id, name, price, quantity: 1 });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartUI();

            // Show popup
            cartPopup.style.display = 'flex';
            setTimeout(() => {
                cartPopup.style.display = 'none';
            }, 2000);
        };

        const removeFromCart = (id) => {
            cart = cart.filter(item => item.id !== id);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartUI();
        };

        // Close popup
        closePopupButton.addEventListener('click', () => {
            cartPopup.style.display = 'none';
        });

        // Load cart on page load
        updateCartUI();

        // Add to cart buttons
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', () => {
                const id = parseInt(button.getAttribute('data-id'));
                const name = button.getAttribute('data-name');
                const price = parseInt(button.getAttribute('data-price'));

                addToCart(id, name, price);
            });
        });

        // Remove item from cart
        cartItemsContainer.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-item')) {
                const id = parseInt(e.target.getAttribute('data-id'));
                removeFromCart(id);
            }
        });

        // Clear cart
        clearCartButton.addEventListener('click', () => {
            cart = [];
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartUI();
        });
    });
</script>
@endsection

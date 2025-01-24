@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 24px;">
    <h1 style="font-size: 2rem; font-weight: bold; text-align: center; margin-bottom: 32px;">Checkout</h1>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 32px;">
        <!-- Cart Items -->
        <div style="background-color: white; padding: 24px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 8px;">
            <h2 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 16px;">Your Cart</h2>
            
            <ul id="cart-items" style="list-style: none; padding: 0; margin: 0;">
                @foreach($cartItems as $item)
                    @php
                        $itemId = $item['id'] ?? null;
                        $itemName = $item['name'] ?? 'Unknown Product';
                        $itemPrice = $item['price'] ?? 0;
                        $itemQuantity = $item['quantity'] ?? 0;
                    @endphp
                    <li id="cart-item-{{ $itemId }}" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                        <div>
                            <p style="font-weight: 600; margin: 0;">{{ $itemName }}</p>
                            <p style="font-size: 0.875rem; color: #6b7280; margin: 0;">Price: Rs.{{ number_format($itemPrice, 2) }}</p>
                            <div style="display: flex; align-items: center; margin-top: 8px;">
                                @if($itemId)
                                    <button class="update-quantity" data-id="{{ $itemId }}" data-action="decrease" style="padding: 4px 8px; background-color: #e74c3c; color: white; border: none; border-radius: 4px; margin-right: 8px; cursor: pointer;">-</button>
                                    <span id="item-quantity-{{ $itemId }}">{{ $itemQuantity }}</span>
                                    <button class="update-quantity" data-id="{{ $itemId }}" data-action="increase" style="padding: 4px 8px; background-color: #27ae60; color: white; border: none; border-radius: 4px; margin-left: 8px; cursor: pointer;">+</button>
                                    <button class="remove-item" data-id="{{ $itemId }}" style="margin-left: 16px; padding: 4px 8px; background-color: #e74c3c; color: white; border: none; border-radius: 4px; cursor: pointer;">Remove</button>
                                @endif
                            </div>
                        </div>
                        <p style="font-weight: 600; margin: 0;">Rs.{{ number_format($itemPrice * $itemQuantity, 2) }}</p>
                    </li>
                @endforeach
            </ul>

            <div style="margin-top: 16px; border-top: 1px solid #e5e7eb; padding-top: 16px;">
                <div style="display: flex; justify-content: space-between; font-weight: 600;">
                    <span>Total</span>
                    <span>Rs.{{ number_format($subtotal, 2) }}</span>
                </div>
            </div>
        </div>

        <!-- Shipping Information Form -->
        <div style="background-color: white; padding: 24px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 8px;">
            <h2 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 16px;">Shipping Information</h2>

            <form id="checkout-form" action="{{ route('order.confirm') }}" method="POST">
                @csrf

                <div style="margin-bottom: 16px;">
                    <label for="full_name" style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 4px;">Full Name</label>
                    <input type="text" name="full_name" id="full_name" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;" required>
                </div>

                <div style="margin-bottom: 16px;">
                    <label for="address" style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 4px;">Shipping Address</label>
                    <input type="text" name="address" id="address" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;" required>
                </div>

                <div style="margin-bottom: 16px;">
                    <label for="city" style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 4px;">City</label>
                    <input type="text" name="city" id="city" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;" required>
                </div>

                <div style="margin-bottom: 16px;">
                    <label for="zipcode" style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 4px;">Zip Code</label>
                    <input type="text" name="zipcode" id="zipcode" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;" required>
                </div>

                <div style="margin-bottom: 16px;">
                    <label for="phone" style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 4px;">Phone Number</label>
                    <input type="text" name="phone" id="phone" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;" required>
                </div>

                <button type="button" id="confirm-order" style="width: 100%; background-color: #A294F9; color: white; padding: 12px; border-radius: 4px; font-weight: 600; border: none; cursor: pointer; transition: background-color 0.3s;" 
                    onmouseover="this.style.backgroundColor='#A888B5'" 
                    onmouseout="this.style.backgroundColor='#A294F9'">
                    Confirm Order
                </button>
            </form>
        </div>

    </div>
</div>

<script>
    document.getElementById('confirm-order').addEventListener('click', function () {
        if (confirm("Are you sure you want to confirm the order?")) {
            document.getElementById('checkout-form').submit();
        }
    });
</script>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function showCheckout()
    {
        // Fetching cart items from the session
        $cartItems = session('cart', []); 

        // Calculate subtotal
        $subtotal = array_reduce($cartItems, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return view('checkout', compact('cartItems', 'subtotal'));
    }

    public function confirmOrder(Request $request)
    {
        // Fetching cart items from the session
        $cartItems = session('cart', []); 
        
        // Calculate total price from the cart data
        $totalPrice = array_reduce($cartItems, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Create the order in the database
        $order = Order::create([
            'customer_name' => $request->input('full_name'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'zipcode' => $request->input('zipcode'),
            'phone' => $request->input('phone'),
            'status' => 'pending', // Default status
            'total_price' => $totalPrice,
        ]);

        // Log the order creation for debugging
        Log::info('Order Created:', ['order' => $order]);

        // Attach the products from the cart to the order
        foreach ($cartItems as $item) {
            // Ensure that each item contains an 'id' key
            if (isset($item['id'])) {
                $order->products()->attach($item['id'], [
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
        }

        // Clear the cart session after confirming the order
        session()->forget('cart');

        // Return confirmation page
        return view('cart.order.confirm', ['order' => $order]);
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        // Render cart page
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'name' => $name,
                'price' => $price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    public function clear(Request $request)
    {
        // Clear the cart from session
        $request->session()->forget('cart');

        return response()->json(['success' => true]);
    }

        public function checkout()
    {
        $cartItems = session('cart', []);
        $subtotal = 0;
        
        foreach ($cartItems as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        
        return view('cart.index', compact('cartItems', 'subtotal'));  // Make sure 'subtotal' is passed
    }

    

        public function showCart()
    {
        $cartItems = session('cart', []); // Example: Fetch cart items from the session
        $totalQuantity = array_sum(array_column($cartItems, 'quantity')); // Calculate total quantity
        return view('cart', compact('cartItems', 'totalQuantity'));
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->input('id');
        $action = $request->input('action');

        if (isset($cart[$id])) {
            if ($action == 'increase') {
                $cart[$id]['quantity'] += 1;
            } elseif ($action == 'decrease' && $cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] -= 1;
            }
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'cart' => $cart,
        ]);
    }


}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckoutController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Sample Product',
                    ],
                    'unit_amount' => 5000, // Amount in cents (e.g., $50.00)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('home') . '?success=true',
            'cancel_url' => route('home') . '?success=false',
        ]);

        return redirect($session->url);
    }
}

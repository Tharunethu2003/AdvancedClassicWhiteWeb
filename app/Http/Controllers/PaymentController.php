<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function createPayment()
    {
        $amount = 5000; // Replace with dynamic amount in cents
        $currency = 'usd';

        Stripe::setApiKey(config('services.stripe.secret'));

        $paymentIntent = PaymentIntent::create([
            'amount' => $amount,
            'currency' => $currency,
            'payment_method_types' => ['card'],
        ]);

        return view('payment', [
            'clientSecret' => $paymentIntent->client_secret,
            'amount' => $amount / 100, // Show in dollars
        ]);
    }

    public function processPayment(Request $request)
    {
        // Handle webhook or confirmation logic if needed.
        return redirect()->route('home')->with('success', 'Payment Successful!');
    }
}

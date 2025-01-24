<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the user login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to find the user by email
        $user = User::where('email', $request->email)->first();

        // Check if the user exists and if the password is correct
        if (!$user) {
            return back()->withErrors([
                'email' => 'No user found with this email address.',
            ]);
        }

        // Check if the password matches
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'The password you entered is incorrect.',
            ]);
        }

        // Log the user in
        Auth::login($user);

        // Redirect to home page after successful login
        return redirect()->route('home');
    }
}

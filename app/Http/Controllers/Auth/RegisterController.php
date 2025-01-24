<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the user registration request.
     */
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' ensures password_confirmation matches
        ]);

        try {
            // Create a new user record in the database
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']), // Hash the password before saving
            ]);

            // Flash a success message to the session
            session()->flash('success', 'You have successfully registered. Please log in.');

            // Redirect to the login page
            return redirect()->route('login');
        } catch (\Exception $e) {
            // Handle any potential errors
            return back()->withErrors(['error' => 'There was an error processing your registration.'])->withInput();
        }
    }
}

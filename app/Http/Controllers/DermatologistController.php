<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;

class DermatologistController extends Controller
{
    public function showLoginForm()
    {
        return view('dermatologist.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('dermatologist')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dermatologist.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        $dermatologist = Auth::guard('dermatologist')->user();
        $appointments = $dermatologist->appointments;

        return view('dermatologist.dashboard', compact('appointments'));
    }
}

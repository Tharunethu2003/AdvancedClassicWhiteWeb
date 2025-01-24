<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Show the contact form
    public function showContactForm()
    {
        return view('contact');
    }

    // Handle form submission
    public function submitContactForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ], [
            'name.required' => 'Please provide your name.',
            'email.required' => 'We need your email to contact you.',
            'subject.required' => 'Please provide a subject for your message.',
            'message.required' => 'Please write your message.',
        ]);

        // Store contact information in the database
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Redirect with success message
        return redirect()->route('contact')->with('success', 'Thank you for getting in touch!');
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone_num' => 'required|string|max:15',
            'date' => 'required|date',
            'time' => 'required|string',
            'dermatologist_id' => 'required|integer',
        ]);

        // Save the appointment data in the database
        Appointment::create([
            'customer_name' => $request->customer_name,
            'phone_num' => $request->phone_num,
            'date' => $request->date,
            'time' => $request->time,
            'dermatologist_id' => $request->dermatologist_id,
        ]);

        // Redirect to a confirmation page or back to the form with success message
        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }

    public function create()
{
    return view('appointments.create'); // Ensure you have a Blade view file for this.
}

}

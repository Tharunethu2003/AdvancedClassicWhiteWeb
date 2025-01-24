<div style="max-width: 900px; margin: 2rem auto; background-color: #fff; padding: 2rem; border-radius: 12px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); font-family: 'Arial', sans-serif;">
    <!-- Personalized Greeting -->
    <h2 style="font-size: 2.5rem; font-weight: 700; color:rgb(90, 64, 104); text-align: center; margin-bottom: 1.5rem;">
        Welcome, Dr. {{ Auth::guard('dermatologist')->user()->name }}!
        <br>
        <span style="font-size: 1.25rem; font-weight: 400; color: #6B7280;">Here are your upcoming appointments:</span>
    </h2>
    <br>

    <!-- No Appointments Message -->
    @if($appointments->isEmpty())
        <p style="text-align: center; color:rgb(66, 62, 75); font-size: 1.2rem;">You have no upcoming appointments.</p>
    @else
        <!-- Appointment Table -->
        <table style="width: 100%; border-collapse: collapse; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);">
            <thead>
                <tr style="background-color: #E0E7FF; color: #374151; font-size: 1.1rem; font-weight: 600;">
                    <th style="padding: 1.25rem; text-align: left; border-bottom: 2px solid #CBD5E0;">Customer Name</th>
                    <th style="padding: 1.25rem; text-align: left; border-bottom: 2px solid #CBD5E0;">Phone</th>
                    <th style="padding: 1.25rem; text-align: left; border-bottom: 2px solid #CBD5E0;">Date</th>
                    <th style="padding: 1.25rem; text-align: left; border-bottom: 2px solid #CBD5E0;">Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr style="color:rgb(59, 53, 68); font-size: 1rem; transition: background-color 0.3s ease;">
                        <td style="padding: 1rem; border-bottom: 1px solid #E5E7EB;">{{ $appointment->customer_name }}</td>
                        <td style="padding: 1rem; border-bottom: 1px solid #E5E7EB;">{{ $appointment->phone_num }}</td>
                        <td style="padding: 1rem; border-bottom: 1px solid #E5E7EB;">{{ $appointment->date }}</td>
                        <td style="padding: 1rem; border-bottom: 1px solid #E5E7EB;">{{ $appointment->time }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>


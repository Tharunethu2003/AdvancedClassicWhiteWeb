@extends('layouts.app')

@section('content')
@include('navbar')

<div class="container" style="max-width: 800px; margin-top: 50px; margin-left: auto; margin-right: auto; text-align: center;">
    <h2 class="my-4" style="font-family: Arial, sans-serif; color: #4B0082;">Dermatologist Booking</h2>

    <div id="dermatologist-selection" style="display: flex; justify-content: center; gap: 20px; margin-top: 30px;">
        <!-- Dermatologist 1 -->
        <div class="dermatologist-card" style="border: 1px solid #ddd; border-radius: 10px; padding: 15px; width: 200px; text-align: center; background-color: #fff;">
            <h5 style="color: #4B0082; margin: 10px 0;">Dr. Wilson</h5>
            <p style="font-size: 14px; color: #555;">Expert in Acne Treatment</p>
        </div>

        <!-- Dermatologist 2 -->
        <div class="dermatologist-card" style="border: 1px solid #ddd; border-radius: 10px; padding: 15px; width: 200px; text-align: center; background-color: #fff;">
            <h5 style="color: #4B0082; margin: 10px 0;">Dr. Cuddy</h5>
            <p style="font-size: 14px; color: #555;">Specialist in Skin Rejuvenation</p>
        </div>

        <!-- Dermatologist 3 -->
        <div class="dermatologist-card" style="border: 1px solid #ddd; border-radius: 10px; padding: 15px; width: 200px; text-align: center; background-color: #fff;">
            <h5 style="color: #4B0082; margin: 10px 0;">Dr. House</h5>
            <p style="font-size: 14px; color: #555;">Expert in Anti-Aging Solutions</p>
        </div>
    </div>

    <br><br>

    
    <div id="appointment-form" class="mt-8 bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
    <h4 class="text-xl font-semibold text-indigo-600 mb-4">Confirm Appointment</h4>
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf <!-- Include CSRF token for form security -->

        <!-- Customer Name -->
        <div class="mb-4">
            <label for="customer_name" class="block text-gray-700 font-medium mb-2">Customer Name</label>
            <input type="text" name="customer_name" id="customer_name" class="w-full border rounded-lg p-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter your name" required>
        </div>

        <!-- Phone Number -->
        <div class="mb-4">
            <label for="phone_num" class="block text-gray-700 font-medium mb-2">Phone Number</label>
            <input type="text" name="phone_num" id="phone_num" class="w-full border rounded-lg p-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter your phone number" required>
        </div>

        <!-- Date -->
        <div class="mb-4">
            <label for="date" class="block text-gray-700 font-medium mb-2">Date</label>
            <input type="date" name="date" id="date" class="w-full border rounded-lg p-2 focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <!-- Time -->
        <div class="mb-4">
            <label for="time" class="block text-gray-700 font-medium mb-2">Time</label>
            <select name="time" id="time" class="w-full border rounded-lg p-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                <option value="" disabled selected>Select a time</option>
                <option value="09:00 AM">09:00 AM</option>
                <option value="10:00 AM">10:00 AM</option>
                <option value="11:00 AM">11:00 AM</option>
                <option value="12:00 PM">12:00 PM</option>
                <option value="01:00 PM">01:00 PM</option>
                <option value="02:00 PM">02:00 PM</option>
                <option value="03:00 PM">03:00 PM</option>
                <option value="04:00 PM">04:00 PM</option>
                <option value="05:00 PM">05:00 PM</option>
            </select>
        </div>

        <!-- Dermatologist -->
        <div class="mb-4">
            <label for="dermatologist_id" class="block text-gray-700 font-medium mb-2">Select Dermatologist</label>
            <select name="dermatologist_id" id="dermatologist_id" class="w-full border rounded-lg p-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                <option value="" disabled selected>Select a dermatologist</option>
                <option value="1">Dr. Cuddy</option>
                <option value="2">Dr. House</option>
                <option value="3">Dr. Wilson</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-indigo-600 text-white font-medium rounded-lg p-2 hover:bg-indigo-700 transition">
            Book Appointment
        </button>
    </form>
</div>


<div class="text-center mt-6">
    <a href="{{ route('dermatologist.login') }}" 
       class="bg-indigo-600 text-white font-medium rounded-lg px-6 py-2 hover:bg-indigo-700 transition">
       Login as Doctor
    </a>
</div>

<br>

        
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentDate = new Date();
        let selectedDate = currentDate;

        function updateCalendar(date) {
            const month = date.getMonth();
            const year = date.getFullYear();
            const firstDay = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();

            const calendarContainer = document.getElementById('calendar-container');
            calendarContainer.innerHTML = '';

            // Update month-year display
            document.getElementById('current-month-year').textContent = date.toLocaleString('default', { month: 'long', year: 'numeric' });

            // Add day headers
            const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            daysOfWeek.forEach(day => {
                const dayElement = document.createElement('div');
                dayElement.textContent = day;
                dayElement.style.fontWeight = 'bold';
                calendarContainer.appendChild(dayElement);
            });

            // Add empty cells for days before the first day
            let dayCount = 1;
            for (let i = 0; i < Math.ceil((firstDay + lastDate) / 7); i++) {
                for (let j = 0; j < 7; j++) {
                    const cell = document.createElement('div');
                    cell.style.padding = '10px';
                    cell.style.cursor = 'pointer';
                    if ((i === 0 && j < firstDay) || dayCount > lastDate) {
                        cell.textContent = '';
                    } else {
                        cell.textContent = dayCount;
                        cell.classList.add('date');
                        cell.setAttribute('data-date', `${year}-${String(month + 1).padStart(2, '0')}-${String(dayCount).padStart(2, '0')}`);
                        cell.addEventListener('click', function () {
                            document.getElementById('selected-date-container').textContent = `Selected Date: ${this.getAttribute('data-date')}`;
                            document.getElementById('selected-date').value = this.getAttribute('data-date');
                            document.getElementById('time-slot-container').style.display = 'block';
                        });
                        dayCount++;
                    }
                    calendarContainer.appendChild(cell);
                }
            }
        }

        document.getElementById('prev-month').addEventListener('click', function () {
            selectedDate.setMonth(selectedDate.getMonth() - 1);
            updateCalendar(selectedDate);
        });

        document.getElementById('next-month').addEventListener('click', function () {
            selectedDate.setMonth(selectedDate.getMonth() + 1);
            updateCalendar(selectedDate);
        });

        document.querySelectorAll('.time-slot').forEach(slot => {
            slot.addEventListener('click', function () {
                document.getElementById('selected-time').value = this.getAttribute('data-time');
                document.getElementById('appointment-form').classList.remove('d-none');
            });
        });

        updateCalendar(currentDate);
    });
</script>
@include('footer')

@endsection

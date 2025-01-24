@extends('layouts.app')

@section('content')
@include('navbar')

<div class="container" style="max-width: 800px; margin-top: 50px; margin-left: 350px; text-align: center;">
    <h2 class="my-4" style="font-family: Arial, sans-serif; color: #4B0082;">Dermatologist Booking</h2>

    <!-- Calendar Container -->
    <div id="calendar" style="background-color: #E6D5E2; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
        <div id="calendar-container" class="calendar" style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 8px; text-align: center;"></div>
    </div>

    <!-- Selected Date -->
    <div id="selected-date-container" style="margin-top: 20px; font-weight: bold; font-size: 18px;"></div>

    <!-- Available Dermatologists -->
    <div id="dermatologists-container" style="margin-top: 20px; display: none;"></div>

    <!-- Available Times -->
    <div id="times-container" style="margin-top: 20px; display: none;"></div>

    <!-- Appointment Form -->
    <div id="appointment-form" class="mt-4 d-none">
        <h4 style="color: #4B0082;">Confirm Appointment</h4>
        <form id="booking-form" method="POST" action="{{ route('appointments.store') }}" style="max-width: 400px; margin: 0 auto;">
            @csrf
            <input type="hidden" name="date" id="selected-date">
            <input type="hidden" name="time" id="selected-time">
            <input type="hidden" name="dermatologist_id" id="selected-dermatologist-id">
            <div class="mb-3" style="margin-bottom: 20px;">
                <label for="customer_name" class="form-label" style="font-weight: bold; color: #4B0082;">Name</label>
                <input type="text" class="form-control" name="customer_name" id="customer_name" required style="border-radius: 8px; padding: 10px;">
            </div>
            <div class="mb-3" style="margin-bottom: 20px;">
                <label for="phone_num" class="form-label" style="font-weight: bold; color: #4B0082;">Phone Number</label>
                <input type="tel" class="form-control" name="phone_num" id="phone_num" required style="border-radius: 8px; padding: 10px;">
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #4B0082; color: white; width: 100%; padding: 12px; border-radius: 8px;">Submit</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        generateCalendar(new Date());

        document.getElementById('calendar-container').addEventListener('click', function (e) {
            if (e.target.classList.contains('date')) {
                const selectedDate = e.target.getAttribute('data-date');
                document.getElementById('selected-date').value = selectedDate;

                // Show the selected date
                document.getElementById('selected-date-container').textContent = `Selected Date: ${selectedDate}`;

                fetch(`/api/dermatologists/available?date=${encodeURIComponent(selectedDate)}`)
                    .then(response => response.json())
                    .then(data => {
                        const container = document.getElementById('dermatologists-container');
                        container.innerHTML = '';
                        if (data.length > 0) {
                            data.forEach(d => {
                                const button = document.createElement('button');
                                button.textContent = d.name;
                                button.className = 'btn btn-outline-primary m-1';
                                button.addEventListener('click', () => showAvailableTimes(d.id, selectedDate));
                                container.appendChild(button);
                            });
                            $('#dermatologists-container').show();
                        } else {
                            alert('No dermatologists available.');
                            $('#dermatologists-container').hide();
                        }
                    })
                    .catch(console.error);
            }
        });
    });

    function generateCalendar(date) {
        const month = date.getMonth();
        const year = date.getFullYear();
        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        const calendarContainer = document.getElementById('calendar-container');
        calendarContainer.innerHTML = '';

        // Add the header for the days of the week
        const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const headerRow = document.createElement('div');
        headerRow.classList.add('calendar-header');
        daysOfWeek.forEach(day => {
            const dayElement = document.createElement('div');
            dayElement.textContent = day;
            dayElement.classList.add('calendar-day');
            headerRow.appendChild(dayElement);
        });
        calendarContainer.appendChild(headerRow);

        // Add empty slots before the first day of the month
        let dayCount = 1;
        for (let i = 0; i < Math.ceil((firstDay + lastDate) / 7); i++) {
            const row = document.createElement('div');
            row.classList.add('calendar-row');
            for (let j = 0; j < 7; j++) {
                const cell = document.createElement('div');
                cell.classList.add('calendar-cell');
                if ((i === 0 && j >= firstDay) || (i > 0 && dayCount <= lastDate)) {
                    cell.textContent = dayCount;
                    cell.classList.add('date');
                    cell.setAttribute('data-date', `${year}-${String(month + 1).padStart(2, '0')}-${String(dayCount).padStart(2, '0')}`);
                    dayCount++;
                }
                row.appendChild(cell);
            }
            calendarContainer.appendChild(row);
        }
    }

    function showAvailableTimes(dermatologistId, date) {
        fetch(`/api/dermatologists/${dermatologistId}/times?date=${encodeURIComponent(date)}`)
            .then(response => response.json())
            .then(data => {
                const timesContainer = document.getElementById('times-container');
                timesContainer.innerHTML = '';
                if (data.length > 0) {
                    data.forEach(time => {
                        const button = document.createElement('button');
                        button.textContent = time;
                        button.classList.add('btn', 'btn-outline-success', 'm-1');
                        button.addEventListener('click', () => {
                            document.getElementById('selected-time').value = time;
                            document.getElementById('selected-dermatologist-id').value = dermatologistId;
                            document.getElementById('appointment-form').classList.remove('d-none');
                        });
                        timesContainer.appendChild(button);
                    });
                    $('#times-container').show();
                } else {
                    alert('No available times for this dermatologist on the selected date.');
                    $('#times-container').hide();
                }
            })
            .catch(error => console.error('Error fetching available times:', error));
    }
</script>

<style>
    .calendar-cell:hover {
        background-color: #f0f0f0;
    }
    .calendar-cell.date {
        font-weight: bold;
    }
    .calendar-header .calendar-day {
        background-color: #d6cdd6;
        font-weight: bold;
    }
    .calendar-day {
        text-align: center;
        padding: 10px;
        cursor: pointer;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #fff;
    }
    .calendar-cell {
        text-align: center;
        padding: 10px;
        cursor: pointer;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #fff;
    }
</style>
@endsection

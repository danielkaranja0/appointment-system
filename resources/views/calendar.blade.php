<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Appointments Calendar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Calendar styling */
        .container {
            max-width: 100%;
            font-family: Arial, sans-serif;
        }
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .calendar-header select {
            width: 150px;
            padding: 8px;
            border-radius: 5px;
        }
        .calendar-table {
            width: 100%;
            border-collapse: collapse;
        }
        .calendar-table th {
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: #fff;
        }
        .calendar-table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
            cursor: pointer;
        }
        .calendar-table td:hover {
            background-color: #f0f0f0;
        }
        .appointment-title {
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 col-sm-3 bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/appointments') }}">
                                <h1 class="h2">Dashboard</h1>
                                <i class="fas fa-calendar-alt mr-2 text-dark"></i>
                                <span class="text-dark">Appointments</span> <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ url('/users') }}">
                                <i class="fas fa-users mr-2 text-dark"></i>
                                <span class="text-dark">Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ url('/calendar') }}">
                                <i class="fas fa-calendar mr-2 text-dark"></i>
                                <span class="text-dark">Calendar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-question-circle mr-2 text-dark"></i>
                                <span class="text-dark">Help</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Calendar -->
            <div class="col-md-10 col-sm-9">
                <div class="container">
                    <h1 class="text-center mb-4">Custom Appointments Calendar</h1>
                    <div class="calendar-header">
                        <select id="year-select" class="form-select" aria-label="Year select"></select>
                        <select id="month-select" class="form-select" aria-label="Month select"></select>
                    </div>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var yearSelect = document.getElementById('year-select');
            var monthSelect = document.getElementById('month-select');
            var currentYear = new Date().getFullYear();
            var currentMonth = new Date().getMonth() + 1;

            // Populate year select options
            for (var year = currentYear - 10; year <= currentYear + 10; year++) {
                var option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                yearSelect.appendChild(option);
            }

            // Populate month select options
            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            months.forEach(function(month, index) {
                var option = document.createElement('option');
                option.value = index + 1;
                option.textContent = month;
                monthSelect.appendChild(option);
            });

            // Render initial calendar
            renderCalendar(currentYear, currentMonth);

            // Event listeners for year and month select change
            yearSelect.addEventListener('change', function() {
                var selectedYear = parseInt(this.value);
                var selectedMonth = parseInt(monthSelect.value);
                renderCalendar(selectedYear, selectedMonth);
            });

            monthSelect.addEventListener('change', function() {
                var selectedYear = parseInt(yearSelect.value);
                var selectedMonth = parseInt(this.value);
                renderCalendar(selectedYear, selectedMonth);
            });

            // Render calendar based on the selected year and month
            function renderCalendar(year, month) {
                var appointments = [
                    { title: 'Meeting', day: 2 }, // Example data, you need to replace this with your actual appointments
                    { title: 'Conference', day: 10 },
                    { title: 'Interview', day: 20 }
                ];
                var firstDayOfMonth = new Date(year, month - 1, 1).getDay(); // Day of the week (0 - Sunday, 1 - Monday, ..., 6 - Saturday)
                var daysInMonth = new Date(year, month, 0).getDate();
                var calendarHtml = `<table class="calendar-table">
                                        <thead>
                                            <tr>
                                                <th>Sun</th>
                                                <th>Mon</th>
                                                <th>Tue</th>
                                                <th>Wed</th>
                                                <th>Thu</th>
                                                <th>Fri</th>
                                                <th>Sat</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;
                var day = 1;
                for (var i = 0; i < 6; i++) { // Maximum 6 weeks
                    calendarHtml += '<tr>';
                    for (var j = 0; j < 7; j++) {
                        if (i === 0 && j < firstDayOfMonth) {
                            calendarHtml += '<td></td>';
                        } else if (day > daysInMonth) {
                            break;
                        } else {
                            var appointment = appointments.find(appt => appt.day === day);
                            if (appointment) {
                                calendarHtml += `<td data-year="${year}" data-month="${month}" data-day="${day}">
                                                    <span class="appointment-title">${appointment.title}</span><br>
                                                    ${day}
                                                </td>`;
                            } else {
                                calendarHtml += `<td data-year="${year}" data-month="${month}" data-day="${day}">${day}</td>`;
                            }
                            day++;
                        }
                    }
                    calendarHtml += '</tr>';
                }
                calendarHtml += '</tbody></table>';
                calendarEl.innerHTML = calendarHtml;

                // Add event listeners to each day cell
                var dayCells = document.querySelectorAll('.calendar-table td');
                dayCells.forEach(function(cell) {
                    cell.addEventListener('click', function() {
                        var clickedYear = parseInt(this.getAttribute('data-year'));
                        var clickedMonth = parseInt(this.getAttribute('data-month'));
                        var clickedDay = parseInt(this.getAttribute('data-day'));
                        var appointment = appointments.find(appt => appt.day === clickedDay);
                        if (appointment) {
                            showAppointmentModal(appointment);
                        } else {
                            console.log('No appointment for this day');
                        }
                    });
                });
            }

            // Function to show appointment modal for the selected day
            function showAppointmentModal(appointment) {
                alert(`Appointment: ${appointment.title}\nDate: ${appointment.day}`);
            }
        });
    </script>
</body>
</html>

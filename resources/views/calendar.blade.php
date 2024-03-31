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
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
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
        .appointment-modal {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .appointment-modal h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center mb-4">Custom Appointments Calendar</h1>
    <div class="calendar-header">
        <select id="year-select" class="form-select" aria-label="Year select"></select>
        <select id="month-select" class="form-select" aria-label="Month select"></select>
    </div>
    <div id="calendar"></div>
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
                        calendarHtml += `<td data-year="${year}" data-month="${month}" data-day="${day}">${day}</td>`;
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
                    showAppointmentModal(clickedYear, clickedMonth, clickedDay);
                });
            });
        }

        // Function to show appointment modal for the selected day
        function showAppointmentModal(year, month, day) {
            var modalHtml = `<div class="appointment-modal">
                                <h3>Appointments for ${months[month - 1]} ${day}, ${year}</h3>
                                <!-- Add your appointment form here -->
                                <form>
                                    <div class="mb-3">
                                        <label for="appointment-title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="appointment-title" placeholder="Enter appointment title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="appointment-time" class="form-label">Time</label>
                                        <input type="time" class="form-control" id="appointment-time">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Appointment</button>
                                </form>
                            </div>`;
            // Display modal
            var modal = new bootstrap.Modal(document.body.appendChild(document.createElement('div')));
            modal.setContent(modalHtml);
            modal.show();
        }
    });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Calendar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Events Calendar</h1>
    <div id="calendar"></div>
</div>

<!-- Bootstrap JS (optional, needed for some FullCalendar features) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- FullCalendar JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.js"></script>
<!-- Moment JS (required by FullCalendar) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Display the calendar in the month view initially
            themeSystem: 'bootstrap', // Use Bootstrap theme
            events: [ // Event data array
                {
                    title: 'Event 1',
                    start: '2024-10-01'
                },
                {
                    title: 'Event 2',
                    start: '2024-10-05',
                    end: '2024-10-07'
                }
            ]
        });
        calendar.render(); // Render the calendar
    });
</script>

</body>
</html>

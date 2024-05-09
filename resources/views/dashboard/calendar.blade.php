@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <!-- Calendar content here -->
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        color: #000; /* Black text color */
    }

    .container-fluid {
        max-width: 1300px; /* Extend the container */
        margin: 0 auto;
        padding: 20px;
    }

    #calendar {
        background-color: #fff;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(242, 240, 240, 0.1);
        width: 100%; /* Set calendar width to 100% */
    }

    .fc-toolbar {
        padding: 10px;
        background-color: #f8f9fa; /* Light gray background */
        border-radius: 6px 6px 0 0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .fc-button {
        background-color: #f8f9fa; /* Light gray background */
        color: #000; /* Black text color */
        border: none;
        border-radius: 4px;
        padding: 8px 16px;
        cursor: pointer;
        margin-right: 5px;
    }

    .fc-button:hover {
        background-color: #e2e6ea; /* Darker gray background on hover */
    }

    .fc-button.fc-state-disabled {
        background-color: #cccccc;
        cursor: default;
    }

    .fc-day-header {
        background-color: #f8f9fa;
        font-weight: bold;
        text-align: center;
        border: none;
        padding: 10px;
    }

    .fc-day {
        padding: 10px;
        border: none;
    }

    .fc-day-top {
        text-align: center;
    }

    .fc-today {
        background-color: #f0f0f0;
    }

    .fc-event {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 2px 4px;
        margin-bottom: 2px;
    }

    .fc-event:hover {
        background-color: #0056b3;
    }
</style>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize the calendar
        var calendar = $("#calendar").fullCalendar({
            header: {
                left: "title",
                center: "agendaDay,agendaWeek,month",
                right: "prev,next today"
            },
            editable: true,
            firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
            selectable: true,
            defaultView: "month",
            events: [], // Initially, no events

            // Fetch appointments data from the backend and render them on the calendar
            eventSources: [
                // Fetch appointments from the route
                {
                    url: '/appointments',
                    type: 'GET',
                    success: function(response) {
                        // Parse the response data and format it for FullCalendar
                        var events = response.map(function(appointment) {
                            return {
                                title: appointment.name,
                                start: appointment.appointment_date + 'T' + appointment.appointment_time, // Combine date and time
                                allDay: false // Assuming appointments have specific times
                            };
                        });
                        // Render the fetched appointments on the calendar
                        calendar.fullCalendar('renderEvents', events, true);
                    },
                    error: function(error) {
                        console.error('Error fetching appointments:', error);
                    }
                }
            ]
        });
    });
</script>
@endsection

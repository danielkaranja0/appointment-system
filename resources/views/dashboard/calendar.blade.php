@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Calendar content here -->
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for showing event details -->
<div id="eventModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Appointment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Description:</strong> <span id="eventDescription"></span></p>
                <p><strong>Time:</strong> <span id="eventTime"></span></p>
                <p><strong>Date:</strong> <span id="eventDate"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        background-color: #f7f8fa;
        color: #343a40; /* Darker text color for contrast */
    }

    .container-fluid {
        max-width: 100%;
        padding: 20px;
    }

    #calendar {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        padding: 20px;
    }

    .fc-toolbar {
        padding: 10px;
        background-color: #4e73df; /* Soft blue for the header */
        border-radius: 8px 8px 0 0;
        margin-bottom: 20px;
    }

    .fc-toolbar h2 {
        margin: 0;
        font-weight: bold;
        color: #ffffff; /* White text for contrast */
    }

    .fc-button {
        background-color: #ffffff;
        color: #4e73df; /* Matching button color with the toolbar */
        border: 1px solid #4e73df;
        border-radius: 4px;
        padding: 8px 16px;
        cursor: pointer;
        margin-right: 5px;
        font-weight: bold;
    }

    .fc-button:hover {
        background-color: #4e73df;
        color: #ffffff; /* White text when hovered */
        border-color: #4e73df;
    }

    .fc-day-header {
        background-color: #f1f3f5;
        text-align: center;
        font-weight: bold;
        padding: 10px;
        color: #6c757d; /* Light grey for day headers */
    }

    .fc-day {
        padding: 10px;
    }

    .fc-event {
        background-color: #1cc88a; /* Green event color for success */
        color: #ffffff;
        border-radius: 4px;
        padding: 5px 10px;
        font-size: 12px;
    }

    .fc-event:hover {
        background-color: #17a673; /* Darker green for hover effect */
    }

    .fc-event.fc-state-disabled {
        background-color: #e9ecef;
        color: #6c757d;
    }

    .fc-today {
        background-color: #e9ecef; /* Light grey background for today */
    }

    /* Modal styling */
    .modal-header {
        background-color: #4e73df;
        color: white;
    }

    .modal-body {
        font-size: 16px;
        color: #343a40;
    }

    .modal-footer {
        text-align: right;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .container-fluid {
            padding: 10px;
        }

        #calendar {
            padding: 10px;
        }

        .fc-toolbar h2 {
            font-size: 18px;
        }

        .fc-button {
            font-size: 12px;
            padding: 6px 12px;
        }
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script>
    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true,
            selectable: true,
            firstDay: 1,
            defaultView: 'month',
            eventLimit: true, // Limits the number of events per day
            events: [], // Initially empty; will fetch events from the server

            // Fetch appointments from the backend and render them on the calendar
            eventSources: [
                {
                    url: '/appointments',
                    type: 'GET',
                    success: function(response) {
                        var events = response.map(function(appointment) {
                            return {
                                title: appointment.description,
                                start: appointment.appointment_date + 'T' + appointment.appointment_time,
                                allDay: false,
                                description: appointment.description, // Pass description
                                time: appointment.appointment_time,  // Pass appointment time
                                date: appointment.appointment_date  // Pass appointment date
                            };
                        });
                        calendar.fullCalendar('renderEvents', events, true);
                    },
                    error: function(error) {
                        console.error('Error fetching appointments:', error);
                        alert('There was an error loading the calendar events.');
                    }
                }
            ],

            // Handling event click to show more details in the modal
            eventClick: function(event) {
                $('#eventDescription').text(event.description); // Display description
                $('#eventTime').text(event.time); // Display time
                $('#eventDate').text(event.date); // Display date
                $('#eventModal').modal('show'); // Show the modal with event details
            }
        });
    });
</script>
@endsection

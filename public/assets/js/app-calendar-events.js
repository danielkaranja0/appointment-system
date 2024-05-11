"use strict";

// Fetch appointments data from the JSON route
fetch('http://127.0.0.1:8000/appointments')
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    // Parse the fetched data and format it for FullCalendar
    const events = data.map(appointment => ({
      id: appointment.id,
      title: appointment.name,
      start: new Date(appointment.appointment_date + 'T' + appointment.appointment_time), // Combine date and time
      allDay: false
    }));

    // Initialize the FullCalendar with the fetched appointments
    const calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
      // Your FullCalendar options
      // ...
      events: events // Assign the fetched events to the calendar
    });

    calendar.render(); // Render the calendar
  })
  .catch(error => {
    console.error('Error fetching appointments:', error);
  });

let date = new Date(),
    nextDay = new Date((new Date).getTime() + 864e5),
    nextMonth = 11 === date.getMonth() ? new Date(date.getFullYear() + 1, 0, 1) : new Date(date.getFullYear(), date.getMonth() + 1, 1),
    prevMonth = 11 === date.getMonth() ? new Date(date.getFullYear() - 1, 0, 1) : new Date(date.getFullYear(), date.getMonth() - 1, 1),
    events = [];

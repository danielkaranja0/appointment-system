@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card app-calendar-wrapper">
      <div class="row g-0">
        <!-- Calendar Sidebar -->
        <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
          <div class="border-bottom p-4 my-sm-0 mb-3">

          </div>
          <div class="p-4">
            <!-- inline calendar (flatpicker) -->
            <div class="ms-n2">
              <div class="inline-calendar"></div>
            </div>

            <hr class="container-m-nx my-4">

            <!-- Filter -->
            <div class="mb-4">
              <small class="text-small text-muted text-uppercase align-middle">Filter</small>
            </div>

            <div class="form-check mb-2">
              <input class="form-check-input select-all" type="checkbox" id="selectAll" data-value="all" checked>
              <label class="form-check-label" for="selectAll">View All</label>
            </div>

            <div class="app-calendar-events-filter">
              <div class="form-check form-check-danger mb-2">
                <input class="form-check-input input-filter" type="checkbox" id="select-personal" data-value="personal" checked>
                <label class="form-check-label" for="select-personal">Personal</label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input input-filter" type="checkbox" id="select-business" data-value="business" checked>
                <label class="form-check-label" for="select-business">Business</label>
              </div>
              <div class="form-check form-check-warning mb-2">
                <input class="form-check-input input-filter" type="checkbox" id="select-family" data-value="family" checked>
                <label class="form-check-label" for="select-family">Family</label>
              </div>
              <div class="form-check form-check-success mb-2">
                <input class="form-check-input input-filter" type="checkbox" id="select-holiday" data-value="holiday" checked>
                <label class="form-check-label" for="select-holiday">Holiday</label>
              </div>
              <div class="form-check form-check-info">
                <input class="form-check-input input-filter" type="checkbox" id="select-etc" data-value="etc" checked>
                <label class="form-check-label" for="select-etc">ETC</label>
              </div>
            </div>
          </div>
        </div>
        <!-- /Calendar Sidebar -->

        <!-- Calendar & Modal -->
        <div class="col app-calendar-content">
          <div class="card shadow-none border-0">
            <div class="card-body pb-0">
              <!-- FullCalendar -->
              <div id="calendar"></div>
            </div>
          </div>
          <div class="app-overlay"></div>
          <!-- FullCalendar Offcanvas -->
          <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar" aria-labelledby="addEventSidebarLabel">
            <div class="offcanvas-header border-bottom">
              <h5 class="offcanvas-title mb-2" id="addEventSidebarLabel">Add Appointment</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <form class="event-form pt-0" id="eventForm">
                <div class="mb-3">
                  <label class="form-label" for="eventTitle">Name</label>
                  <input type="text" class="form-control" id="appointmentName" name="name" placeholder="Appointee Name" required />
                </div>
                <!-- Category -->
                <div class="mb-3">
                    <label for="appointmentCategory" class="form-label">Category</label>
                    <select class="form-select" id="appointmentCategory" name="category" required>
                        <option value="staff_appointment">Staff Appointment</option>
                        <option value="business_consultation">Business Consultation</option>
                        <option value="business_appointment">Business Appointment</option>
                        <option value="conflict_resolution">Conflict Resolution</option>
                    </select>
                </div>
                <!-- Phone Number -->
                <div class="mb-3">
                    <label for="appointmentPhone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="appointmentPhone" name="phone" placeholder="Enter phone number" required>
                </div>
                <!-- Appointment Date -->
                <div class="mb-3">
                    <label for="appointmentDate" class="form-label">Appointment Date</label>
                    <input type="date" class="form-control" id="appointmentDate" name="appointment_date" required>
                </div>
                <!-- Appointment Time -->
                <div class="mb-3">
                    <label for="appointmentTime" class="form-label">Appointment Time</label>
                    <input type="time" class="form-control" id="appointmentTime" name="appointment_time" required>
                </div>
                <!-- Description -->
                <div class="mb-3">
                    <label for="appointmentDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="appointmentDescription" name="description" placeholder="Enter description"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveAppointmentBtn">Save changes</button>
            </div>
          </div>
        </div>
        <!-- /Calendar & Modal -->
      </div>
    </div>
  </div>
  <!-- /Content -->
</div>

<!-- Refer Appointment Modal -->
<div class="modal fade" id="referAppointmentModal" tabindex="-1" aria-labelledby="referAppointmentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="referAppointmentModalLabel">Refer Appointment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p>Enter the mobile number to refer the appointment:</p>
              <input type="tel" id="referralPhoneNumber" class="form-control" placeholder="Enter mobile number">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="referAppointmentBtn">Refer</button>
          </div>
      </div>
  </div>
</div>
@endsection

<!-- JavaScript for Calendar -->
@section('scripts')
<script src="assets/vendor/libs/fullcalendar/fullcalendar.js"></script>
<script src="assets/vendor/libs/select2/select2.js"></script>
<script src="assets/vendor/libs/flatpickr/flatpickr.js"></script>
<script src="assets/vendor/libs/moment/moment.js"></script>
<script src="assets/js/app-calendar-events.js"></script>
<script src="assets/js/app-calendar.js"></script>
<script src="assets/js/config.js"></script>
<script>

</script>
@endsection

<!-- Stylesheets for Calendar -->
@section('styles')
<link rel="stylesheet" href="assets/vendor/css/pages/app-calendar.css" />
<link rel="stylesheet" href="assets/vendor/libs/fullcalendar/fullcalendar.css" />
<link rel="stylesheet" href="assets/vendor/libs/flatpickr/flatpickr.css" />
<link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/libs/quill/editor.css" />
<link rel="stylesheet" href="assets/vendor/libs/%40form-validation/umd/styles/index.min.css" />
@endsection

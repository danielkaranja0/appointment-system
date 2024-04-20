@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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

        <!-- Add Appointment Button and Modal -->
        <div class="col-md-10 col-sm-9">
            <div class="container">
                <p>This table displays all appointments. You can add a new appointment by clicking the "Add Appointment" button below.</p>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAppointmentModal">
                        Add Appointment
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-labelledby="addAppointmentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addAppointmentModalLabel">Add New Appointment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for adding appointment -->
                                <form id="addAppointmentForm">
                                    @csrf
                                    <!-- Appointment Name -->
                                    <div class="mb-3">
                                        <label for="appointmentName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="appointmentName" name="name" placeholder="Enter name" required>
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

                                    <!-- No status field for adding appointment -->
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveAppointmentBtn">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Appointments Table -->
                <h1>Appointments</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Phone Number</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through your appointments data and display them in rows -->
                        @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ $appointment->category }}</td>
                            <td>{{ $appointment->phone }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>{{ $appointment->description }}</td>
                            <td>
                                <!-- Add actions/buttons here, e.g., Edit, Delete, Approve, Reject, Reschedule, Refer -->
                                <button class="btn btn-primary edit-appointment" data-id="{{ $appointment->id }}" data-bs-toggle="modal" data-bs-target="#editAppointmentModal">Edit</button>
                                <button class="btn btn-danger delete-appointment" data-id="{{ $appointment->id }}">Delete</button>
                                <button class="btn btn-success approve-appointment" data-id="{{ $appointment->id }}">Approve</button>
                                <button class="btn btn-warning reject-appointment" data-id="{{ $appointment->id }}">Reject</button>
                                <button class="btn btn-info reschedule-appointment" data-id="{{ $appointment->id }}" data-bs-toggle="modal" data-bs-target="#editAppointmentModal">Reschedule</button>
                                <button class="btn btn-info refer-appointment" data-id="{{ $appointment->id }}" data-bs-toggle="modal" data-bs-target="#referAppointmentModal">Refer</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit Appointment Modal -->
<div class="modal fade" id="editAppointmentModal" tabindex="-1" aria-labelledby="editAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAppointmentModalLabel">Edit Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit appointment form -->
                
                <form id="editAppointmentForm">
                    @csrf
                    <!-- Appointment Name -->
                    <div class="mb-3">
                        <label for="editAppointmentName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editAppointmentName" name="name" required>
                    </div>
                    <!-- Appointment Category -->
                    <div class="mb-3">
                        <label for="editAppointmentCategory" class="form-label">Category</label>
                        <select class="form-select" id="editAppointmentCategory" name="category" required>
                            <option value="staff_appointment">Staff Appointment</option>
                            <option value="business_consultation">Business Consultation</option>
                            <option value="business_appointment">Business Appointment</option>
                            <option value="conflict_resolution">Conflict Resolution</option>
                        </select>
                    </div>
                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label for="editAppointmentPhone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="editAppointmentPhone" name="phone" required>
                    </div>
                    <!-- Appointment Date -->
                    <div class="mb-3">
                        <label for="editAppointmentDate" class="form-label">Appointment Date</label>
                        <input type="date" class="form-control" id="editAppointmentDate" name="appointment_date" required>
                    </div>
                    <!-- Appointment Time -->
                    <div class="mb-3">
                        <label for="editAppointmentTime" class="form-label">Appointment Time</label>
                        <input type="time" class="form-control" id="editAppointmentTime" name="appointment_time" required>
                    </div>
                    <!-- Description -->
                    <div class="mb-3">
                        <label for="editAppointmentDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editAppointmentDescription" name="description" required></textarea>
                    </div>
                    <!-- Appointment Status -->
                    <div class="mb-3">
                        <label for="editAppointmentStatus" class="form-label">Status</label>
                        <select class="form-select" id="editAppointmentStatus" name="status" required>
                            <option value="accepted">Accepted</option>
                            <option value="rejected">Rejected</option>
                            <option value="rescheduled">Rescheduled</option>
                        </select>
                    </div>
                    <!-- Hidden input for appointment ID -->
                    <input type="hidden" id="editAppointmentId" name="appointment_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateAppointmentBtn">Update</button>
            </div>
        </div>
    </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listener for the save button
        document.getElementById('saveAppointmentBtn').addEventListener('click', function(e) {
            e.preventDefault();
            // Get form data
            const formData = new FormData(document.getElementById('addAppointmentForm'));

            // Send AJAX request to store the appointment
            fetch('{{ route("appointments.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Handle success response
                    console.log(data.message);
                    // location.reload(); // Reload the page to refresh the appointments table
                })
                .catch(error => {
                    // Handle error
                    console.log('Error:', error);
                });
        });

        // Event listener for the edit buttons
        document.querySelectorAll('.edit-appointment').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const appointmentId = this.getAttribute('data-id');

                // Fetch appointment details
                fetch(`{{ url('/appointments') }}/${appointmentId}`)
                .then(response => response.json())
                .then(data => {
                    // Populate the edit modal with appointment details
                    document.getElementById('editAppointmentId').value = data.id;
                    document.getElementById('editAppointmentName').value = data.name;
                    document.getElementById('editAppointmentCategory').value = data.category;
                    document.getElementById('editAppointmentPhone').value = data.phone;
                    document.getElementById('editAppointmentDate').value = data.appointment_date;
                    document.getElementById('editAppointmentTime').value = data.appointment_time;
                    document.getElementById('editAppointmentDescription').value = data.description;
                    document.getElementById('editAppointmentStatus').value = data.status;

                    // Show the edit modal
                    const editModal = new bootstrap.Modal(document.getElementById('editAppointmentModal'));
                    editModal.show();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });

        // Event listener for the delete buttons
        document.querySelectorAll('.delete-appointment').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const appointmentId = this.getAttribute('data-id');

                // Send AJAX request to delete the appointment
                fetch(`{{ url('/appointments') }}/${appointmentId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        // Handle success response
                        console.log('Appointment deleted successfully');
                        location.reload(); // Reload the page to refresh the appointments table
                    } else {
                        // Handle error response
                        console.error('Error:', response.statusText);
                    }
                })
                .catch(error => {
                    // Handle network error
                    console.error('Error:', error);
                });
            });
        });

        // Event listener for the update button in the edit modal
        document.getElementById('updateAppointmentBtn').addEventListener('click', function(e) {
            e.preventDefault();
            const appointmentId = document.getElementById('editAppointmentId').value;
            const formData = new FormData(document.getElementById('editAppointmentForm'));

            // Send AJAX request to update the appointment
            fetch(`{{ url('/appointments') }}/${appointmentId}`, {
                method: 'PUT',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Handle success response
                console.log(data.message);
                // location.reload(); // Reload the page to refresh the appointments table
            })
            .catch(error => {
                // Handle error
                console.error('Error:', error);
            });
        });

        // Event listener for the refer button in the refer modal
        document.getElementById('referAppointmentBtn').addEventListener('click', function(e) {
            e.preventDefault();
            const appointmentId = document.getElementById('editAppointmentId').value;
            const referralPhoneNumber = document.getElementById('referralPhoneNumber').value;

            // Send referral request
            fetch(`{{ url('/appointments') }}/${appointmentId}/refer`, {
                method: 'POST',
                body: JSON.stringify({ phone: referralPhoneNumber }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Handle success response
                console.log(data.message);
                // Close the modal
                const referModal = bootstrap.Modal.getInstance(document.getElementById('referAppointmentModal'));
                referModal.hide();
            })
            .catch(error => {
                // Handle error
                console.error('Error:', error);
            });
        });

        // Event listener for the approve buttons
        document.querySelectorAll('.approve-appointment').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const appointmentId = this.getAttribute('data-id');

                // Send AJAX request to approve the appointment
                fetch(`{{ url('/appointments') }}/${appointmentId}/approve`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Handle success response
                    console.log(data.message);
                    // Reload the page to refresh the appointments table
                    location.reload();
                })
                .catch(error => {
                    // Handle error
                    console.error('Error:', error);
                });
            });
        });

        // Event listener for the reject buttons
        document.querySelectorAll('.reject-appointment').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const appointmentId = this.getAttribute('data-id');

                // Send AJAX request to reject the appointment
                fetch(`{{ url('/appointments') }}/${appointmentId}/reject`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Handle success response
                    console.log(data.message);
                    // Reload the page to refresh the appointments table
                    location.reload();
                })
                .catch(error => {
                    // Handle error
                    console.error('Error:', error);
                });
            });
        });

       // Event listener for the reschedule buttons
document.querySelectorAll('.reschedule-appointment').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const appointmentId = this.getAttribute('data-id');

        // Fetch appointment details
        fetch(`{{ url('/appointments') }}/${appointmentId}`)
        .then(response => response.json())
        .then(data => {
            // Populate the edit modal with appointment details
            document.getElementById('editAppointmentId').value = data.id;
            document.getElementById('editAppointmentName').value = data.name;
            document.getElementById('editAppointmentCategory').value = data.category;
            document.getElementById('editAppointmentPhone').value = data.phone;
            document.getElementById('editAppointmentDate').value = data.appointment_date;
            document.getElementById('editAppointmentTime').value = data.appointment_time;
            document.getElementById('editAppointmentDescription').value = data.description;

            // Change the modal title
            document.getElementById('editAppointmentModalLabel').textContent = 'Reschedule Appointment';

            // Show the edit modal
            const editModal = new bootstrap.Modal(document.getElementById('editAppointmentModal'));
            editModal.show();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
</script>
@endsection

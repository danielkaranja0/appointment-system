@extends('layouts.admin')

@section('content')
   <!-- Content -->
   <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Approved</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">21,459</h4>
                                <small class="text-success">(+29%)</small>
                            </div>
                            <p class="mb-0">Total Users</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="bx bx-user bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Rejected</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">21,459</h4>
                                <small class="text-success">(+29%)</small>
                            </div>
                            <p class="mb-0">Total Users</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="bx bx-user bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Rescheduled</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">21,459</h4>
                                <small class="text-success">(+29%)</small>
                            </div>
                            <p class="mb-0">Total Users</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="bx bx-user bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Referred</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">21,459</h4>
                                <small class="text-success">(+29%)</small>
                            </div>
                            <p class="mb-0">Total Users</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="bx bx-user bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add other card components here -->
                <!-- Button to add appointment -->
    <div class="text-end mb-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAppointmentModal">
            Add Appointment
        </button>
    </div>
    <!-- End Button to add appointment -->
    </div>

    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title">Search Filter</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-4 user_role"></div>
                <div class="col-md-4 user_plan"></div>
                <div class="col-md-4 user_status"></div>
            </div>
        </div>
 
        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Phone Number</th>
                        <th>Appointment Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through your appointments data and display them in rows -->
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->category }}</td>
                        <td>{{ $appointment->phone }}</td>
                        <td>{{ $appointment->appointment_date }} {{ $appointment->appointment_time }}</td>
                        <td>{{ $appointment->status }}</td>
                        <td>
                            <!-- Buttons for actions -->
                            <button class="btn btn-sm btn-danger delete-appointment" data-id="{{ $appointment->id }}">Delete</button>
                            <button class="btn btn-sm btn-success approve-appointment" data-id="{{ $appointment->id }}">Approve</button>
                            <button class="btn btn-sm btn-warning reject-appointment" data-id="{{ $appointment->id }}">Reject</button>
                            <button class="btn btn-sm btn-warning refer-appointment" data-id="{{ $appointment->id }}">Refer</button>
                            <button class="btn btn-sm btn-info reschedule-appointment" data-id="{{ $appointment->id }}" data-bs-toggle="modal" data-bs-target="#editAppointmentModal">Reschedule</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modals -->
<!-- Add Appointment Modal -->
<div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-labelledby="addAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAppointmentModalLabel">Add New Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add appointment form -->
                <form method="POST" action="{{ route('appointment.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="appointmentName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="appointmentName" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentCategory" class="form-label">Category</label>
                        <select class="form-select" id="appointmentCategory" name="category" required>
                            <option value="staff_appointment">Staff Appointment</option>
                            <option value="business_consultation">Business Consultation</option>
                            <option value="business_appointment">Business Appointment</option>
                            <option value="conflict_resolution">Conflict Resolution</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentPhone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="appointmentPhone" name="phone" placeholder="Enter phone number" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentDate" class="form-label">Appointment Date</label>
                        <input type="date" class="form-control" id="appointmentDate" name="appointment_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentTime" class="form-label">Appointment Time</label>
                        <input type="time" class="form-control" id="appointmentTime" name="appointment_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="appointmentDescription" name="description" placeholder="Enter description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Appointment Modal -->
<div class="modal fade" id="editAppointmentModal" tabindex="-1" aria-labelledby="editAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAppointmentModalLabel">Reschedule Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit appointment form -->
                <form method="POST" action="{{ route('appointment.update', $appointment->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editAppointmentId" name="id">
                    <div class="mb-3">
                        <label for="editAppointmentName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editAppointmentName" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAppointmentCategory" class="form-label">Category</label>
                        <select class="form-select" id="editAppointmentCategory" name="category" required>
                            <option value="staff_appointment">Staff Appointment</option>
                            <option value="business_consultation">Business Consultation</option>
                            <option value="business_appointment">Business Appointment</option>
                            <option value="conflict_resolution">Conflict Resolution</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editAppointmentPhone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="editAppointmentPhone" name="phone" placeholder="Enter phone number" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAppointmentDate" class="form-label">Appointment Date</label>
                        <input type="date" class="form-control" id="editAppointmentDate" name="appointment_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAppointmentTime" class="form-label">Appointment Time</label>
                        <input type="time" class="form-control" id="editAppointmentTime" name="appointment_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAppointmentDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editAppointmentDescription" name="description" placeholder="Enter description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- <!-- Refer Appointment Modal -->
<div class="modal fade" id="referAppointmentModal" tabindex="-1" aria-labelledby="referAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="referAppointmentModalLabel">Refer Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="referAppointmentForm">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                           
                            +254
                        </span>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" pattern="\+254[0-9]{9}" title="Phone number must start with '+254' and have 9 additional digits" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveReferAppointmentBtn">Refer</button>
            </div>
        </div>
    </div>
</div>
 --}}


@endsection

@section('scripts')
<script>
 // JavaScript for search functionality
//  document.addEventListener('DOMContentLoaded', function() {
//         const searchInput = document.getElementById('searchInput');
//         const appointmentsTable = document.getElementById('appointmentsTable');

//         searchInput.addEventListener('input', function() {
//             const searchValue = this.value.toLowerCase();
//             const rows = appointmentsTable.getElementsByTagName('tr');

//             for (let i = 1; i < rows.length; i++) {
//                 const name = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();
//                 const category = rows[i].getElementsByTagName('td')[2].textContent.toLowerCase();
//                 const phoneNumber = rows[i].getElementsByTagName('td')[3].textContent.toLowerCase();
//                 const appointmentDate = rows[i].getElementsByTagName('td')[4].textContent.toLowerCase();
//                 const appointmentTime = rows[i].getElementsByTagName('td')[5].textContent.toLowerCase();
//                 const status = rows[i].getElementsByTagName('td')[6].textContent.toLowerCase();
//                 const description = rows[i].getElementsByTagName('td')[7].textContent.toLowerCase();

//                 if (name.includes(searchValue) || category.includes(searchValue) || phoneNumber.includes(searchValue) || appointmentDate.includes(searchValue) || appointmentTime.includes(searchValue) || status.includes(searchValue) || description.includes(searchValue)) {
//                     rows[i].style.display = '';
//                 } else {
//                     rows[i].style.display = 'none';
//                 }
//             }
//         });
//     });




    
//reject 
document.querySelectorAll('.reject-appointment').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const appointmentId = this.getAttribute('data-id');

        // Send AJAX request to reject the appointment
        fetch(`/appointment/${appointmentId}/reject`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Handle success response
            console.log(data.message);
            location.reload();
        })
        .catch(error => {
            // Handle error
            console.error('Error:', error);
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    // Add event listener for the save button
    document.getElementById('saveAppointmentBtn').addEventListener('click', function(e) {
        e.preventDefault();
        // Get form data
        const formData = new FormData(document.getElementById('addAppointmentForm'));

        // Send AJAX request to store the appointment
        fetch('{{ route("appointment.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Handle success response
            console.log(data.message);
            location.reload();
        })
        .catch(error => {
            // Handle error
            console.log('Error:', error);
        });
    });
});



document.querySelectorAll('.approve-appointment').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const appointmentId = this.getAttribute('data-id');

        // Send AJAX request to approve the appointment
        fetch(`/appointment/${appointmentId}/approve`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Handle success response
            console.log(data.message);
            location.reload();
            // Reload the page or update the status in the UI as needed
        })
        .catch(error => {
            // Handle error
            console.error('Error:', error);
        });
    });
});

// refer event listener
document.querySelectorAll('.refer-appointment').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const appointmentId = this.getAttribute('data-id');

        // Send AJAX request to refer the appointment
        fetch(`/appointment/${appointmentId}/refer`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Handle success response
            console.log(data.message);
            location.reload();
            // Reload the page or update the status in the UI as needed
        })
        .catch(error => {
            // Handle error
            console.error('Error:', error);
        });
    });
});

//delete event listener
document.querySelectorAll('.delete-appointment').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const appointmentId = this.getAttribute('data-id');

        // Send AJAX request to delete the appointment
        fetch(`/appointments/${appointmentId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Handle success response
            console.log(data.message);
            // Reload the page
            location.reload();
        })
        .catch(error => {
            // Handle error
            console.error('Error:', error);
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    // Event listener for clicking the "Reschedule" button
    document.querySelectorAll('.reschedule-appointment').forEach(button => {
        button.addEventListener('click', function() {
            const appointmentId = this.getAttribute('data-id');
            // Assuming you have an API endpoint to fetch appointment details
            fetch(`/appointment/${appointmentId}`, {
                method: 'GET'
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Populate the edit appointment form with appointment details
                document.getElementById('editAppointmentId').value = data.id;
                document.getElementById('editAppointmentName').value = data.name;
                document.getElementById('editAppointmentCategory').value = data.category;
                document.getElementById('editAppointmentPhone').value = data.phone;
                document.getElementById('editAppointmentDate').value = data.appointment_date;
                document.getElementById('editAppointmentTime').value = data.appointment_time;
                document.getElementById('editAppointmentDescription').value = data.description;
                // Show the edit appointment modal
                const modal = new bootstrap.Modal(document.getElementById('editAppointmentModal'));
                modal.show();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });

    // Event listener for submitting the edit appointment form
    document.getElementById('editAppointmentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const appointmentId = formData.get('id');
        // Assuming you have an API endpoint to update appointment details
        fetch(`/appointment/${appointmentId}`, {
            method: 'PUT',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data.message); // Handle success response
            // Optionally, close the modal or update the UI
            const modal = new bootstrap.Modal(document.getElementById('editAppointmentModal'));
            modal.hide();
        })
        .catch(error => {
            console.error('Error:', error); // Handle error
        });
    });
});


</script>
@endsection

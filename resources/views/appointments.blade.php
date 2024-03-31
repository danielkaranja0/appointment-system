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
                                <form>
                                    <!-- Appointment Name -->
                                    <div class="mb-3">
                                        <label for="appointmentName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="appointmentName" placeholder="Enter name" required>
                                    </div>
                                    
                                    <!-- Category -->
                                    <div class="mb-3">
                                        <label for="appointmentCategory" class="form-label">Category</label>
                                        <select class="form-select" id="appointmentCategory" required>
                                            <option value="">Select category</option>
                                            <option value="">Staff Appointment</option>
                                            <option value="">Business Consultation</option>
                                            <option value="">Company Meeting</option>
                                            <option value="">Conflict Resolution</option>
                                        </select>
                                    </div>
                                    <!-- Phone Number -->
                                    <div class="mb-3">
                                        <label for="appointmentPhone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="appointmentPhone" placeholder="Enter phone number" required>
                                    </div>
                                    <!-- Appointment Date -->
                                    <div class="mb-3">
                                        <label for="appointmentDate" class="form-label">Appointment Date</label>
                                        <input type="date" class="form-control" id="appointmentDate" required>
                                    </div>
                                    <!-- Appointment Time -->
                                    <div class="mb-3">
                                        <label for="appointmentTime" class="form-label">Appointment Time</label>
                                        <input type="time" class="form-control" id="appointmentTime" required>
                                    </div>
                                    <!-- Description -->
                                    <div class="mb-3">
                                        <label for="appointmentDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="appointmentDescription" placeholder="Enter description"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
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
                            <th>Description</th>
                            <th>Category</th>
                            <th>Phone Number</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through your appointments data and display them in rows -->
                        @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ $appointment->description }}</td>
                            <td>{{ $appointment->category }}</td>
                            <td>{{ $appointment->phone }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>
                                <!-- Add actions/buttons here, e.g., Edit, Delete -->
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

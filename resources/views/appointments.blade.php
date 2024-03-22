@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Appointments</h1>
    <div class="row mb-3">
        <div class="col-md-12 text-right">
            <button class="btn btn-success" data-toggle="modal" data-target="#addAppointmentModal">Add New Appointment</button>
        </div>
    </div>
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

<!-- Modal for adding new appointment -->
<div class="modal fade" id="addAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="addAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAppointmentModalLabel">Add New Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form fields for adding a new appointment here -->
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <!-- Add other required fields here -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Reset the form when the modal is closed
        $('#addAppointmentModal').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
        });
    });
</script>
@endpush

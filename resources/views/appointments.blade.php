@extends('layouts.app')

@section('content')
<div class="container">
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
@endsection

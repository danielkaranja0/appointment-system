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
                        <a class="nav-link" href="#">
                            <i class="fas fa-users mr-2 text-dark"></i>
                            <span class="text-dark">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
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
        <!-- Cards indicating appointment status -->
        <div class="col-md-8 col-sm-9 d-flex justify-content-between">
            <div class="card bg-success text-white" style="width: calc(25% - 20px); margin-right: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Approved Appointments</h5>
                    <p class="card-text">Manage all approved appointments here.</p>
                </div>
            </div>
            <div class="card bg-danger text-white" style="width: calc(25% - 20px); margin-right: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Rejected Appointments</h5>
                    <p class="card-text">View all rejected appointments here.</p>
                </div>
            </div>
            <div class="card bg-info text-white" style="width: calc(25% - 20px); margin-right: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Rescheduled Appointments</h5>
                    <p class="card-text">Check all rescheduled appointments here.</p>
                </div>
            </div>
            <div class="card bg-warning text-white" style="width: calc(25% - 20px);">
                <div class="card-body">
                    <h5 class="card-title">Referred Appointments</h5>
                    <p class="card-text">View all referred appointments here.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

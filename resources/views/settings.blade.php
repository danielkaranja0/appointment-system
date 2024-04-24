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
                        <a class="nav-link" href="{{ url('/help') }}" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="help">
                            <i class="fas fa-question-circle mr-2 text-dark"></i>
                            <span class="text-dark">Help</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/settings') }}" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="help">
                            <i class="fa fa-cog mr-2 text-dark"></i>
                            <span class="text-dark">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- General settings Section -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">General Settings</h1>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>System Name</h3>
                        <p>Your system name is "Appoint CMS".</p>
                    </div>
                    <div class="col-md-6">
                        <h3>System Version</h3>
                        <p>The current version of the system is 1.0.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

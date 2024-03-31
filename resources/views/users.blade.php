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

        <!-- Users Table -->
        <div class="col-md-10 col-sm-9">
            <div class="container">
                <h1>Users</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through your users data and display them in rows -->
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                <form action="#" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
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

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/appointments', function () {
    // Fetch appointments data from your database and pass it to the view
    $appointments = App\Models\Appointment::all(); // Adjust this according to your database model
    
    return view('appointments', compact('appointments'));
});

Route::get('/users', function () {
    // Fetch appointments data from your database and pass it to the view
    $users = App\Models\User::all(); // Adjust this according to your database model
    
    return view('users', compact('users'));
});

Route::get('/calendar', function () {
    return view('calendar');
});

Route::get('/help', function () {
    return view('help');
});

// routes/web.php



Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');




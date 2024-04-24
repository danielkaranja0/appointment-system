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
Route::get('/settings', function () {
    return view('settings');
});

Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');


Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');





Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);


Route::put('/appointments/{id}/approve', [AppointmentController::class, 'approve'])->name('appointments.approve');
Route::put('/appointments/{id}/reject', [AppointmentController::class, 'reject'])->name('appointments.reject');

Route::get('/appointments/{id}', [AppointmentController::class, 'show'])->name('appointments.show');

Route::put('/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');

Route::put('/appointments/{id}/reschedule', [AppointmentController::class, 'reschedule'])->name('appointments.reschedule');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;


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
    return view('dashboard.landing');
});
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


Route::get('/calendar', function () {
    return view('dashboard.calendar');
});

Route::get('/appointment', function () {
    return view('dashboard.appointment');
});
Route::get('/email', function () {
    return view('dashboard.email');
});
Route::get('user-management', function () {
    return view('dashboard.user-management');
});


Route::get('/support', function () {
    return view('dashboard.support');
});
Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/appointment', function () {
    // Fetch appointments data from your database and pass it to the view
    $appointments = App\Models\Appointment::all(); // Adjust this according to your database model
    
    return view('dashboard\appointment', compact('appointments'));
});

Route::get('/user-management', function () {
    // Fetch appointments data from your database and pass it to the view
    $users = App\Models\User::all(); // Adjust this according to your database model
    
    return view('dashboard\user-management', compact('users'));
});


Route::delete('/user-management/{user}', 'UserController@destroy')->name('user-management.destroy');

// web.php




// Define logout route
// Route::get('/logout', [App\Http\Controllers\AppointmentController::class, 'login'])->name('logout');


Route::get('/help', function () {
    return view('help');
});
Route::get('/settings', function () {
    return view('settings');
});

Route::post('appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');

Route::get('/appointment/{id}/edit', [AppointmentController::class, 'edit'])->name('appointment.edit');



Route::put('/appointment/{id}', [AppointmentController::class, 'update'])->name('appointment.update');



Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);


Route::put('/appointment/{id}/approve', [AppointmentController::class, 'approve'])->name('appointment.approve');
Route::put('/appointment/{id}/reject', [AppointmentController::class, 'reject'])->name('appointment.reject');

Route::get('/appointment/{id}', [AppointmentController::class, 'show'])->name('appointment.show');

Route::put('/appointment/{id}', [AppointmentController::class, 'update'])->name('appointment.update');

Route::put('/appointments/{id}/reschedule', [AppointmentController::class, 'reschedule'])->name('appointment.reschedule');




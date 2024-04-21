<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required', //in:staff_appointment,business_consultation,business_appointment,conflict_resolution
            'phone' => 'required',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'description' => 'nullable',
            // Remove 'status' validation as it will be set automatically
        ]);

        // Determine the default status based on the user's role
        $defaultStatus = Auth::user()->role === 'secretary' || Auth::user()->role === 'manager' 
            ? 'pending approval' 
            : 'approved';

        // Add the default status to the validated data
        $validatedData['status'] = $defaultStatus;

        // Create the appointment with the validated data
        Appointment::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Appointment created successfully'], 200);
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted successfully'], 200);
    }

    public function edit($id)
    {
        // Find the appointment by ID
        $appointment = Appointment::findOrFail($id);

        // Pass the appointment data to the view for editing
        return view('edit-appointment', compact('appointment'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:255',
        ]);
    
        // Find the appointment by ID
        $appointment = Appointment::findOrFail($id);
    
        // Update the appointment with the validated data
        $appointment->update($validatedData);
    
        // Return a success response
        return response()->json(['message' => 'Appointment updated successfully']);
    }


    public function reschedule(Request $request, $id)
    {
        // Validate the request data for rescheduling
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        // Find the appointment by ID
        $appointment = Appointment::findOrFail($id);
    
        // Update the appointment with the validated data
        $appointment->update($validatedData);
    
        // Return a success response
        return response()->json(['message' => 'Appointment rescheduled successfully']);
    }
    

    






    public function approve($id)
{
    // Find the appointment by ID
    $appointment = Appointment::findOrFail($id);

    // Update the status to 'approved'
    $appointment->update(['status' => 'approved']);

    // Return a success response
    return response()->json(['message' => 'Appointment approved successfully']);
}

public function reject($id)
{
    // Find the appointment by ID
    $appointment = Appointment::findOrFail($id);

    // Update the status to 'rejected'
    $appointment->update(['status' => 'rejected']);

    // Return a success response
    return response()->json(['message' => 'Appointment rejected successfully']);
}
public function show($id)
{
    $appointment = Appointment::findOrFail($id);
    return response()->json($appointment);
}


}

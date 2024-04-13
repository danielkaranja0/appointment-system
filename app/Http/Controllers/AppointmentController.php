<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required', //in:staff_appointment,business_consultation,business_appointment,conflict_resolution
            'phone' => 'required',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'description' => 'nullable',
            'status' => 'required',
        ]);

        Appointment::create($validatedData);

        return response()->json(['message' => 'Appointment created successfully'], 200);
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted successfully'], 200);
    }
    // public function index()
    // {
    //     $appointments = Appointment::all();
    //     Log::info($appointments); // Log the retrieved appointments
    //     return view('calendar', compact('appointments'));
    // }

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
    
}

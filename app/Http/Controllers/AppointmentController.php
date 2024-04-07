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
}

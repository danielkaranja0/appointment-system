<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Traits\SMSNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    use SMSNotification;

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
        $defaultStatus = 'pending approval';
        // Add the default status to the validated data
        $validatedData['status'] = $defaultStatus;
    
        // Create the appointment with the validated data
        Appointment::create($validatedData);
    
        // Flash success message to the session
        session()->flash('success', 'Appointment created successfully');
    
        // Redirect back to the same page
        return redirect()->back();
    }
    

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted successfully'], 200);
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
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
        // 'status' => 'required|string|max:255',
    ]);


    // Find the appointment by ID
    $appointment = Appointment::findOrFail($id);

    // Update the appointment with the validated data
    $appointment->update($validatedData);

    // Redirect back to the edit page with a success message
    return redirect()->back();
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

        // Redirect back to the edit page with a success message
        return redirect()->back();
    }

    




    public function changeStatus($id, $status)
    {
        try {
            DB::beginTransaction();
            // Find the appointment by ID
            $appointment = Appointment::findOrFail($id);

            if ($status == 'approved') {
                // Update the status to 'approved'
                $appointment->update(['status' => 'approved']);

                // send sms notification
                $message = 'Hello ' . $appointment->name . ' your appointment is scheduled on ' . $appointment->appointment_date . ' at ' . $appointment->appointment_time;
            } else if ($status == 'rejected') {
                // Update the status to 'rejected'
                $appointment->update(['status' => 'rejected']);

                // send sms notification
                $message = 'Hello ' . $appointment->name . ', we are sorry your appointment did not go through at this time. Kindly try rescheduling at another time.';
            } else {
                return response()->json(['error' => 'status does not exist']);
            }

            $this->sendSms($appointment->phone, $message);
            // $phone = ['+254798343427'];
            // $this->sendSms($phone, $message);

            // Return a success response
            DB::commit();
            return response()->json(['message' => 'Appointment approved successfully']);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
            return response()->json(['error' => $th->getMessage()]);
        }
    }




    public function approve($id)
    {
        try {
            DB::beginTransaction();
            // Find the appointment by ID
            $appointment = Appointment::findOrFail($id);
    
            // Update the status to 'approved'
            $appointment->status = 'approved';
            $appointment->save();
    
            // Construct the message for the SMS notification
        $message = 'Hello ' . $appointment->name . ', you have an appointment scheduled on ' 
           . $appointment->appointment_date . ' at ' . $appointment->appointment_time 
           . ' for ' . $appointment->description . '.' . PHP_EOL 
           . 'For inquiries call: 0113936845';


    
            // Send SMS notification
            $this->sendSms($appointment->phone, $message);
    
            // Return a success response
            DB::commit();
            return response()->json(['message' => 'Appointment approved successfully']);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => $th->getMessage()]);
        }
    }
    

    public function refer(Request $request, $id)
{
    try {
        DB::beginTransaction();
        // Find the appointment by ID
        $appointment = Appointment::findOrFail($id);

        // Update the status to 'referred'
        $appointment->status = 'referred';
        $appointment->save();

        // Extract the phone number from the request
        $phoneNumber = $request->input('phone');

        // Send sms notification
       $message = 'Hello, you have an appointment referred to you for ' . $appointment->name . 
           ' scheduled on ' . $appointment->appointment_date . ' at ' . $appointment->appointment_time . 
           ".\nFor inquiries call: 0113936845";

        $this->sendSms($phoneNumber, $message);

        // Return a success response
        DB::commit();
        return response()->json(['message' => 'Appointment referred successfully']);
    } catch (\Throwable $th) {
        DB::rollback();
        return response()->json(['error' => $th->getMessage()]);
    }
}






    public function index()
    {
            // Fetch all appointments and order them by appointment_date and appointment_time in ascending order
    $appointments = Appointment::orderBy('appointment_date', 'desc')
                               ->orderBy('appointment_time', 'desc')
                               ->get();


        
        // Return the appointments data as JSON
        return response()->json($appointments);
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






<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use App\Traits\SMSNotification;
use Illuminate\Console\Command;
use Carbon\Carbon;

class SendAppointmentReminders extends Command
{
    use SMSNotification;

    protected $signature = 'appointments:send-reminders';

    protected $description = 'Send SMS reminders for appointments scheduled the next day';

    public function handle()
    {
        // Fetch appointments scheduled for the next day
        $tomorrow = Carbon::tomorrow()->toDateString();
        $appointments = Appointment::whereDate('appointment_date', $tomorrow)->get();

        foreach ($appointments as $appointment) {
            $message = 'Hello ' . $appointment->name . ', you have an appointment scheduled for tomorrow at ' . $appointment->appointment_time . '.';
            $this->sendSms($appointment->phone, $message);
        }

        $this->info('SMS reminders sent successfully for appointments scheduled tomorrow.');
    }
}

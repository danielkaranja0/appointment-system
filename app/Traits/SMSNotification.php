<?php

namespace App\Traits;

use AfricasTalking\SDK\AfricasTalking;

trait SMSNotification
{
    public function sendSms($phoneNumber, $message)
    {
        try {
            // Process phone number to ensure it starts with +254
            $phoneNumber = preg_replace('/\D/', '', $phoneNumber); // Remove all non-digit characters
            if (substr($phoneNumber, 0, 1) === '0') {
                // If the phone number starts with '0', replace it with '+254'
                $phoneNumber = '+254' . substr($phoneNumber, 1);
            } elseif (strlen($phoneNumber) === 9) {
                // If the phone number is 9 digits long, prepend '254' to it
                $phoneNumber = '254' . $phoneNumber;
            } else {
                // Throw an exception for invalid phone number format
                throw new \Exception("Invalid phone number format");
            }
        
            // AfricasTalking credentials
            $username = env('AFRICASTALKING_USERNAME');
            $apiKey   = env('AFRICASTALKING_API_KEY');
            $AT       = new AfricasTalking($username, $apiKey);
        
            // Get the SMS service
            $sms      = $AT->sms();
        
            // Send SMS
            $result   = $sms->send([
                'to'      => $phoneNumber,
                'message' => $message
            ]);
        
            return $result;
        } catch (\Throwable $th) {
            // Handle exceptions
            dd($th->getMessage());
        }
        
        
        
    }
}




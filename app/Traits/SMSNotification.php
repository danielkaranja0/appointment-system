<?php

namespace App\Traits;

use AfricasTalking\SDK\AfricasTalking;

trait SMSNotification
{
    public function sendSms($phoneNumber, $message)
    {

        try {
            // TODO: process phone number to make sure it starts with +254

            $username = env('AFRICASTALKING_USERNAME');
            $apiKey   = env('AFRICASTALKING_API_KEY');
            $AT       = new AfricasTalking($username, $apiKey);

            // Get one of the services
            $sms      = $AT->sms();

            // Use the service
            $result   = $sms->send([
                'to'      => $phoneNumber,
                'message' => $message
            ]);

            return $result;
        } catch (\Throwable $th) {
            dd($th->getMessage);
        }
    }
}




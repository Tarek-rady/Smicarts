<?php

namespace App\Http\Helpers;

use App\Models\User;

class Fatora
{
    public static function getCheckoutUrl($payment_data)
    {
        $user = auth()->user();

        $url = config('fatora.base_url') . '/checkout';

        $headers = [
            'api_key:' . config('fatora.api_key'),
            'Content-Type: application/json',
        ];

        $data = [
            "amount" => $payment_data['amount'],
            "currency" => "QAR",
            "order_id" => $payment_data['reservation_id'],
            "client" => [
                "name" => $user->name,
                "phone" => "+974 " . $user->phone,
                "email" => $user->email
            ],
            "language" => "en",
            "success_url" => config('fatora.success_url'),
            "failure_url" => config('fatora.failure_url'),
            "fcm_token" => $user->device_key,
            "save_token" => false
        ];
                
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;

    }

}

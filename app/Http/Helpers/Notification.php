<?php

namespace App\Http\Helpers;

use App\Models\User;

class Notification
{
    public static function sendMobileSms($phone, $msg)
    {
        $apikey = "CNR8yBapNLUXud0DTRDzdhHEH";
        $language = 2;
        $sender="ADS"; 
        $phone= "974".$phone; 
        $message = $msg;

        $url = "https://api-server14.com/api/send.aspx?apikey=$apikey&language=$language&sender=$sender&mobile=$phone&message=$message";
            
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        curl_close($ch); 	  
    }


    public static function sendFCMNotification($title, $message, $to = null)
    {
                
        $serverKey =  env('SERVER_KEY', 'AAAATVAZLy4:APA91bH1LJJ_lPAqxyaD9Rq6FtGTSPvSO0yNHlP1dwW0rFn_wgEiyWVWUmftWYi3xQlwGKiWDcbJzgwNp0YH827LeC7diigxL0h9m-A3dBKk9Cx7MXMYpnZRsDG4tWTOYZ7qg4n1ikOC');

        //$to = $to ?? "/topics/all" ;
        
        //$to = $to == null ? "registration_ids => $FcmToken":"to => $to" ;
        
        $to = $to != null ? ["to" => $to] : ["registration_ids" => User::whereNotNull('device_key')->pluck('device_key')->all()];


        $data = [
            "notification" => [
                "title"     => $title,
                "body"      => $message,
                "sound"     => 'default',
            ]
        ];
        
        $data = array_merge($to,$data);
        
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        
        // Close connection
        curl_close($ch);
        
        //dd($result);
    }
}

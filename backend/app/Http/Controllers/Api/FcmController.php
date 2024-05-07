<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FcmController extends Controller
{

    public function updateFcmToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fcm_token' => 'required|string',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $user = User::where('guid', auth('api')->user()->guid)
            ->first();

        $user->fcm_token = $request->get('fcm_token');
        $user->save();

        return ResponseController::getResponse(null, 200, 'Change FCM Token success');
    }

    public function sendCheckInReminderPushNotification()
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fcmToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();

        $serverKey = env('FCM_SERVER_KEY');

        $data = [
            "registration_ids" => $fcmToken,
            "notification" => [
                "title" => 'Reminder Check In',
                "body" => 'Don\'t forget to check in today :)',
            ],
            "data" => [
                "deeplink" => 'https://wsystem.page.link/attendance',
                "type" => 'attendance',
                "guid" => '',
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response

        return ResponseController::getResponse(json_decode($result), 200, 'Success');
    }

    public function sendCheckOutReminderPushNotification()
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

//        $fcmToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();
        $fcmToken = [];

        $attendances = Attendance::with('user')
            ->whereDate('check_in_time', '=', Carbon::today())
            ->get();

        if (!$attendances->isEmpty()) {
            foreach ($attendances as $attendance) {
                if ($attendance->user->fcm_token !== null) {
                    array_push($fcmToken, $attendance->user->fcm_token);
                }
            }
        }

        $serverKey = env('FCM_SERVER_KEY');

        $data = [
            "registration_ids" => $fcmToken,
            "notification" => [
                "title" => 'Reminder Check Out',
                "body" => 'Don\'t forget to check out today :)',
            ],
            "data" => [
                "deeplink" => 'https://wsystem.page.link/attendance',
                "type" => 'attendance',
                "guid" => '',
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response

        return ResponseController::getResponse(json_decode($result), 200, 'Success');
    }


    public function sendPushNotification(String $title, String $body, String $type, String $deeplink)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fcmToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();

        $serverKey = env('FCM_SERVER_KEY');

        $data = [
            "registration_ids" => $fcmToken,
            "notification" => [
                "title" => $title,
                "body" => $body,
            ],
            "data" => [
                "deeplink" => $deeplink,
                "type" => $type,
                "guid" => '',
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response

        return ResponseController::getResponse(json_decode($result), 200, 'Success');
    }

    public function sendPushNotificationUser(String $title, String $body, String $type, String $deeplink, String $fcmToken)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
//        $fcmToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();

        $serverKey = env('FCM_SERVER_KEY');

        $data = [
            "registration_ids" => [$fcmToken],
            "notification" => [
                "title" => $title,
                "body" => $body,
            ],
            "data" => [
                "deeplink" => $deeplink,
                "type" => $type,
                "guid" => '',
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response

        return ResponseController::getResponse(json_decode($result), 200, 'Success');
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $session = new Session();
        $token = $session->get('access_token');

        if (isset($request['start-check-in'])) {
            $currentStartCheckIn = $request['start-check-in'];
        } else {
            $currentStartCheckIn = Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d');
        }

        if (isset($request['end-check-in'])) {
            $currentEndCheckIn = $request['end-check-in'];
        } else {
            $currentEndCheckIn = Carbon::now()->setTimezone('Asia/Jakarta')->endOfDay();
        }

        return view('dashboard.attendance.index', compact('token', 'currentStartCheckIn', 'currentEndCheckIn', 'session'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        $responseLeaveRequest = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/users/leave-request');
        $leaverequest = json_decode($responseLeaveRequest, true);

        return view('dashboard.leaverequest.index', compact('token', 'leaverequest', 'session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        ///USER
        $responseUser = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/user');
        $users = json_decode($responseUser, true);

        $responseLeaveType = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/leave-type/datatable');
        $leaveType = json_decode($responseLeaveType, true);

        $responseLeaveRequest = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/users/leave-request');
        $leaverequest = json_decode($responseLeaveRequest, true);

        return view('dashboard.leaverequest.insert', compact('token','users', 'leaveType', 'leaverequest', 'session'));
    }

}

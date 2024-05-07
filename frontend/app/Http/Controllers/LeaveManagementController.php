<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class LeaveManagementController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');
        $currentApprovalStatus = '';

        return view('dashboard.leavemanagement.index', compact('token', 'session', 'currentApprovalStatus'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.leavemanagement.insert', compact('token', 'session'));
    }

    public function indexEdit($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        /// Leave
        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/admin/leave-request/' . $guid);
        $data = json_decode($response, true);

        return view('dashboard.leavemanagement.edit', compact('token', 'guid', 'data', 'session'));
    }

    // public function indexDetail($guid)
    // {
    //     $session = new Session();
    //     $token = $session->get('access_token');

    //     /// Leave
    //     $responseLeave = Http::withHeaders([
    //         'Authorization' => "Bearer " . $token,
    //         'Content-Type' => "application/json"
    //     ])->get(env("URL_API", "http://example.com") . '/api/v1/admin/leave-request/' . $guid);
    //     $leave = json_decode($responseLeave, true);

    //     return view('dashboard.leavemanagement.detail', compact('token', 'guid', 'leave', 'session'));
    // }
}


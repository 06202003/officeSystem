<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class LeaveHistoriesController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.leavemanagement.histories.index', compact('token', 'session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.leaveapplication.insert', compact('token', 'session'));
    }

    public function indexEdit()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.permission.edit', compact('token', 'session'));
    }

    // public function indexEdit($guid)
    // {
    //     $session = new Session();
    //     $token = $session->get('access_token');

    //     $response = Http::withHeaders([
    //         'Authorization' => "Bearer " . $token,
    //         'Content-Type' => "application/json"
    //     ])->get(env("URL_API", "http://example.com") . '/api/v1/permission/' . $guid);

    //     $data = json_decode($response, true);

    //     return view('dashboard.permission.edit', compact('token', 'data', 'session'));
    // }
}

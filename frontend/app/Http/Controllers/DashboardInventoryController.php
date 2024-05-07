<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class DashboardInventoryController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/inventory/');

        $data = json_decode($response, true);

        return view('dashboard.inventory.dashboard.index', compact('token', 'data', 'session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.inventory.dashboard.insert', compact('token', 'session'));
    }

    public function indexEdit($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/inventory/' . $guid);

        $data = json_decode($response, true);

        // if ($data['data']['user'] != null) {
        //     $user = $data['data']['user']['email'];
        // } else {
        //     $user = null;
        // }
        
        return view('dashboard.inventory.dashboard.edit', compact('token', 'data', 'session'));
    }
}

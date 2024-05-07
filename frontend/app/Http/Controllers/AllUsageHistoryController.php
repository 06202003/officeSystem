<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class AllUsageHistoryController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.inventory.all_usage_history.index', compact('token', 'session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.inventory.all_usage_history.insert', compact('token', 'session'));
    }

    public function indexEdit($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/usage-history/' . $guid);

        $data = json_decode($response, true);

        // if ($data['data']['user'] != null) {
        //     $user = $data['data']['user']['email'];
        // } else {
        //     $user = null;
        // }
        
        return view('dashboard.inventory.all_usage_history.edit', compact('token', 'data', 'session'));
    }
}

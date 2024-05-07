<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class DamageHistoryController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.damage-history.index', compact('token', 'session'));
    }
    public function indexInsertByInventory($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/inventory/' . $guid);

        $data = json_decode($response, true);
        if ($data['data']['user'] != null) {
            $user = $data['data']['user']['email'];
        } else {
            $user = null;
        }
        $data = $data['data'];
        return view('dashboard.damage-history.insert', compact('guid', 'data', 'user', 'token', 'session'));
    }
    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.damage-history.insert', compact('token', 'session'));
    }

    public function indexEdit($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/damage-history/' . $guid);

        $data = json_decode($response, true);
        $userLast = $data['data']['user_last']['email'];
        if ($data['data']['user_repair'] != null) {
            $userRepair = $data['data']['user_repair']['email'];
        } else {
            $userRepair = null;
        }
        $data = $data['data'];
        return view('dashboard.damage-history.edit', compact('guid', 'data', 'userLast', 'userRepair', 'token', 'session'));
    }

    public function indexDetail($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/damage-history/' . $guid);
        $data = json_decode($response, true);
        return view('dashboard.damage-history.detail', compact('token', 'guid', 'data', 'session'));
    }
}

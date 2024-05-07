<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class AllDamageHistoryController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.inventory.all_damage_history.index', compact('token', 'session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.inventory.all_damage_history.insert', compact('token', 'session'));
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
        $userLast = $data['data']['user_last']['name'];
        $inventory = $data['data']['inventory']['inventory_name'];

        if ($data['data']['user_repair'] != null) {
            $userRepair = $data['data']['user_repair']['name'];
        } else {
            $userRepair = null;
        }
        
        return view('dashboard.inventory.all_damage_history.edit', compact('token', 'data', 'userLast', 'inventory', 'userRepair', 'session'));
    }
}

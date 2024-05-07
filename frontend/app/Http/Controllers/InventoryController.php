<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class InventoryController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.inventory.index', compact('token', 'session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.inventory.insert', compact('token', 'session'));
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
        $category = $data['data']['category']["category_name"];
        $room = $data['data']['room']["room_name"];
        if ($data['data']['user'] != null) {
            $user = $data['data']['user']['email'];
        } else {
            $user = null;
        }


        return view('dashboard.inventory.edit', compact('token', 'data', 'category', 'user', 'room', 'session'));
    }

    public function indexDetail($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        ///Inventory
        $responseInventory = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/inventory/' . $guid);
        $inventory = json_decode($responseInventory, true);

        return view('dashboard.inventory.detail', compact('token', 'guid', 'inventory', 'session'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
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

        $productTags = "";
        foreach ($data['data']['inventory_tags'] as $p) {
            if ($productTags == "") {
                $productTags = $p["inventory_tag_name"];
            } else {
                $productTags = $productTags . ", " . $p["inventory_tag_name"];
            }
        }

        $authors = "";
        foreach ($data['data']['inventory_users'] as $p) {
            if ($authors == "") {
                $authors = $p["email"];
            } else {
                $authors = $authors . ", " . $p["email"];
            }
        }

        return view('dashboard.inventory.edit', compact('token', 'data', 'inventoryTags', 'authors', 'session'));
    }
}

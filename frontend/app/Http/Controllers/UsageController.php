<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class UsageController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.inventory.usage.index', compact('token', 'session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.inventory.usage.insert', compact('token', 'session'));
    }

    public function indexEdit($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/usage/' . $guid);

        $data = json_decode($response, true);

        $productTags = "";
        foreach ($data['data']['usage_tags'] as $p) {
            if ($productTags == "") {
                $productTags = $p["usage_tag_name"];
            } else {
                $productTags = $productTags . ", " . $p["usage_tag_name"];
            }
        }

        $authors = "";
        foreach ($data['data']['usage_users'] as $p) {
            if ($authors == "") {
                $authors = $p["email"];
            } else {
                $authors = $authors . ", " . $p["email"];
            }
        }

        return view('dashboard.inventory.usage.edit', compact('token', 'data', 'usageTags', 'authors', 'session'));
    }
}

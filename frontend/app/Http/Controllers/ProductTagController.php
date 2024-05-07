<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class ProductTagController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.product.tag.index', compact('token', 'session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.product.tag.insert', compact('token', 'session'));
    }

    public function indexEdit($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/product-tag/' . $guid);

        $data = json_decode($response, true);

        return view('dashboard.product.tag.edit', compact('token', 'data', 'session'));
    }
}

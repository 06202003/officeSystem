<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.product.index', compact('token', 'session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.product.insert', compact('token', 'session'));
    }

    public function indexEdit($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/product/' . $guid);

        $data = json_decode($response, true);

        $productTags = "";
        foreach ($data['data']['product_tags'] as $p) {
            if ($productTags == "") {
                $productTags = $p["product_tag_name"];
            } else {
                $productTags = $productTags . ", " . $p["product_tag_name"];
            }
        }

        $authors = "";
        foreach ($data['data']['product_users'] as $p) {
            if ($authors == "") {
                $authors = $p["email"];
            } else {
                $authors = $authors . ", " . $p["email"];
            }
        }

        return view('dashboard.product.edit', compact('token', 'data', 'productTags', 'authors', 'session'));
    }
}

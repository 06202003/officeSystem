<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class DivisionController extends Controller
{
    public function index(Request $request)
    {
        $currentDepartment = $request['department'];

        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/department');

        $departments = json_decode($response, true);

        return view('dashboard.division.index', compact('token', 'currentDepartment', 'departments', 'session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/department');

        $departments = json_decode($response, true);

        return view('dashboard.division.insert', compact('token', 'departments', 'session'));
    }

    public function indexEdit($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/division/' . $guid);

        $data = json_decode($response, true);

        $responseDepartment = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/department');

        $departments = json_decode($responseDepartment, true);

        return view('dashboard.division.edit', compact('token', 'data', 'departments', 'session'));
    }
}

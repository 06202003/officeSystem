<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.project.index', compact('token', 'session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        $responseUser = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/user');
        $users = json_decode($responseUser, true);

        $responseProjectMaster = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/projecthistorymaster/');
        $projectmasters = json_decode($responseProjectMaster, true);

        $responseProjectMaster = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/projecthistory/');
        $data = json_decode($responseProjectMaster, true);

        return view('dashboard.project.insert', compact('token', 'users', 'projectmasters', 'data', 'session'));
    }

    public function indexEdit($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/projecthistory/' . $guid);

        $data = json_decode($response, true);

        $responseUser = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/user');
        $users = json_decode($responseUser, true);

        $responseProjectMaster = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/projecthistorymaster/');
        $projectmasters = json_decode($responseProjectMaster, true);



        return view('dashboard.project.edit', compact('token', 'data', 'users', 'projectmasters', 'session'));
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.user.index', compact('token', 'session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        ///ROLE
        $responseRole = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/role');
        $roles = json_decode($responseRole, true);

        ///DEPARTMENT
        $responseDepartment = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/department');
        $departments = json_decode($responseDepartment, true);

        ///POSITION
        $responsePosition = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/position');
        $positions = json_decode($responsePosition, true);

        ///TYPE
        $types = [
            [
                "value" => "-",
                "name" => "-"
            ],
            [
                "value" => "First Line Management",
                "name" => "First Line Management"
            ],
            [
                "value" => "Middle Management",
                "name" => "Middle Management"
            ],
            [
                "value" => "Top Management",
                "name" => "Top Management"
            ],

        ];

        return view('dashboard.user.insert', compact('token', 'roles',  'departments', 'positions', 'types', 'session'));
    }

    public function indexEdit($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/user/' . $guid);

        $data = json_decode($response, true);

        $responseDepartment = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/department');

        $departments = json_decode($responseDepartment, true);

        return view('dashboard.user.edit', compact('token', 'data', 'departments', 'session'));
    }

    public function indexDetailProfile($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        ///USER PROFILE
        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/user/' . $guid);
        $profile = json_decode($responseProfile, true);

        ///TIMELINE
        $responseTimeline = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/data/timeline/' . $guid . '?page=1&limit=10');
        $timelines = json_decode($responseTimeline, true);

        return view('dashboard.user.detail-profile', compact('token', 'guid', 'profile', 'timelines', 'session'));
    }

    public function indexDetailAttendance($guid, Request $request)
    {
        $session = new Session();
        $token = $session->get('access_token');

        ///USER PROFILE
        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/user/' . $guid);
        $profile = json_decode($responseProfile, true);

        if (isset($request['date'])) {
            $date = $request['date'];
        } else {
            $date = Carbon::now()->format("m-Y");
        }

        return view('dashboard.user.detail-attendance', compact('token', 'guid', 'profile', 'date', 'session'));
    }

    public function indexDetailCV($guid, Request $request)
    {
        $session = new Session();
        $token = $session->get('access_token');

        ///USER PROFILE
        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/user/' . $guid);
        $profile = json_decode($responseProfile, true);

        $responseEducation = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/education');
        $education = json_decode($responseEducation, true);

        $responseSkill = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/skill');
        $skill = json_decode($responseSkill, true);

        $responseProject = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/projecthistory');
        $project = json_decode($responseProject, true);

        $responseWork = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/workhistory');
        $workhistory = json_decode($responseWork, true);

        $responseInfo = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/additionalinformation');
        $addinformation = json_decode($responseInfo, true);

        // dd($profile);

        return view('dashboard.user.detail-CV', compact('token', 'guid', 'profile', 'education', 'project', 'skill', 'session', 'workhistory', 'addinformation'));
    }

    public function indexDetailPrint($guid, Request $request)
    {
        $session = new Session();
        $token = $session->get('access_token');

        ///USER PROFILE
        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/user/' . $guid);
        $profile = json_decode($responseProfile, true);

        $responseEducation = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/education');
        $education = json_decode($responseEducation, true);

        $responseSkill = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/skill');
        $skill = json_decode($responseSkill, true);

        $responseProject = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/projecthistory');
        $project = json_decode($responseProject, true);

        $responseWork = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/workhistory');
        $workhistory = json_decode($responseWork, true);

        $responseInfo = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/additionalinformation');
        $addinformation = json_decode($responseInfo, true);

        $responseCities = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/cities');
        $cities = json_decode($responseCities, true);

        return view('dashboard.user.print-CV', compact('token', 'guid', 'profile', 'education', 'project', 'skill', 'session', 'workhistory', 'addinformation', 'cities'));
    }

    public function indexDetailInventory($guid, Request $request)
    {
        $session = new Session();
        $token = $session->get('access_token');

        ///USER PROFILE
        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/user/' . $guid);
        $profile = json_decode($responseProfile, true);

        if (isset($request['date'])) {
            $date = $request['date'];
        } else {
            $date = Carbon::now()->format("m-Y");
        }

        return view('dashboard.user.detail-inventory', compact('token', 'guid', 'profile', 'date', 'session'));
    }
}

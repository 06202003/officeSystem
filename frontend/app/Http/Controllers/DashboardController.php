<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        ///OVERALL
        $responseOverall = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/data/overall');
        $overall = json_decode($responseOverall, true);

        $percentageCheckedIn = round(($overall['data']['attendances']['checked_in'] / $overall['data']['attendances']['total_attendances']) * 100);
        if ($overall['data']['attendances']['checked_in'] == 0) {
            $percentageCheckedOut = 0;
        } else {
            $percentageCheckedOut = round(($overall['data']['attendances']['checked_out'] / $overall['data']['attendances']['checked_in']) * 100);
        }

        ///TIMELINE
        $responseTimeline = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/data/timeline?page=1&limit=10');
        $timelines = json_decode($responseTimeline, true);

        ///CURRENT CHECKED IN LOCATION
        $responseLocation = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/attendance/data-user-all-location');
        $locations = json_decode($responseLocation, true);

        return view('dashboard.index', compact('token', 'overall', 'percentageCheckedIn', 'percentageCheckedOut', 'timelines', 'locations', 'session'));
    }
}

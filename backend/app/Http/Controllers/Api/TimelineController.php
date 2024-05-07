<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TimelineController extends Controller
{

    public function getTimelines(Request $request): JsonResponse
    {
        $data = Timeline::with('user')->orderBy('created_at', 'desc')->simplePaginate($request->get('limit'));

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getTimelinesByUser($user_guid, Request $request): JsonResponse
    {
        $data = Timeline::where('user_guid', '=', $user_guid)->with('user')->orderBy('created_at', 'desc')->simplePaginate($request->get('limit'));

        return ResponseController::getResponse($data, 200, 'Success');
    }
}

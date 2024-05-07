<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\Attendance;
use App\Models\AttendanceLog;
use App\Models\Timeline;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttendanceLogController extends Controller
{


    public function updateLocation(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'location' => 'required|string',
            'is_other' => 'required|boolean',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// GET ATTENDANCE
        $attendance = Attendance::where('user_guid', '=', auth('api')->user()->getAuthIdentifier())
            ->whereDate('check_in_time', '=', Carbon::today())
            ->first();

        if ($attendance === null) {
            return ResponseController::getResponse(null, 404, "You haven't check in today, please check in first");
        }

        /// CHECK IF LOCATION IS OTHER
        $reason = null;
        if ($request->get('is_other')) {
            $validator = Validator::make($request->all(), [
                'other_reason' => 'required|string',
            ], MessagesController::messages());

            if ($validator->fails()) {
                return ResponseController::getResponse(null, 422, $validator->errors()->first());
            }

            $reason = $request->get('other_reason');
        }

        $log = AttendanceLog::create([
            'attendance_guid' => $attendance->guid,
            'longitude' => $request->get('longitude'),
            'latitude' => $request->get('latitude'),
            'location' => $request->get('location'),
            'url_selfie' => $request->get('url_selfie'),
            'other_reason' => $reason,
        ]);

        $timeline = Timeline::create([
            'user_guid' => $attendance->user_guid,
            'attendance_log_guid' => $log->guid,
            'title' => 'Attendance',
            'description' => 'Change location @' . Carbon::now('Asia/Jakarta')->format('H:i') . ' WIB',
        ]);

        /// GET LOGS
        $logs = AttendanceLog::where('attendance_guid', '=', $attendance->guid)
            ->orderBy('created_at', 'desc')
            ->get();

        if (!$logs->isEmpty()) {
            $currentLocation = $logs[$logs->count() - 1];
            $attendance->current_location = $currentLocation;
        }

        $attendance->log = $logs;

        return ResponseController::getResponse($attendance, 200, 'Success');
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\Attendance;
use App\Models\AttendanceLog;
use App\Models\Timeline;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;
use Yajra\DataTables\Facades\DataTables;

class AttendanceController extends Controller
{
    public function checkIn(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'url_selfie' => 'required|string',
            'location' => 'required|string',
            'is_other' => 'required|boolean',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }


        /// CHECK IF ALREADY CHECK IN
        $check = Attendance::where('user_guid', '=', auth('api')->user()->getAuthIdentifier())
            ->whereDate('check_in_time', '=', Carbon::today())
            ->count();

        if ($check > 0) {
            return ResponseController::getResponse(null, 422, "User already check in");
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

        /// INSERT DATA TO DB
        $data = Attendance::create([
            'user_guid' => auth('api')->user()->getAuthIdentifier(),
            'longitude' => $request->get('longitude'),
            'latitude' => $request->get('latitude'),
            'url_selfie' => $request->get('url_selfie'),
            'location' => $request->get('location'),
            'other_reason' => $reason,
            'check_in_time' => Carbon::now(),
        ]);

        $log = AttendanceLog::create([
            'attendance_guid' => $data->guid,
            'longitude' => $request->get('longitude'),
            'latitude' => $request->get('latitude'),
            'location' => $request->get('location'),
            'url_selfie' => $request->get('url_selfie'),
            'other_reason' => $request->get('other_reason'),
        ]);

        $timeline = Timeline::create([
            'user_guid' => $data->user_guid,
            'attendance_log_guid' => $log->guid,
            'title' => 'Attendance',
            'description' => 'Check in @' . Carbon::now('Asia/Jakarta')->format('H:i') . ' WIB',
        ]);

        $user = User::where('guid', auth('api')->user()->guid)
            ->first();

        $controller = new FcmController();
        $controller->sendPushNotificationUser(
            'Check In',
            'You have successfully checked in today at ' . Carbon::now('Asia/Jakarta')->format('H:i') . ' WIB',
            'attendance',
            'https://wsystem.page.link/attendance',
            $user->fcm_token
        );

        return ResponseController::getResponse($data, 200, 'Check In success');
    }

    public function checkOut(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'guid' => 'required|string',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// CHECK DATA
        $data = Attendance::where([
            ['guid', '=', $request->get('guid')],
            ['user_guid', '=', auth('api')->user()->getAuthIdentifier()],
        ])->first();

        if ($data == null) {
            return ResponseController::getResponse(null, 422, "Data not found");
        }

        /// UPDATE DB
        $data->check_out_time = Carbon::now();
        $data->save();

        $log = AttendanceLog::where('attendance_guid', '=', $data->guid)->first();
        $timeline = Timeline::create([
            'user_guid' => $data->user_guid,
            'attendance_log_guid' => $log->guid,
            'title' => 'Attendance',
            'description' => 'Check out @' . Carbon::now('Asia/Jakarta')->format('H:i') . ' WIB',
        ]);

        $user = User::where('guid', auth('api')->user()->guid)
            ->first();

        $controller = new FcmController();
        $controller->sendPushNotificationUser(
            'Check Out',
            'You have successfully checked out today at ' . Carbon::now('Asia/Jakarta')->format('H:i') . ' WIB',
            'attendance',
            'https://wsystem.page.link/attendance',
            $user->fcm_token
        );

        return ResponseController::getResponse($data, 200, 'Check In success');
    }

    public function status(): JsonResponse
    {
        /// GET ATTENDANCE
        $attendance = Attendance::where('user_guid', '=', auth('api')->user()->getAuthIdentifier())
            ->whereDate('check_in_time', '=', Carbon::today())
            ->first();

        if ($attendance !== null) {
            /// GET LOG
            $log = AttendanceLog::where('attendance_guid', '=', $attendance->guid)
                ->orderBy('created_at', 'desc')
                ->get();

            if (!$log->isEmpty()) {
                $currentLocation = $log[$log->count() - 1];
                $attendance->current_location = $currentLocation;
            }

            $attendance->log = $log;
        }

        return ResponseController::getResponse($attendance, 200, 'Success');
    }

//    public function status2(): JsonResponse
//    {
//        /// GET ATTENDANCE
//        $attendances = Attendance::get();
//
//
//        foreach ($attendances as $attendance) {
//
//            $log = AttendanceLog::create([
//                'attendance_guid' => $attendance->guid,
//                'longitude' => $attendance->longitude,
//                'latitude' => $attendance->latitude,
//                'location' => $attendance->location,
//                'url_selfie' => $attendance->url_selfie,
//                'other_reason' => $attendance->other_reason,
//                'created_at' => $attendance->created_at,
//                'updated_at' => $attendance->updated_at,
//            ]);
//        }
//
//        return ResponseController::getResponse($attendances, 200, 'Success');
//    }

    public function statusByUser($user_guid): JsonResponse
    {
        /// GET ATTENDANCE
        $attendance = Attendance::where('user_guid', '=', $user_guid)
            ->whereDate('check_in_time', '=', Carbon::today())
            ->first();

        if ($attendance !== null) {
            /// GET LOG
            $log = AttendanceLog::where('attendance_guid', '=', $attendance->guid)
                ->orderBy('created_at', 'desc')
                ->get();

            if (!$log->isEmpty()) {
                $currentLocation = $log[$log->count() - 1];
                $attendance->current_location = $currentLocation;
            }

            $attendance->log = $log;
        }

        return ResponseController::getResponse($attendance, 200, 'Success');
    }

    public function attendanceByGuid($guid): JsonResponse
    {
        /// GET ATTENDANCE
        $attendance = Attendance::where('guid', '=', $guid)
            ->with('user')
            ->first();

        if ($attendance !== null) {
            /// GET LOG
            $log = AttendanceLog::where('attendance_guid', '=', $attendance->guid)
                ->orderBy('created_at', 'desc')
                ->get();

            if (!$log->isEmpty()) {
                $currentLocation = $log[$log->count() - 1];
                $attendance->current_location = $currentLocation;
            }

            $attendance->log = $log;
        }

        return ResponseController::getResponse($attendance, 200, 'Success');
    }

    public function reset(): JsonResponse
    {
        /// DELETE ATTENDANCE
        $attendance = Attendance::where('user_guid', '=', auth('api')->user()->getAuthIdentifier())
            ->whereDate('check_in_time', '=', Carbon::today())
            ->first();

        if ($attendance !== null && $attendance->delete()) {
            return ResponseController::getResponse(true, 200, 'Success');
        }

        return ResponseController::getResponse(false, 404, 'Not Found');
    }

    public function userByLocation(Request $request): JsonResponse
    {

        $users = [];

        /// GET ATTENDANCE
        $attendances = Attendance::with('user')
            ->whereDate('check_in_time', '=', Carbon::today())
            ->get();

        if (!$attendances->isEmpty()) {
            foreach ($attendances as $attendance) {
                /// GET LOG
                $log = AttendanceLog::where('attendance_guid', '=', $attendance->guid)
                    ->orderBy('created_at', 'desc')
                    ->get();

                if ($request->get('location') === 'SK II/40'
                    || $request->get('location') === 'WIT. Building'
                    || $request->get('location') === 'Patal Senayan'
                ) {
                    if (!$log->isEmpty() && $log[$log->count() - 1]->location === $request->get('location')) {
                        array_push($users, $attendance->user);
                    }
                } else {
                    if (!$log->isEmpty()
                        && $log[$log->count() - 1]->location !== 'SK II/40'
                        && $log[$log->count() - 1]->location !== 'WIT. Building'
                        && $log[$log->count() - 1]->location !== 'Patal Senayan'
                    ) {
                        array_push($users, $attendance->user);
                    }
                }
            }
        }

        return ResponseController::getResponse($users, 200, 'Success');
    }

    public function countUserByLocation(): JsonResponse
    {

        $usersSkII40 = [];
        $usersWitBuilding = [];
        $usersPatalSenayan = [];
        $usersOther = [];
        $data = new stdClass();
        $data->sk_ii_40 = 0;
        $data->wit_building = 0;
        $data->patal_senayan = 0;
        $data->other = 0;

        /// GET ATTENDANCE
        $attendances = Attendance::with('user')
            ->whereDate('check_in_time', '=', Carbon::today())
            ->get();

        if (!$attendances->isEmpty()) {
            foreach ($attendances as $attendance) {

                /// GET LOG
                $log = AttendanceLog::where('attendance_guid', '=', $attendance->guid)
                    ->orderBy('created_at', 'desc')
                    ->get();

                if (!$log->isEmpty() && $log[$log->count() - 1]->location === 'SK II/40') {
                    array_push($usersSkII40, $attendance->user);
                } else if (!$log->isEmpty() && $log[$log->count() - 1]->location === 'WIT. Building') {
                    array_push($usersWitBuilding, $attendance->user);
                } else if (!$log->isEmpty() && $log[$log->count() - 1]->location === 'Patal Senayan') {
                    array_push($usersPatalSenayan, $attendance->user);
                } else if (!$log->isEmpty()
                    && $log[$log->count() - 1]->location !== 'SK II/40'
                    && $log[$log->count() - 1]->location !== 'WIT. Building'
                    && $log[$log->count() - 1]->location !== 'Patal Senayan'
                ) {
                    array_push($usersOther, $attendance->user);
                }
            }

            $data->sk_ii_40 = count($usersSkII40);
            $data->wit_building = count($usersWitBuilding);
            $data->patal_senayan = count($usersPatalSenayan);
            $data->other = count($usersOther);
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function dataUserAllLocation(): JsonResponse
    {

        $usersSkII40 = [];
        $usersWitBuilding = [];
        $usersPatalSenayan = [];
        $usersOther = [];

        $count = new stdClass();
        $count->sk_ii_40 = 0;
        $count->wit_building = 0;
        $count->patal_senayan = 0;
        $count->other = 0;

        $data = new stdClass();
        $data->count = $count;
        $data->sk_ii_40 = [];
        $data->wit_building = [];
        $data->patal_senayan = [];
        $data->other = [];

        /// GET ATTENDANCE
        $attendances = Attendance::with('user')
            ->whereDate('check_in_time', '=', Carbon::today())
            ->get();

        if (!$attendances->isEmpty()) {
            foreach ($attendances as $attendance) {

                /// GET LOG
                $log = AttendanceLog::where('attendance_guid', '=', $attendance->guid)
                    ->orderBy('created_at', 'desc')
                    ->get();

                if (!$log->isEmpty() && $log[$log->count() - 1]->location === 'SK II/40') {
                    array_push($usersSkII40, $attendance->user);
                } else if (!$log->isEmpty() && $log[$log->count() - 1]->location === 'WIT. Building') {
                    array_push($usersWitBuilding, $attendance->user);
                } else if (!$log->isEmpty() && $log[$log->count() - 1]->location === 'Patal Senayan') {
                    array_push($usersPatalSenayan, $attendance->user);
                } else if (!$log->isEmpty()
                    && $log[$log->count() - 1]->location !== 'SK II/40'
                    && $log[$log->count() - 1]->location !== 'WIT. Building'
                    && $log[$log->count() - 1]->location !== 'Patal Senayan'
                ) {
                    array_push($usersOther, $attendance->user);
                }
            }

            $count->sk_ii_40 = count($usersSkII40);
            $count->wit_building = count($usersWitBuilding);
            $count->patal_senayan = count($usersPatalSenayan);
            $count->other = count($usersOther);

            $data->count = $count;
            $data->sk_ii_40 = $usersSkII40;
            $data->wit_building = $usersWitBuilding;
            $data->patal_senayan = $usersPatalSenayan;
            $data->other = $usersOther;
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function rangeAttendance(Request $request)
    {

        $users = User::select('guid', 'name')
            ->where('role_guid', '2c2ce088-92f3-4ffa-b81d-9a1dd17a9076')
            ->get();

        ///FIND RANGE DATE
        $checkInStartTime = Carbon::parse($request['check_in_start_time']);
        $checkInEndTime = Carbon::parse($request['check_in_end_time']);
        $diff = $checkInStartTime->diffInDays($checkInEndTime);

        ///MAKE TEMP ARRAY FROM RANGE DATE
        $dateArray = [];
        $tempDate = $checkInStartTime;
        for ($i = 0; $i <= $diff; $i++) {
            foreach ($users as $user) {
                array_push(
                    $dateArray,
                    [
                        "guid" => "",
                        "user_guid" => $user->guid,
                        "name" => $user->name,
                        "attendance_date" => $tempDate->format('Y-m-d'),
                        "check_in_time" => null,
                        "check_out_time" => null,
                    ]
                );
            }
            $tempDate->addDay(1);
        }

        $attendances = Attendance::where('check_in_time', '>=', $request['check_in_start_time'])
            ->where('check_in_time', '<=', $request['check_in_end_time'])
            ->get();

        for ($i = 0; $i < count($dateArray); $i++) {
            foreach ($attendances as $attendance) {
                if ($dateArray[$i]['user_guid'] == $attendance->user_guid) {
                    $dateArray[$i]['guid'] = $attendance['guid'];
                    $dateArray[$i]['check_in_time'] = $attendance['check_in_time'];
                    $dateArray[$i]['check_out_time'] = $attendance['check_out_time'];
                    break;
                }
            }
        }

        return ResponseController::getResponse($dateArray, 200, 'Success');
    }

    public function rangeAttendanceDatatable(Request $request)
    {
        $users = User::select('guid', 'name')
            ->where('role_guid', '2c2ce088-92f3-4ffa-b81d-9a1dd17a9076')
            ->get();

        ///FIND RANGE DATE
        $checkInStartTime = Carbon::parse($request['check_in_start_time']);
        $checkInEndTime = Carbon::parse($request['check_in_end_time']);
        $diff = $checkInStartTime->diffInDays($checkInEndTime);

        $checkCurrentStart = Carbon::parse($checkInStartTime->format("Y-m-d") . " " . env("START_TIME_OF_DAY"))->subSecond();
        if ($checkInStartTime <= $checkCurrentStart) {
            $checkInStartTime = Carbon::parse($checkInStartTime->format("Y-m-d") . " " . env("START_TIME_OF_DAY"))->subDays(1);
        }

        ///MAKE TEMP ARRAY FROM RANGE DATE
        $dateArray = [];
        $tempDateCurrent = Carbon::parse($checkInStartTime->format("Y-m-d") . " " . env("START_TIME_OF_DAY"))->timezone("Asia/Jakarta");
        $tempDateStart = Carbon::parse($checkInStartTime->format("Y-m-d") . " " . env("START_TIME_OF_DAY"));
        $tempDateEnd = Carbon::parse($checkInStartTime->format("Y-m-d") . " " . env("START_TIME_OF_DAY"))->addDay(1)->subSecond();

        for ($i = 0; $i <= $diff; $i++) {
            foreach ($users as $user) {
                array_push(
                    $dateArray,
                    [
                        "guid" => "",
                        "user_guid" => $user->guid,
                        "name" => $user->name,
                        "attendance_date" => $tempDateCurrent->toString(),
                        "attendance_date_start" => $tempDateStart->toString(),
                        "attendance_date_end" => $tempDateEnd->toString(),
                        "check_in_time" => null,
                        "check_out_time" => null,
                    ]
                );
            }
            $tempDateCurrent->addDay(1);
            $tempDateStart->addDay(1);
            $tempDateEnd->addDay(1);
        }

        $attendances = Attendance::where('check_in_time', '>=', $request['check_in_start_time'])
            ->where('check_in_time', '<=', $request['check_in_end_time'])
            ->orderBy('check_in_time', "asc")
            ->get();

        for ($i = 0; $i < count($dateArray); $i++) {
            foreach ($attendances as $attendance) {
                $checkInTempArrayStart = Carbon::parse($dateArray[$i]['attendance_date_start']);
                $checkInTempArrayEnd = Carbon::parse($dateArray[$i]['attendance_date_end']);

                $checkInTemp = $attendance['check_in_time'];

                if ($dateArray[$i]['user_guid'] == $attendance->user_guid) {
                    if ($checkInTemp->between($checkInTempArrayStart, $checkInTempArrayEnd)) {
                        $dateArray[$i]['guid'] = $attendance['guid'];

                        $checkIn = null;
                        if ($attendance['check_in_time'] != null) {
                            $checkIn = $attendance['check_in_time']->format('Y-m-d H:i:s');
                        }

                        $checkOut = null;
                        if ($attendance['check_out_time'] != null) {
                            $checkOut = $attendance['check_out_time']->format('Y-m-d H:i:s');
                        }

                        $dateArray[$i]['check_in_time'] = $checkIn;
                        $dateArray[$i]['check_out_time'] = $checkOut;

                        break;
                    }
                }
            }
        }

        $dataTable = DataTables::of($dateArray)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function rangeAttendanceDatatableByUser(Request $request)
    {
        $user = User::select('guid', 'name')
            ->where('guid', $request['user_guid'])
            ->first();

        ///FIND RANGE DATE
        $checkInStartTime = Carbon::parse("01-" . $request['month_check_in']);
        $checkInEndTime = Carbon::parse("01-" . $request['month_check_in'])->endOfMonth();
        $diff = $checkInStartTime->diffInDays($checkInEndTime);

        $checkCurrentStart = Carbon::parse($checkInStartTime->format("Y-m-d") . " " . env("START_TIME_OF_DAY"))->subSecond();
        if ($checkInStartTime <= $checkCurrentStart) {
            $checkInStartTime = Carbon::parse($checkInStartTime->format("Y-m-d") . " " . env("START_TIME_OF_DAY"))->subDays(1);
        }

        ///MAKE TEMP ARRAY FROM RANGE DATE
        $dateArray = [];
        $tempDateCurrent = Carbon::parse($checkInStartTime->format("Y-m-d") . " " . env("START_TIME_OF_DAY"))->timezone("Asia/Jakarta");
        $tempDateStart = Carbon::parse($checkInStartTime->format("Y-m-d") . " " . env("START_TIME_OF_DAY"));
        $tempDateEnd = Carbon::parse($checkInStartTime->format("Y-m-d") . " " . env("START_TIME_OF_DAY"))->addDay(1)->subSecond();

        for ($i = 0; $i <= $diff; $i++) {
            // if (!$tempDateCurrent->isWeekend()) {
                array_push(
                    $dateArray,
                    [
                        "guid" => "",
                        "user_guid" => $user->guid,
                        "name" => $user->name,
                        "attendance_date" => $tempDateCurrent->toString(),
                        "attendance_date_start" => $tempDateStart->toString(),
                        "attendance_date_end" => $tempDateEnd->toString(),
                        "check_in_time" => null,
                        "check_out_time" => null,
                        "is_weekend" => $tempDateCurrent->isWeekend(),
                    ]
                );
            // }
            $tempDateCurrent->addDay(1);
            $tempDateStart->addDay(1);
            $tempDateEnd->addDay(1);
        }

        $attendances = Attendance::where('check_in_time', '>=', $checkInStartTime)
            ->where('check_in_time', '<=', $checkInEndTime)
            ->orderBy('check_in_time', "asc")
            ->get();

        for ($i = 0; $i < count($dateArray); $i++) {
            foreach ($attendances as $attendance) {
                $checkInTempArrayStart = Carbon::parse($dateArray[$i]['attendance_date_start']);
                $checkInTempArrayEnd = Carbon::parse($dateArray[$i]['attendance_date_end']);

                $checkInTemp = $attendance['check_in_time'];

                if ($dateArray[$i]['user_guid'] == $attendance->user_guid) {
                    if ($checkInTemp->between($checkInTempArrayStart, $checkInTempArrayEnd)) {
                        $dateArray[$i]['guid'] = $attendance['guid'];

                        $checkIn = null;
                        if ($attendance['check_in_time'] != null) {
                            $checkIn = $attendance['check_in_time']->format('Y-m-d H:i:s');
                        }

                        $checkOut = null;
                        if ($attendance['check_out_time'] != null) {
                            $checkOut = $attendance['check_out_time']->format('Y-m-d H:i:s');
                        }

                        $dateArray[$i]['check_in_time'] = $checkIn;
                        $dateArray[$i]['check_out_time'] = $checkOut;

                        break;
                    }
                }
            }
        }

        $dataTable = DataTables::of($dateArray)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }
}

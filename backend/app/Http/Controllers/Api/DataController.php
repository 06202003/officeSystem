<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Banner;
use App\Models\Notice;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use stdClass;

class DataController extends Controller
{
    public function overallStatistic(): JsonResponse
    {

        $totalAttendance = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->count();
        $checkedIn = Attendance::whereDate('check_in_time', '=', Carbon::today())->count();
        $notCheckedIn = $totalAttendance - $checkedIn;

        $checkedOut = Attendance::whereDate('check_in_time', '=', Carbon::today())
            ->whereNotNull('check_out_time')
            ->count();
        $notCheckedOut = $checkedIn - $checkedOut;

        $attendances = new stdClass();
        $attendances->total_attendances = $totalAttendance;
        $attendances->checked_in = $checkedIn;
        $attendances->not_checked_in = $notCheckedIn;
        $attendances->checked_out = $checkedOut;
        $attendances->not_checked_out = $notCheckedOut;

        $data = new stdClass();
        $data->users = User::count();
        $data->banners = Banner::where('status', '=', 'active')->count();
        $data->notices = Notice::where('status', '=', 'active')->count();
        $data->events = 0;
        $data->attendances = $attendances;

        /// GET ATTENDANCE
        $attendance = Attendance::with('user')
            ->whereDate('check_in_time', '=', Carbon::today())
            ->count();

        return ResponseController::getResponse($data, 200, 'Success');
    }
}

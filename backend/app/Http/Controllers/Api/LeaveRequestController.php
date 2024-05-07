<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\LeaveAllocation;
use App\Models\LeaveRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class LeaveRequestController extends Controller
{
    public function adminGetAll(Request $request)
    {
        $data = LeaveRequest::orderBy('created_at', 'desc')->get();
        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function adminGetData($guid)
    {
        // GET DATA
        $data = LeaveRequest::select(
            'leave_requests.guid',
            'users.name AS requested_by_name',
            'leave_requests.start_date',
            'leave_requests.end_date',
            'leave_types.name AS leave_type_name',
            'leave_requests.description',
            'leave_requests.date_requested',
            'leave_requests.date_actioned',
            'leave_requests.status',
            'leave_requests.reason',
            DB::raw('(SELECT users.name FROM users WHERE users.guid = leave_requests.approved_by_guid) AS approved_by_name')
        )
        ->leftJoin('users', 'users.guid', '=', 'leave_requests.user_requested_guid')
        ->leftJoin('leave_types', 'leave_types.guid', '=', 'leave_requests.leave_type_guid')
        ->where('leave_requests.guid', '=', $guid)
        ->first();

        if (!$data) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function adminGetAllDataTable(Request $request)
    {
        $statusFilter = $request->input('status');
        $startDate = $request->input('start_date', Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));
        $userRequestedFilter = $request->input('user_requested');

        $data = LeaveRequest::select(
            'leave_requests.guid',
            'users.name AS requested_by_name',
            'leave_requests.start_date',
            'leave_requests.end_date',
            'leave_types.name',
            'leave_requests.description',
            'leave_requests.date_requested',
            'leave_requests.date_actioned',
            'leave_requests.status',
            'leave_requests.reason',
            DB::raw('(SELECT users.name FROM users WHERE users.guid = leave_requests.approved_by_guid) AS approved_by_name')
        )
        ->leftJoin('users', 'users.guid', '=', 'leave_requests.user_requested_guid')
        ->leftJoin('users AS approved_users', 'approved_users.guid', '=', 'leave_requests.approved_by_guid')
        ->leftJoin('leave_types', 'leave_types.guid', '=', 'leave_requests.leave_type_guid')
        ->whereBetween('leave_requests.start_date', [$startDate, $endDate])
        ->orderBy('leave_requests.created_at', 'desc');

        if ($statusFilter === null) {
            $data->where('leave_requests.status', '!=', 'canceled');
        } elseif ($statusFilter !== '') {
            $data->where('leave_requests.status', $statusFilter);
        }

        if ($userRequestedFilter !== null && $userRequestedFilter !== '') {
            $data->where('users.name', 'like', '%' . $userRequestedFilter . '%');
        }

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('requested_by_name', function ($row) {
                return $row->requested_by_name;
            })
            ->addColumn('approved_by_name', function ($row) {
                return $row->approved_by_name;
            })
            ->make(true);

        return $dataTable;
    }

    public function adminUpdateData(Request $request)
    {
        $validator = [
            'guid' => 'required|string|max:36',
            'status' => 'required|in:yes,no,waiting,canceled',
        ];

        if ($request['status'] == 'no') {
            $validator['reason'] = 'required|string|max:255';
        }

        $validator = Validator::make($request->all(), $validator, MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = LeaveRequest::where('guid', '=', $request['guid'])->first();
        if (!$data) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $approvedByGuid = auth()->user()->guid;
        $data->status = $request['status'];
        $data->approved_by_guid = $approvedByGuid;
        $data->date_actioned = now();
        $data->reason = $request['reason'];
        $data->save();

        if ($request['status'] == 'yes') {
            $this->reduceLeaveAllocation($data);
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    private function reduceLeaveAllocation(LeaveRequest $data)
    {
        $start_date = new \DateTime($data->start_date);
        $end_date = new \DateTime($data->end_date);
        $duration = $end_date->diff($start_date)->days + 1;

        $leaveAllocation = LeaveAllocation::where('user_guid', $data->user_requested_guid)->first();

        if ($leaveAllocation) {
            $leaveAllocation->number_of_day -= $duration;
            $leaveAllocation->save();
        }
    }

    public function userGetAll(Request $request)
    {
        $data = LeaveRequest::where('user_requested_guid', auth()->user()->guid)
            ->orderBy('created_at', 'desc')
            ->get();
        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function userGetAllDataTable(Request $request)
    {
        $data = LeaveRequest::select(
            'leave_requests.guid',
            'leave_requests.user_requested_guid',
            'users.name AS requested_by_name',
            'leave_requests.start_date',
            'leave_requests.end_date',
            'leave_types.name',
            'leave_requests.description',
            'leave_requests.status',
            'leave_requests.date_requested',
            'leave_requests.date_actioned',
            'leave_requests.approved_by_guid',
            DB::raw('(SELECT users.name FROM users WHERE users.guid = leave_requests.approved_by_guid) AS approved_by_name')
        )
        ->leftJoin('users', 'users.guid', '=', 'leave_requests.user_requested_guid')
        ->leftJoin('users AS approved_users', 'approved_users.guid', '=', 'leave_requests.approved_by_guid')
        ->leftJoin('leave_types','leave_types.guid','=','leave_requests.leave_type_guid')
        ->where('user_requested_guid', auth()->user()->guid)
        ->orderBy('leave_requests.created_at', 'desc');

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('requested_by_name', function ($row) {
                return $row->requested_by_name;
            })
            ->addColumn('approved_by_name', function ($row) {
                return $row->approved_by_name;
            })
            ->make(true);

        return $dataTable;
    }

    public function userInsertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'leave_type_guid' => 'required|string|max:36|exists:leave_types,guid',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $leaveAllocation = LeaveAllocation::where('user_guid', auth()->user()->guid)->first();

        if (!$leaveAllocation || $leaveAllocation->number_of_day < $this->calculateDuration($request['start_date'], $request['end_date'])) {
            return ResponseController::getResponse(null, 400, 'Insufficient leave allocation');
        }

        $data = LeaveRequest::create([
            'user_requested_guid' => auth()->user()->guid,
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'leave_type_guid' => $request['leave_type_guid'],
            'description' => $request['description'],
            'date_requested' => now(),
            'status' => 'waiting',
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    private function calculateDuration($startDate, $endDate)
    {
        $start = new \DateTime($startDate);
        $end = new \DateTime($endDate);
        $interval = $start->diff($end);
        return $interval->days + 1;
    }
    

    public function userDeleteData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $leaveRequest = LeaveRequest::where('guid', $request['guid'])
            ->where('user_requested_guid', auth()->user()->guid)
            ->first();

        if (!$leaveRequest) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        if ($leaveRequest->status !== 'waiting') {
            return ResponseController::getResponse(null, 400, "Cannot cancel this request");
        }

        $leaveRequest->status = 'canceled';
        $leaveRequest->save();

        return ResponseController::getResponse($leaveRequest, 200, 'Success');
    }
}
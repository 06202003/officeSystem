<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\LeaveAllocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class LeaveAllocationController extends Controller
{
    public function getAll(Request $request)
    {
        $data = LeaveAllocation::orderBy('created_at', 'desc')
                ->get();
        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = LeaveAllocation::where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable(Request $request)
    {
        $data = LeaveAllocation::select(
            'users.name as user_name',
            'leave_allocations.guid', 
            'leave_allocations.name', 
            'leave_allocations.number_of_day', 
            'leave_allocations.description', )
        ->leftJoin('users','users.guid','=','leave_allocations.user_guid')
        ->orderBy('users.created_at', 'desc');

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function getAllDataTableSelf(Request $request)
    {
        $data = LeaveAllocation::select(
            'users.name as user_name',
            'leave_allocations.guid', 
            'leave_allocations.name', 
            'leave_allocations.number_of_day', 
            'leave_allocations.description', )
        ->leftJoin('users','users.guid','=','leave_allocations.user_guid')
        ->where('user_requested_guid', auth()->user()->guid)
        ->orderBy('users.created_at', 'desc');

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'number_of_day' => 'required|integer|max:255',
            'user_guid' => 'required|string|max:255|unique:users,guid'
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = LeaveAllocation::create([
            'name' => $request['name'],
            'number_of_day' => $request['number_of_day'],
            'description' => $request['description'],
            'user_guid' => $request['user_guid']
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'name' => 'required|string|max:255',
            'number_of_day' => 'required|integer|max:255',
            'user_guid' => 'required|string|max:255|unique:users,guid'

        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// GET DATA
        $data = LeaveAllocation::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->name = $request['name'];
        $data->number_of_day = $request['number_of_day'];
        $data->description = $request['description'];
        $data->user_guid = $request['user_guid'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = LeaveAllocation::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

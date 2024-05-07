<?php

namespace App\Http\Controllers\Api;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\Department;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DivisionController extends Controller
{
    public function getAll(Request $request)
    {
            $data = Division::orderBy('division_name', 'asc')
                ->with('department')
                ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Division::where('guid', '=', $guid)
            ->with('department')
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable(Request $request)
    {
        $data = Division::select('divisions.guid', 'divisions.division_name', 'divisions.status', 'departments.department_name')
            ->leftJoin('departments', 'departments.guid', '=', 'divisions.department_guid')
            ->orderBy('departments.department_name', 'asc')
            ->orderBy('divisions.division_name', 'asc');

        if (!empty($request['department_guid'])) {
            $data->where('divisions.department_guid', '=', $request['department_guid']);
        }

        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_guid' => 'required|string|max:36|exists:departments,guid',
            'division_name' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Division::create([
            'department_guid' => $request['department_guid'],
            'division_name' => $request['division_name'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'department_guid' => 'required|string|max:36|exists:departments,guid',
            'division_name' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// VALIDATE INPUT STATUS
        $checkStatus = false;
        if ($request['status'] == 'active' || $request['status'] == 'deleted') {
            $checkStatus = true;
        }

        if (!$checkStatus) {
            return ResponseController::getResponse(null, 400, "Invalid status parameter");
        }

        /// GET DATA
        $data = Division::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->department_guid = $request['department_guid'];
        $data->division_name = $request['division_name'];
        $data->status = $request['status'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Division::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $checkUsedUser = User::where('division_guid', '=', $guid)->count();

        if ($checkUsedUser > 0) {
            return ResponseController::getResponse(null, 400, "Data is used from another table");
        }

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

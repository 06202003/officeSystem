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

class DepartmentController extends Controller
{
    public function getAll()
    {
        $data = Department::orderBy('department_name', 'asc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Department::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = Department::orderBy('department_name', 'asc')
            ->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_name' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Department::create([
            'department_name' => $request['department_name'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'department_name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
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
        $data = Department::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->department_name = $request['department_name'];
        $data->status = $request['status'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Department::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $checkUsedUser = User::where('department_guid', '=', $guid)->count();

        if ($checkUsedUser > 0) {
            return ResponseController::getResponse(null, 400, "Data is used from another table");
        }

        $checkUsedDivision = Division::where('department_guid', '=', $guid)->count();

        if ($checkUsedDivision > 0) {
            return ResponseController::getResponse(null, 400, "Data is used from another table");
        }

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

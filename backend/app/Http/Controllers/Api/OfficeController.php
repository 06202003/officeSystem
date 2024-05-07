<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResponseController;
use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\Room;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class OfficeController extends Controller
{
    public function getAll(Request $request)
    {

        $data = Office::with('rooms')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Office::where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = Office::with('rooms')
            ->orderBy('created_at', 'desc')
            ->where('status', '<>', 'deleted')
            ->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'office_name' => 'required|string|max:100',
            'city' => 'required|string|max:20',
            'district' => 'required|string|max:30',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Office::create([
            'office_name' => $request['office_name'],
            'city' => $request['city'],
            'district' => $request['district'],
            'address' => $request['address'],
            'phone' => $request['phone'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'office_name' => 'required|string|max:100',
            'city' => 'required|string|max:20',
            'district' => 'required|string|max:30',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'status' => 'required|string|max:10',
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
        $data = Office::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->office_name = $request['office_name'];
        $data->city = $request['city'];
        $data->district = $request['district'];
        $data->address = $request['address'];
        $data->phone = $request['phone'];
        $data->status = $request['status'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Office::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $checkUsedRoom = Room::where('office_guid', '=', $guid)->count();

        if ($checkUsedRoom > 0) {
            return ResponseController::getResponse(null, 400, "Data is used from another table");
        }

        $data->status = 'deleted';
        $data->save();

        // $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

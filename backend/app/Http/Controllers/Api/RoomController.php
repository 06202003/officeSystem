<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResponseController;
use App\Http\Controllers\MessagesController;
use App\Models\Inventory;
use App\Models\Room;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function getAll(Request $request)
    {

        $data = Room::with('office', 'usage_history_old', 'usage_history_new')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Room::where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = Room::with('office', 'usage_history_old', 'usage_history_new')
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
            'room_name' => 'required|string|max:100',
            'floor' => 'required|string|max:20',
            'office_guid' => 'required|string|max:50',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Room::create([
            'room_name' => $request['room_name'],
            'floor' => $request['floor'],
            'office_guid' => $request['office_guid'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'room_name' => 'required|string|max:100',
            'floor' => 'required|string|max:20',
            'office_guid' => 'required|string|max:50',
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
        $data = Room::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->room_name = $request['room_name'];
        $data->floor = $request['floor'];
        $data->office_guid = $request['office_guid'];
        $data->status = $request['status'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Room::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $checkUsedInventory = Inventory::where('room_guid', '=', $guid)->count();

        if ($checkUsedInventory > 0) {
            return ResponseController::getResponse(null, 400, "Data is used from another table");
        }

        $data->status = 'deleted';
        $data->save();

        // $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

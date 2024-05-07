<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UsageHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\Inventory;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UsageHistoryController extends Controller
{
    public function getAll(Request $request)
    {

        $data = UsageHistory::with('inventory', 'old_room', 'new_room', 'old_user', 'new_user')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = UsageHistory::where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = UsageHistory::with('inventory', 'old_room', 'new_room', 'old_user', 'new_user')
            ->orderBy('created_at', 'desc')
            ->where('status', '<>', 'deleted')
            ->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }
    public function usageHistoryDatatableByInventory(Request $request)
    {

        $usageHistory = UsageHistory::where('inventory_guid', '=', $request['inventory_guid'])
            ->with("old_user", "new_user")
            ->with(['old_room' => function ($query) {
                $query->with('office');
            }])
            ->with(['new_room' => function ($query) {
                $query->with('office');
            }])
            ->where('status', '<>', 'deleted')
            ->orderBy('date', "asc")
            ->get();
        $dataTable = DataTables::of($usageHistory)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_user_guid' => 'nullable|string|max:36',
            'new_user_guid' => 'required|string|max:36',
            'old_room_guid' => 'required|string|max:36',
            'new_room_guid' => 'required|string|max:36',
            'date' => 'required|date',
            'inventory_guid' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = UsageHistory::create([
            'old_user_guid' => $request['old_user_guid'],
            'new_user_guid' => $request['new_user_guid'],
            'old_room_guid' => $request['old_room_guid'],
            'new_room_guid' => $request['new_room_guid'],
            'date' => $request['date'],
            'inventory_guid' => $request['inventory_guid'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = UsageHistory::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $data->status = 'deleted';
        $data->save();

        // $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

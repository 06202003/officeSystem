<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DamageHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\Inventory;
use App\Models\Vendor;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DamageHistoryController extends Controller
{
    public function getAll(Request $request)
    {

        $data = DamageHistory::with('inventory', 'user_repair', 'user_last', 'vendor')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = DamageHistory::where('guid', '=', $guid)
            ->with('inventory', 'user_repair', 'user_last', 'vendor')
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = DamageHistory::with('inventory', 'user_repair', 'user_last', 'vendor')
            ->orderBy('created_at', 'desc')
            ->where('status', '<>', 'deleted')
            ->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }
    public function damageHistoryDatatableByInventory(Request $request)
    {
        $damageHistory = DamageHistory::where('inventory_guid', '=', $request['inventory_guid'])
            ->with("user_repair", "user_last", 'vendor')
            ->where('status', '<>', 'deleted')
            ->orderBy('date_of_damage', "asc")
            ->get();

        $dataTable = DataTables::of($damageHistory)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'repair_date' => 'nullable|date',
            'repair_cost' => 'nullable|integer',
            'description' => 'required|string|max:255',
            'date_of_damage' => 'required|date',
            'completion_date_of_repair' => 'nullable|date',
            'repair_vendor' => 'nullable|string|max:255',
            'inventory_guid' => 'required|string|max:36',
            'user_repair_guid' => 'nullable|string|max:36',
            'user_last_guid' => 'required|string|max:36',
            'vendor' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = DamageHistory::create([
            'repair_date' => $request['repair_date'],
            'repair_cost' => $request['repair_cost'],
            'description' => $request['description'],
            'date_of_damage' => $request['date_of_damage'],
            'completion_date_of_repair' => $request['completion_date_of_repair'],
            'repair_vendor' => $request['repair_vendor'],
            'inventory_guid' => $request['inventory_guid'],
            'user_repair_guid' => $request['user_repair_guid'],
            'user_last_guid' => $request['user_last_guid'],
            'vendor' => $request['vendor'],
        ]);
        $inventory = Inventory::where('guid', '=', $request['inventory_guid'])->first();
        if ($request['repair_date'] && $request['completion_date_of_repair']) {
            $inventory->status = "normal";
        } else if ($request['repair_date'] && $request['completion_date_of_repair'] == null) {
            $inventory->status = "maintenance";
        } else if ($request['repair_date'] == null) {
            $inventory->status = "damage";
        }
        $inventory->save();
        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'repair_date' => 'nullable|date',
            'repair_cost' => 'nullable|integer',
            'description' => 'required|string|max:255',
            'date_of_damage' => 'required|date',
            'completion_date_of_repair' => 'nullable|date',
            'repair_vendor' => 'nullable|string|max:255',
            'inventory_guid' => 'required|string|max:36',
            'user_repair_guid' => 'nullable|string|max:36',
            'user_last_guid' => 'required|string|max:36',
            'vendor' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// GET DATA
        $data = DamageHistory::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->repair_date = $request['repair_date'];
        $data->repair_cost = $request['repair_cost'];
        $data->description = $request['description'];
        $data->date_of_damage = $request['date_of_damage'];
        $data->completion_date_of_repair = $request['completion_date_of_repair'];
        $data->repair_vendor = $request['repair_vendor'];
        $data->inventory_guid = $request['inventory_guid'];
        $data->user_repair_guid = $request['user_repair_guid'];
        $data->user_last_guid = $request['user_last_guid'];
        $data->vendor = $request['vendor'];
        $data->save();

        $inventory = Inventory::where('guid', '=', $request['inventory_guid'])->first();
        if ($request['repair_date'] && $request['completion_date_of_repair']) {
            $inventory->status = "normal";
        } else if ($request['repair_date'] && $request['completion_date_of_repair'] == null) {
            $inventory->status = "maintenance";
        } else if ($request['repair_date'] == null) {
            $inventory->status = "damage";
        }
        $inventory->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = DamageHistory::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $data->status = 'deleted';
        $data->save();

        // $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

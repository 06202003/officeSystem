<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResponseController;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\ChecklistItem;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ChecklistItemController extends Controller
{
    public function getAll(Request $request)
    {

        $data = ChecklistItem::with('checklist')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = ChecklistItem::where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = ChecklistItem::with('checklist')
            ->orderBy('created_at', 'desc')
            ->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'checklist_item_name' => 'required|string|max:100',
            'checklist_guid' => 'required|string|max:36',
            'checked' => 'required|boolean',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = ChecklistItem::create([
            'checklist_item_name' => $request['checklist_item_name'],
            'checklist_guid' => $request['checklist_guid'],
            'checked' => $request['checked'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'checklist_item_name' => 'required|string|max:100',
            'checklist_guid' => 'required|string|max:36',
            'checked' => 'required|boolean',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }


        /// GET DATA
        $data = ChecklistItem::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->checklist_item_name = $request['checklist_item_name'];
        $data->checklist_guid = $request['checklist_guid'];
        $data->checked = $request['checked'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = ChecklistItem::where('guid', '=', $guid)->first();

        // if (!isset($data)) {
        //     return ResponseController::getResponse(null, 400, "Data not found");
        // }

        // $checkUsedChecklistItem = ChecklistItem::where('guid', '=', $guid)->count();

        // if ($checkUsedChecklistItem > 0) {
        //     return ResponseController::getResponse(null, 400, "Data is used from another table");
        // }

        // $data->status = 'deleted';
        // $data->save();

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

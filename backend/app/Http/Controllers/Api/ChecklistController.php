<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResponseController;
use App\Models\Checklist;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\Card;
use App\Models\ChecklistItem;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ChecklistController extends Controller
{
    public function getAll(Request $request)
    {

        $data = Checklist::with('card', 'checklist_item')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Checklist::where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = Checklist::with('card', 'checklist_item')
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
            'checklist_name' => 'required|string|max:100',
            'card_guid' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Checklist::create([
            'checklist_name' => $request['checklist_name'],
            'card_guid' => $request['card_guid'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'checklist_name' => 'required|string|max:100',
            'card_guid' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }


        /// GET DATA
        $data = Checklist::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->checklist_name = $request['checklist_name'];
        $data->card_guid = $request['card_guid'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Checklist::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $checkUsedChecklist = ChecklistItem::where('checklist_guid', '=', $guid)->count();

        if ($checkUsedChecklist > 0) {
            return ResponseController::getResponse(null, 400, "Data is used from another table");
        }

        // $data->status = 'deleted';
        // $data->save();

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

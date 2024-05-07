<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResponseController;
use App\Models\ListAssignment;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\Card;
use App\Models\Catalog;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ListAssignmentController extends Controller
{
    public function getAll(Request $request)
    {

        $data = ListAssignment::with('card', 'catalog')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = ListAssignment::where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = ListAssignment::with('card', 'catalog')
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
            'catalog_guid' => 'required|string|max:36',
            'card_guid' => 'required|string|max:36',
            'order_list' => 'required|numeric',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = ListAssignment::create([
            'catalog_guid' => $request['catalog_guid'],
            'card_guid' => $request['card_guid'],
            'order_list' => $request['order_list'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'catalog_guid' => 'required|string|max:36',
            'card_guid' => 'required|string|max:36',
            'order_list' => 'required|numeric',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }


        /// GET DATA
        $data = ListAssignment::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->catalog_guid = $request['catalog_guid'];
        $data->card_guid = $request['card_guid'];
        $data->order_list = $request['order_list'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = ListAssignment::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        // $checkUsedListAssignment = ListAssignment::where('guid', '=', $guid)->count();

        // if ($checkUsedListAssignment > 0) {
        //     return ResponseController::getResponse(null, 400, "Data is used from another table");
        // }

        // $data->status = 'deleted';
        // $data->save();

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

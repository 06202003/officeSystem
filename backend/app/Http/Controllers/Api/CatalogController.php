<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResponseController;
use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\Card;
use App\Models\Catalog;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CatalogController extends Controller
{
    public function getAll(Request $request)
    {

        $data = Catalog::with('board', 'card')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Catalog::where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = Catalog::with('board', 'card')
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
            'list_name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'board_guid' => 'required|string|max:36',
            'order' => 'required|integer',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Catalog::create([
            'list_name' => $request['list_name'],
            'description' => $request['description'],
            'board_guid' => $request['board_guid'],
            'order' => $request['order'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'list_name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'board_guid' => 'required|string|max:36',
            'order' => 'required|integer',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }


        /// GET DATA
        $data = Catalog::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->list_name = $request['list_name'];
        if ($request['description']) {
            $data->description = $request['description'];
        }
        $data->board_guid = $request['board_guid'];
        $data->order = $request['order'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Catalog::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $checkUsedCatalog = Card::where('catalog_guid', '=', $guid)->count();

        if ($checkUsedCatalog > 0) {
            return ResponseController::getResponse(null, 400, "Data is used from another table");
        }

        // $data->status = 'deleted';
        // $data->save();

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

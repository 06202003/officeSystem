<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResponseController;
use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\Card;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CardController extends Controller
{
    public function getAll(Request $request)
    {

        $data = Card::with('catalog', 'user_card', 'checklist', 'activity', 'attachment', 'comment', 'card_label')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Card::where('guid', '=', $guid)
            ->with('catalog', 'user_card', 'checklist', 'activity', 'attachment', 'comment', 'card_label')
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = Card::with('catalog', 'user_card', 'checklist', 'activity', 'attachment', 'comment', 'card_label')
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
            'card_name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'deadline' => 'nullable|date_format:Y-m-d\TH:i',
            'catalog_guid' => 'required|string|max:36',
            'order' => 'required|integer',
            'img_url' => 'nullable|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Card::create([
            'card_name' => $request['card_name'],
            'description' => $request['description'],
            'deadline' => $request['deadline'],
            'catalog_guid' => $request['catalog_guid'],
            'img_url' => $request['img_url'],
            'order' => $request['order'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'card_name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'deadline' => 'nullable|date_format:Y-m-d\TH:i',
            'catalog_guid' => 'required|string|max:36',
            'img_url' => 'nullable|string|max:255',
            'order' => 'required|integer',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }


        /// GET DATA
        $data = Card::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->card_name = $request['card_name'];
        $data->description = $request['description'];
        if ($request['deadline']) {
            $data->deadline = $request['deadline'];
        }
        if ($request['catalog_guid']) {
            $data->catalog_guid = $request['catalog_guid'];
        }
        $data->order = $request['order'];
        $data->img_url = $request['img_url'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Card::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        // $checkUsedCatalog = Card::where('guid', '=', $guid)->count();

        // if ($checkUsedCatalog > 0) {
        //     return ResponseController::getResponse(null, 400, "Data is used from another table");
        // }

        // $data->status = 'deleted';
        // $data->save();

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

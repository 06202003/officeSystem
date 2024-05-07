<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResponseController;
use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\CardLabel;
use App\Models\Label;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class LabelController extends Controller
{
    public function getAll(Request $request)
    {

        $data = Label::orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Label::where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = Label::orderBy('created_at', 'desc')
            ->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'label_name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'color' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Label::create([
            'label_name' => $request['label_name'],
            'description' => $request['description'],
            'color' => $request['color'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'label_name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'color' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }


        /// GET DATA
        $data = Label::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->label_name = $request['label_name'];
        if ($request['description']) {
            $data->description = $request['description'];
        }
        $data->color = $request['color'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Label::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $checkUsedCatalog = CardLabel::where('label_guid', '=', $guid)->count();

        if ($checkUsedCatalog > 0) {
            return ResponseController::getResponse(null, 400, "Data is used from another table");
        }

        // $data->status = 'deleted';
        // $data->save();

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

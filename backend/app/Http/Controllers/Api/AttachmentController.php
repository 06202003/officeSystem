<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResponseController;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\Card;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AttachmentController extends Controller
{
    public function getAll(Request $request)
    {

        $data = Attachment::with('card')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Attachment::where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = Attachment::with('card')
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
            'attachment_name' => 'required|string|max:100',
            'file_url' => 'required|string',
            'file_type' => 'required|in:pdf,docx,xlsx,jpg,png',
            'file_size' => 'required|numeric|max:10485760',
            'card_guid' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Attachment::create([
            'attachment_name' => $request['attachment_name'],
            'file_url' => $request['file_url'],
            'file_type' => $request['file_type'],
            'file_size' => $request['file_size'],
            'card_guid' => $request['card_guid'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'attachment_name' => 'required|string|max:100',
            'file_url' => 'required|string',
            'file_type' => 'required|in:pdf,docx,xlsx,jpg,png',
            'file_size' => 'required|numeric|max:10485760',
            'card_guid' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }


        /// GET DATA
        $data = Attachment::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->attachment_name = $request['attachment_name'];
        $data->file_url = $request['file_url'];
        $data->file_type = $request['file_type'];
        $data->file_size = $request['file_size'];
        $data->card_guid = $request['card_guid'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Attachment::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $checkUsedAttachment = Attachment::where('guid', '=', $guid)->count();

        if ($checkUsedAttachment > 0) {
            return ResponseController::getResponse(null, 400, "Data is used from another table");
        }

        // $data->status = 'deleted';
        // $data->save();

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

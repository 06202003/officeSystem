<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResponseController;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\Card;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ActivityController extends Controller
{
    public function getAll(Request $request)
    {

        $data = Activity::with('card', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse(
            $data,
            200,
            'Success'
        );
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Activity::where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(
                null,
                400,
                "Data not found"
            );
        }

        return ResponseController::getResponse(
            $data,
            200,
            'Success'
        );
    }

    public function getAllDataTable()
    {
        $data = Activity::with('card', 'user')
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
            'activity_type' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'card_guid' => 'required|string|max:36',
            'user_guid' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(
                null,
                422,
                $validator->errors()->first()
            );
        }

        $data = Activity::create([
            'activity_type' => $request['activity_type'],
            'description' => $request['description'],
            'card_guid' => $request['card_guid'],
            'user_guid' => $request['user_guid'],
        ]);

        return ResponseController::getResponse(
            $data,
            200,
            'Success'
        );
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'activity_type' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'card_guid' => 'required|string|max:36',
            'user_guid' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(
                null,
                422,
                $validator->errors()->first()
            );
        }


        /// GET DATA
        $data = Activity::where(
            'guid',
            '=',
            $request['guid']
        )->first();

        if (!isset($data)) {
            return ResponseController::getResponse(
                null,
                400,
                "Data not found"
            );
        }

        /// UPDATE DATA
        $data->activity_type = $request['activity_type'];
        $data->description = $request['description'];
        $data->card_guid = $request['card_guid'];
        $data->user_guid = $request['user_guid'];
        $data->save();

        return ResponseController::getResponse(
            $data,
            200,
            'Success'
        );
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Activity::where(
            'guid',
            '=',
            $guid
        )->first();

        if (!isset($data)) {
            return ResponseController::getResponse(
                null,
                400,
                "Data not found"
            );
        }


        // $data->status = 'deleted';
        // $data->save();

        $data->delete();

        return ResponseController::getResponse(
            null,
            200,
            'Success'
        );
    }
}

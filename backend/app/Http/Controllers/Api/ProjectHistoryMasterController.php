<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ResponseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\ProjectHistory;
use App\Models\ProjectHistoryMaster;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProjectHistoryMasterController extends Controller
{
    public function getAll()
    {
        $data = ProjectHistoryMaster::orderBy('role', 'asc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = ProjectHistoryMaster::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = ProjectHistoryMaster::orderBy('role', 'desc')
            ->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|string|max:255'
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = ProjectHistoryMaster::create([
            'role' =>  $request['role']
        ]); 
            
        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'role' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// GET DATA
        $data = ProjectHistoryMaster::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->role = $request['role'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = ProjectHistoryMaster::where('guid', '=', $guid)->first();

        if (!isset($data)) {    
            return ResponseController::getResponse(null, 400, "Data not found");
        }
        
        $checkUsedUser = ProjectHistory::where('role_guid', '=', $guid)->count();

        if ($checkUsedUser > 0) {
            return ResponseController::getResponse(null, 400, "Data is used from another table");
        }

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

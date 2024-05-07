<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ResponseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\ProjectHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProjectHistoryController extends Controller
{
    public function getAll(Request $request)
    {
        $data = ProjectHistory::orderBy('created_at', 'desc')
            ->with('ProjectHistoryMaster','user')
            ->get();
        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = ProjectHistory::where('guid', '=', $guid)
            ->with('ProjectHistoryMaster')
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function adminGetAllDataTable(Request $request)
    {
        $data = ProjectHistory::select('project_histories.guid', 'project_histories.project_name', 'project_histories.year', 'project_histories.platform', 'project_history_masters.role', 'project_histories.description', 'users.name', 'project_histories.user_guid')
            ->leftJoin('project_history_masters', 'project_history_masters.guid', '=', 'project_histories.role_guid')
            ->leftJoin('users','users.guid','=','project_histories.user_guid')
            ->orderBy('project_histories.created_at', 'asc');

        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function userGetAllDataTable(Request $request)
    {
        $data = ProjectHistory::select('project_histories.guid', 'project_histories.project_name', 'project_histories.year', 'project_histories.platform', 'project_history_masters.role', 'project_histories.description', 'users.name', 'project_histories.user_guid')
            ->leftJoin('project_history_masters', 'project_history_masters.guid', '=', 'project_histories.role_guid')
            ->leftJoin('users','users.guid','=','project_histories.user_guid')
            ->orderBy('project_histories.created_at', 'asc')
            ->where('user_guid', auth('api')->user()->guid);

        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function userInsertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required|string|max:255',
            'year' => 'required|string|date_format:Y',
            'platform' => 'required|string|max:255',
            'role_guid' => 'required|string|max:36|exists:project_history_masters,guid',
            'description' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = ProjectHistory::create([
            'project_name' => $request['project_name'],
            'year' => $request['year'],
            'platform' => $request['platform'],
            'role_guid' => $request['role_guid'],
            'description'=> $request['description'],
            'user_guid' => auth()->user()->guid
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function userUpdateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'role_guid' => 'required|string|max:36|exists:project_history_masters,guid',
            'description' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// GET DATA
        $data = ProjectHistory::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->project_name = $request['project_name'];
        $data->year = $request['year'];
        $data->platform = $request['platform'];
        $data->role_guid = $request['role_guid'];
        $data->description = $request['description'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function userDeleteData($guid)
    {
        /// GET DATA
        $data = ProjectHistory::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

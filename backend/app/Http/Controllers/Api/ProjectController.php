<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResponseController;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\CompanyProject;
use App\Models\UserProject;
use App\Models\Board;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function getAll(Request $request)
    {

        $data = Project::with('company_project', 'user_project', 'board', 'project_category', 'project_manager')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Project::where('guid', '=', $guid)
            ->with('company_project', 'user_project', 'board', 'project_category', 'project_manager')
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = Project::with('company_project', 'user_project', 'board', 'project_category', 'project_manager')
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
            'project_name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'start_date' => 'nullable|date_format:Y-m-d\TH:i',
            'end_date' => 'nullable|date_format:Y-m-d\TH:i|after:' . $request['time_start'],
            'project_category_guid' => 'required|string|max:36',
            'project_manager_guid' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Project::create([
            'project_name' => $request['project_name'],
            'description' => $request['description'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'project_category_guid' => $request['project_category_guid'],
            'project_manager_guid' => $request['project_manager_guid'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'project_name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'start_date' => 'nullable|date_format:Y-m-d\TH:i',
            'end_date' => 'nullable|date_format:Y-m-d\TH:i|after:' . $request['time_start'],
            'status' => 'required|string|max:20',
            'project_category_guid' => 'required|string|max:36',
            'project_manager_guid' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// VALIDATE INPUT STATUS
        $checkStatus = false;
        if ($request['status'] == 'ongoing' || $request['status'] == 'finished') {
            $checkStatus = true;
        }

        if (!$checkStatus) {
            return ResponseController::getResponse(null, 400, "Invalid status parameter");
        }

        /// GET DATA
        $data = Project::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->project_name = $request['project_name'];
        if ($request['description']) {
            $data->description = $request['description'];
        }
        if ($request['start_date']) {
            $data->start_date = $request['start_date'];
        }
        if ($request['end_date']) {
            $data->end_date = $request['end_date'];
        }
        $data->status = $request['status'];
        $data->project_category_guid = $request['project_category_guid'];
        $data->project_manager_guid = $request['project_manager_guid'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Project::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $checkUsedProjectBoard = Board::where('project_guid', '=', $guid)->count();
        $checkUsedProject = UserProject::where('project_guid', '=', $guid)->count();
        $checkUsedProjectCompany = CompanyProject::where('project_guid', '=', $guid)->count();

        if ($checkUsedProject > 0 || $checkUsedProjectBoard > 0 || $checkUsedProjectCompany > 0) {
            return ResponseController::getResponse(null, 400, "Data is used from another table");
        }

        // $data->status = 'deleted';
        // $data->save();

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

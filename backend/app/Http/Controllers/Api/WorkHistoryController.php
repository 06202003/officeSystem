<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\WorkHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class WorkHistoryController extends Controller
{
    public function getAll()
    {
        $data = WorkHistory::orderBy('created_at', 'desc')
            ->with('user')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = WorkHistory::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function adminGetAllDataTable(Request $request)
    {
        $data = WorkHistory::select('work_histories.guid', 'work_histories.start_year', 'work_histories.end_year', 'work_histories.company_name', 'work_histories.company_adress', 'work_histories.company_type', 'work_histories.position', 'work_histories.job_desk', 'users.name' , 'work_histories.user_guid')
            ->leftJoin('users','users.guid','=','work_histories.user_guid')
            ->orderBy('work_histories.created_at', 'asc');

        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function userGetAllDataTable(Request $request)
    {
        $data = WorkHistory::select('work_histories.guid', 'work_histories.start_year', 'work_histories.end_year', 'work_histories.company_name', 'work_histories.company_adress', 'work_histories.company_type', 'work_histories.position', 'work_histories.job_desk', 'users.name' , 'work_histories.user_guid')
            ->leftJoin('users','users.guid','=','work_histories.user_guid')
            ->orderBy('work_histories.created_at', 'asc')
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
            'start_year' => 'required|date_format:Y',
            'end_year'=> 'required|date_format:Y',
            'company_name' => 'required|string|max:255',
            'company_phone' => 'required|string|max:255',
            'company_adress' => 'required|string|max:255',
            'company_type' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'job_desk' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = WorkHistory::create([
            'start_year'=> $request['start_year'],
            'end_year'=> $request['end_year'],
            'company_name' => $request['company_name'],
            'company_phone'=> $request['company_phone'],
            'company_adress'=> $request['company_adress'],
            'company_type'=> $request['company_type'],
            'position'=> $request['position'],
            'job_desk'=> $request['job_desk'],
            'user_guid'=> auth()->user()->guid

        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function userUpdateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_year' => 'required|date_format:Y',
            'end_year'=> 'required|date_format:Y',
            'company_name' => 'required|string|max:255',
            'company_phone' => 'required|string|max:255',
            'company_adress' => 'required|string|max:255',
            'company_type' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'job_desk' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// GET DATA
        $data = WorkHistory::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->start_year = $request['start_year'];
        $data->end_year = $request['end_year'];
        $data->company_name = $request['company_name'];
        $data->company_phone = $request['company_phone'];
        $data->company_adress = $request['company_adress'];
        $data->company_type = $request['company_type'];
        $data->position = $request['position'];
        $data->job_desk = $request['job_desk'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function userDeleteData($guid)
    {
        /// GET DATA
        $data = WorkHistory::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }
        
        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

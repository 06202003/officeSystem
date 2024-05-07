<?php

namespace App\Http\Controllers\Api;

use App\Models\Education;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class EducationController extends Controller
{

    public function getAll()
    {
        $data = Education::orderBy('created_at', 'desc')
            ->with('user')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Education::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function adminGetAllDataTable(Request $request)
    {
        $data = Education::select('education.guid', 'education.entry_year', 'education.out_year', 'education.institution_name', 'education.department', 'education.qualification', 'users.name', 'education.user_guid')
            ->leftJoin('users', 'users.guid', '=', 'education.user_guid')
            ->orderBy('education.created_at', 'desc');

        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function userGetAllDataTable(Request $request)
    {
        $data = Education::select('education.guid', 'education.entry_year', 'education.out_year', 'education.institution_name', 'education.department', 'education.qualification', 'users.name', 'education.user_guid')
            ->leftJoin('users', 'users.guid', '=', 'education.user_guid')
            ->orderBy('education.created_at', 'desc')
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
            'entry_year' => 'required|date_format:Y',
            'out_year' => 'required|date_format:Y',
            'institution_name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'qualification' => 'required|string|max:1',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Education::create([
            'entry_year' => $request['entry_year'],
            'out_year' => $request['out_year'],
            'institution_name' => $request['institution_name'],
            'department' => $request['department'],
            'qualification' => $request['qualification'],
            'user_guid' => auth()->user()->guid
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function userUpdateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'entry_year' => 'required|date_format:Y',
            'out_year' => 'required|date_format:Y',
            'institution_name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'qualification' => 'required|string|max:1',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// GET DATA
        $data = Education::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->entry_year = $request['entry_year'];
        $data->out_year = $request['out_year'];
        $data->institution_name = $request['institution_name'];
        $data->department = $request['department'];
        $data->qualification = $request['qualification'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function userDeleteData($guid)
    {
        /// GET DATA
        $data = Education::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

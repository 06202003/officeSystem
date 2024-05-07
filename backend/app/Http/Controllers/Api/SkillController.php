<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ResponseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\Skill;
use App\Models\SkillMaster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SkillController extends Controller
{
    public function getAll(Request $request)
    {
            $data = Skill::orderBy('created_at', 'desc')
                ->with('skillmaster','user')
                ->get();
        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Skill::where('guid', '=', $guid)
            ->with('skillmaster')
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function adminGetAllDataTable(Request $request)
    {
        $data = Skill::select('skills.guid', 'skill_masters.skill', 'skills.level', 'skills.notes', 'users.name', 'skills.user_guid')
            ->leftJoin('skill_masters', 'skill_masters.guid', '=', 'skills.skill_guid')
            ->leftJoin('users','users.guid','=','skills.user_guid')
            ->orderBy('skills.created_at', 'desc');

        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }
    public function userGetAllDataTable(Request $request)
    {
        $data = Skill::select('skills.guid', 'skill_masters.skill', 'skills.level', 'skills.notes', 'users.name', 'skills.user_guid')
            ->leftJoin('skill_masters', 'skill_masters.guid', '=', 'skills.skill_guid')
            ->leftJoin('users','users.guid','=','skills.user_guid')
            ->orderBy('skills.created_at', 'desc')
            ->where('user_guid', auth('api')->user()->guid);;

        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function userInsertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'skill_guid' => 'required|string|max:36|exists:skill_masters,guid',
            'level' => 'required|string|max:255',
            'notes' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Skill::create([
            'skill_guid' => $request['skill_guid'],
            'level' => $request['level'],
            'notes' => $request['notes'],
            'user_guid'=> auth()->user()->guid
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function userUpdateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'skill_guid' => 'required|string|max:36|exists:skill_masters,guid',
            'level' => 'required|string|max:255',
            'notes' => 'required|string|max:255',

        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// GET DATA
        $data = Skill::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->skill_guid = $request['skill_guid'];
        $data->level = $request['level'];
        $data->notes = $request['notes'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function userDeleteData($guid)
    {
        /// GET DATA
        $data = Skill::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

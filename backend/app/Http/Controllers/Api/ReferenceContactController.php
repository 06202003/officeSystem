<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\referenceContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class referenceContactController extends Controller
{
    public function getAll()
    {
        $data = referenceContact::orderBy('created_at', 'desc')
            ->with('user')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = referenceContact::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function adminGetAllDataTable(Request $request)
    {
        $data = referenceContact::select(
            'reference_contacts.guid', 
            'reference_contacts.name as contact_name', 
            'reference_contacts.company', 
            'reference_contacts.phone_number', 
            'reference_contacts.connection', 
            'users.name',
            'reference_contacts.user_guid')
            ->leftJoin('users','users.guid','=','reference_contacts.user_guid')
            ->orderBy('reference_contacts.created_at', 'asc');

        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function userGetAllDataTable(Request $request)
    {
        $data = referenceContact::select(
            'reference_contacts.guid', 
            'reference_contacts.name as contact_name', 
            'reference_contacts.company', 
            'reference_contacts.phone_number', 
            'reference_contacts.connection', 
            'users.name',
            'reference_contacts.user_guid')
            ->leftJoin('users','users.guid','=','reference_contacts.user_guid')
            ->orderBy('reference_contacts.created_at', 'asc')
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
            'name' => 'required|string|max:255',
            'company'=> 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'connection' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = referenceContact::create([
            'name'=> $request['name'],
            'company'=> $request['company'],
            'phone_number' => $request['phone_number'],
            'connection'=> $request['connection'],
            'user_guid'=> auth()->user()->guid
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'company'=> 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'connection' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// GET DATA
        $data = referenceContact::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->name = $request['name'];
        $data->company = $request['company'];
        $data->phone_number = $request['phone_number'];
        $data->connection = $request['connection'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function userDeleteData($guid)
    {
        /// GET DATA
        $data = referenceContact::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }
        
        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\AdditionalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdditionalInformationController extends Controller
{
    public function getAll()
    {
        $data = AdditionalInformation::orderBy('created_at', 'desc')
            ->with('user')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = AdditionalInformation::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function adminGetAllDataTable(Request $request)
    {
        $data = AdditionalInformation::select(
            'additional_information.guid', 
            'additional_information.connection', 
            'additional_information.name as contact_name', 
            'additional_information.birth_city', 
            'additional_information.birth_date' , 
            'additional_information.adress', 
            'users.name',
            'additional_information.user_guid')
            ->leftJoin('users','users.guid','=','additional_information.user_guid')
            ->orderBy('additional_information.created_at', 'asc');

        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function userGetAllDataTable(Request $request)
    {
        $data = AdditionalInformation::select(
            'additional_information.guid', 
            'additional_information.connection', 
            'additional_information.name as contact_name', 
            'additional_information.birth_city', 
            'additional_information.birth_date' , 
            'additional_information.adress', 
            'additional_information.phone_number', 
            'additional_information.work', 
            'users.name',
            'additional_information.user_guid')
            ->leftJoin('users','users.guid','=','additional_information.user_guid')
            ->orderBy('additional_information.created_at', 'asc')
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
            'connection' => 'required|string|max:255',
            'name'=> 'required|string|max:255',
            'birth_city' => 'required|string|max:255',
            'birth_date' => 'required|date|',
            'adress' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'work' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = AdditionalInformation::create([
            'connection'=> $request['connection'],
            'name'=> $request['name'],
            'birth_city' => $request['birth_city'],
            'birth_date'=> $request['birth_date'],
            'adress'=> $request['adress'],
            'phone_number'=> $request['phone_number'],
            'work'=> $request['work'],
            'user_guid'=> auth()->user()->guid
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function userUpdateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'connection' => 'required|string|max:255',
            'name'=> 'required|string|max:255',
            'birth_city' => 'required|string|max:255',
            'birth_date' => 'required|date|',
            'adress' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'work' => 'required|string|max:255',  
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// GET DATA
        $data = AdditionalInformation::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->connection = $request['connection'];
        $data->name = $request['name'];
        $data->birth_city = $request['birth_city'];
        $data->birth_date = $request['birth_date'];
        $data->adress = $request['adress'];
        $data->phone_number = $request['phone_number'];
        $data->work = $request['work'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function userDeleteData($guid)
    {
        /// GET DATA
        $data = AdditionalInformation::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }
        
        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

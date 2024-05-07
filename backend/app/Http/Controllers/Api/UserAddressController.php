<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserAddressController extends Controller
{
    public function getAll()
    {
        $data = UserAddress::orderBy('created_at', 'desc')
            ->where('user_guid', '=', auth('api')->user()->guid)
            ->with('village')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = UserAddress::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = UserAddress::orderBy('created_at', 'desc')
            ->where('user_guid', '=', auth('api')->user()->guid)
            ->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_type' => 'required|string|max:36|exists:parameter_details,guid',
            'village_id' => 'required|string|max:36|exists:villages,id',
            'postal_code' => 'required|string|max:5|min:5',
            'address' => 'required|string',
            'id_card_url' => 'required|string',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        if ($request['is_main_address']) {
            $update = UserAddress::where("user_guid", "=", auth('api')->user()->guid)
                ->update(['is_main_address' => 0]);
        }

        $data = UserAddress::create([
            'user_guid' => auth('api')->user()->guid,
            'address_type' => $request['address_type'],
            'is_main_address' => $request['is_main_address'],
            'village_id' => $request['village_id'],
            'postal_code' => $request['postal_code'],
            'address' => $request['address'],
            'id_card_url' => $request['id_card_url'],
            'information' => $request['information'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'address_type' => 'required|string|max:36|exists:parameter_details,guid',
            'village_id' => 'required|string|max:36|exists:villages,id',
            'postal_code' => 'required|string|max:5|min:5',
            'address' => 'required|string',
            'id_card_url' => 'required|string',
            'status' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// VALIDATE INPUT STATUS
        $checkStatus = false;
        if ($request['status'] == 'active' || $request['status'] == 'deleted') {
            $checkStatus = true;
        }

        if (!$checkStatus) {
            return ResponseController::getResponse(null, 400, "Invalid status parameter");
        }

        /// GET DATA
        $data = UserAddress::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        if ($request['is_main_address']) {
            $update = UserAddress::where("user_guid", "=", auth('api')->user()->guid)
                ->update(['is_main_address' => 0]);
        }

        /// UPDATE DATA
        $data->address_type = $request['address_type'];
        $data->village_id = $request['village_id'];
        $data->postal_code = $request['postal_code'];
        $data->address = $request['address'];
        $data->id_card_url = $request['id_card_url'];
        $data->information = $request['information'];
        $data->status = $request['status'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = UserAddress::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

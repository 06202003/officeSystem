<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\ParameterDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ParameterDetailController extends Controller
{
    public function getAll(Request $request)
    {
        $data = ParameterDetail::orderBy('parameter_detail_name', 'asc');

        if ($request->filled('parameter_master_guid')) {
            $data = $data->where("parameter_master_guid", "=", $request['parameter_master_guid']);
        }

        if ($request->filled('parameter_detail_guid')) {
            if ($request['parameter_detail_guid'] == "null") {
                $data = $data->whereNull("parameter_detail_guid");
            } else {
                $data = $data->where("parameter_detail_guid", "=", $request['parameter_detail_guid']);
            }
        }

        $data = $data->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = ParameterDetail::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable(Request $request)
    {
        $data = ParameterDetail::orderBy('parameter_detail_name', 'asc');

        if ($request->filled('parameter_master_guid')) {
            $data = $data->where("parameter_master_guid", "=", $request['parameter_master_guid']);
        }

        if ($request->filled('parameter_detail_guid')) {
            if ($request['parameter_detail_guid'] == "null") {
                $data = $data->whereNull("parameter_detail_guid");
            } else {
                $data = $data->where("parameter_detail_guid", "=", $request['parameter_detail_guid']);
            }
        }

        $data = $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parameter_master_guid' => 'required|string|max:36|exists:parameter_masters,guid',
            'parameter_detail_name' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = ParameterDetail::create([
            'parameter_master_guid' => $request['parameter_master_guid'],
            'parameter_detail_guid' => $request['parameter_detail_guid'],
            'parameter_detail_name' => $request['parameter_detail_name'],
            'detail' => $request['detail'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'parameter_master_guid' => 'required|string|max:36|exists:parameter_masters,guid',
            'parameter_detail_name' => 'required|string|max:255',
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
        $data = ParameterDetail::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->parameter_master_guid = $request['parameter_master_guid'];
        if ($request->filled('parameter_detail_guid')) {
            $data->parameter_detail_guid = $request['parameter_detail_guid'];
        }
        $data->parameter_detail_name = $request['parameter_detail_name'];
        if ($request->filled('detail')) {
            $data->detail = $request['detail'];
        }
        $data->status = $request['status'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = ParameterDetail::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

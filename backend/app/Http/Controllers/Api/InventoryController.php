<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\File;
use App\Models\Inventory;
use App\Models\Vendor;
use App\Models\UsageHistory;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class InventoryController extends Controller
{
    public function getAll(Request $request)
    {

        $data = Inventory::with('user', 'room', 'category', 'usages_history', 'damages_history', 'vendor')
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Inventory::with(['room' => function ($query) {
            $query->select('guid', 'room_name');
        }])
            ->with(['user' => function ($query) {
                $query->select('guid', 'nik', 'name', 'email');
            }])
            ->with(['room' => function ($query) {
                $query->with('office');
            }])
            ->with(['category' => function ($query) {
                $query->select('guid', 'category_name');
            }])
            ->with(['vendor' => function ($query) {
                $query->select('guid', 'vendor_name');
            }])
            ->where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = Inventory::with(['room' => function ($query) {
            $query->select('guid', 'room_name');
        }])
            ->with(['user' => function ($query) {
                $query->select('guid', 'nik', 'name');
            }])
            ->with(['room' => function ($query) {
                $query->with('office');
            }])
            ->with(['category' => function ($query) {
                $query->select('guid', 'category_name');
            }])
            ->with(['vendor' => function ($query) {
                $query->select('guid', 'vendor_name');
            }])
            ->where('status', '<>', 'deleted')
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
            'inventory_name' => 'required|string|max:100',
            'brand' => 'required|string|max:45',
            'purchase_date' => 'required|date',
            'price' => 'required|integer',
            'residual_value' => 'nullable|integer',
            'useful_life' => 'nullable|integer',
            'depreciation' => 'nullable|integer',
            'description' => 'required|string|max:255',
            'user_guid' => 'nullable|string|max:36',
            'category_guid' => 'required|string|max:36',
            'room_guid' => 'required|string|max:36',
            'vendor_guid' => 'required|string|max:36',
            'price_in_year_1' => 'nullable|integer',
            'price_in_year_2' => 'nullable|integer',
            'price_in_year_3' => 'nullable|integer',
            'price_in_year_4' => 'nullable|integer',
            'img_url' => 'nullable|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }



        $data = Inventory::create([
            'inventory_name' => $request['inventory_name'],
            'brand' => $request['brand'],
            'purchase_date' => $request['purchase_date'],
            'price' => $request['price'],
            'residual_value' => $request['residual_value'],
            'useful_life' => $request['useful_life'],
            'depreciation' => $request['depreciation'],
            'description' => $request['description'],
            'user_guid' => $request['user_guid'],
            'category_guid' => $request['category_guid'],
            'room_guid' => $request['room_guid'],
            'price_in_year_1' => $request['price_in_year_1'],
            'price_in_year_2' => $request['price_in_year_2'],
            'price_in_year_3' => $request['price_in_year_3'],
            'price_in_year_4' => $request['price_in_year_4'],
            'img_url' => $request['img_url'],
            'vendor_guid' => $request['vendor_guid'],
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'inventory_name' => 'required|string|max:100',
            'status' => 'required|string|max:255',
            'brand' => 'required|string|max:45',
            'purchase_date' => 'required|date',
            'price' => 'required|integer',
            'residual_value' => 'nullable|integer',
            'useful_life' => 'nullable|integer',
            'depreciation' => 'nullable|integer',
            'description' => 'required|string|max:255',
            'user_guid' => 'nullable|string|max:36',
            'category_guid' => 'required|string|max:36',
            'room_guid' => 'nullable|string|max:36',
            'price_in_year_1' => 'nullable|integer',
            'price_in_year_2' => 'nullable|integer',
            'price_in_year_3' => 'nullable|integer',
            'price_in_year_4' => 'nullable|integer',
            'img_url' => 'nullable|string|max:255',
            'vendor_guid' => 'required|string|max:36',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// VALIDATE INPUT STATUS
        $checkStatus = false;
        if ($request['status'] == 'normal' || $request['status'] == 'damage' || $request['status'] == 'maintanance' || $request['status'] == 'deleted') {
            $checkStatus = true;
        }

        if (!$checkStatus) {
            return ResponseController::getResponse(null, 400, "Invalid status parameter");
        }

        /// GET DATA
        $data = Inventory::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }
        /// INPUT USAGE HISTORY
        if ($request['room_guid'] != $data->room_guid || $request['user_guid'] != $data->user_guid) {
            $usageHistory = UsageHistory::create([
                'old_user_guid' => $data->user_guid,
                'new_user_guid' => $request['user_guid'],
                'old_room_guid' => $data->room_guid,
                'new_room_guid' => $request['room_guid'],
                'date' => date("Y/m/d"),
                'inventory_guid' => $request['guid'],
            ]);
            // if (!isset($usesageHistory)) {
            //     return ResponseController::getResponse(null, 400, "Data not found");
            // }
        }
        /// UPDATE DATA
        $data->inventory_name = $request['inventory_name'];
        $data->brand = $request['brand'];
        $data->purchase_date = $request['purchase_date'];
        $data->status = $request['status'];
        $data->price = $request['price'];
        $data->residual_value = $request['residual_value'];
        $data->useful_life = $request['useful_life'];
        $data->depreciation = $request['depreciation'];
        $data->description = $request['description'];
        $data->user_guid = $request['user_guid'];
        $data->category_guid = $request['category_guid'];
        $data->room_guid = $request['room_guid'];
        $data->price_in_year_1 = $request['price_in_year_1'];
        $data->price_in_year_2 = $request['price_in_year_2'];
        $data->price_in_year_3 = $request['price_in_year_3'];
        $data->price_in_year_4 = $request['price_in_year_4'];
        $data->img_url = $request['img_url'];
        $data->vendor_guid = $request['vendor_guid'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Inventory::where('guid', '=', $guid)->first();



        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        // $checkUsedUser = User::where('division_guid', '=', $guid)->count();

        // if ($checkUsedUser > 0) {
        //     return ResponseController::getResponse(null, 400, "Data is used from another table");
        // }

        if ($data->img_url) {
            $file = File::where('url', '=', $data->img_url)->first();

            $urlParts = explode('/', $data->img_url);
            $publicIdWithExtension = explode('.', end($urlParts));
            $publicId = $publicIdWithExtension[0];
            Cloudinary::destroy($file->type . '/' . $publicId);
        }


        $data->status = 'deleted';
        $data->save();
        // $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}

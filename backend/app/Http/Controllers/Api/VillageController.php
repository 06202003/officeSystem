<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function getAllProvince(Request $request)
    {
        $data = Province::orderBy('province_name', 'asc');

        if ($request->filled('province_name')) {
            $data = $data->where('province_name', 'like', "%" . $request['province_name'] . "%");
        }

        $data = $data->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllCity(Request $request)
    {
        $data = City::orderBy('city_name', 'asc');

        if ($request->filled('province_id')) {
            $data = $data->where('province_id', '=', $request['province_id']);
        }

        if ($request->filled('city_name')) {
            $data = $data->where('city_name', 'like', "%" . $request['city_name'] . "%");
        }

        $data = $data->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDistrict(Request $request)
    {
        $data = District::orderBy('district_name', 'asc');

        if ($request->filled('city_id')) {
            $data = $data->where('city_id', '=', $request['city_id']);
        }

        if ($request->filled('district_name')) {
            $data = $data->where('district_name', 'like', "%" . $request['district_name'] . "%");
        }

        $data = $data->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllVillage(Request $request)
    {
        $data = Village::orderBy('village_name', 'asc');

        if ($request->filled('district_id')) {
            $data = $data->where('district_id', '=', $request['district_id']);
        }

        if ($request->filled('village_name')) {
            $data = $data->where('village_name', 'like', "%" . $request['village_name'] . "%");
        }

        $data = $data->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }
}

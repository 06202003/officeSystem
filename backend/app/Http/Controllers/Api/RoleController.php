<?php

namespace App\Http\Controllers\Api;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MessagesController;


class RoleController extends Controller
{
    public function getAll()
    {
        $data = Role::orderBy('name', 'asc')
            ->with('permissions')

            ->get();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Role::where('guid', '=', $guid)
            ->with('permissions')
            ->first();


        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = Role::select(
            'roles.name AS role_name',
            'permissions.name AS permission_name',
            'roles.status'
        )
            ->leftJoin('role_has_permissions', 'roles.guid', '=', 'role_has_permissions.role_guid')
            ->leftJoin('permissions', 'role_has_permissions.permission_guid', '=', 'permissions.guid')
            ->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'permissions' => 'required|array'
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        $data = Role::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }
        $data->syncPermissions($request['permissions']);


        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTableConcat(Request $request)
    {

        DB::statement("SET SESSION group_concat_max_len = 1000000");
        $data = DB::table('roles')
            ->leftJoin('role_has_permissions', 'roles.guid', '=', 'role_has_permissions.role_guid')
            ->leftJoin('permissions', 'role_has_permissions.permission_guid', '=', 'permissions.guid')
            ->select(
                'roles.guid',
                'roles.name as role_name',
                DB::raw('GROUP_CONCAT(permissions.name SEPARATOR ", ") as permission_names'),
                DB::raw('COUNT(permissions.name) as sum_permission'),
                'roles.status'
            )
            ->groupBy('roles.guid', 'roles.name', 'roles.status')
            ->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }
}

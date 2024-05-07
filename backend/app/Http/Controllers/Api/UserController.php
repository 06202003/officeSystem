<?php

namespace App\Http\Controllers\Api;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\Department;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Mailjet\Client;
use Mailjet\Resources;

class UserController extends Controller
{
    public function getAll(Request $request)
    {
        $data = User::orderBy('name', 'asc')
            ->with('department')
            ->with('position')
            ->with('division');

        if (!empty($request['status'])) {
            $data = $data->where("status", $request['status']);
        }

        $data = $data->get();


        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = User::where('guid', '=', $guid)
            ->with('department')
            ->with('position')
            ->with('division')
            ->with('roles', 'permissions')
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable(Request $request)
    {
        $data = User::with('roles', 'permissions')
            ->with('department')
            ->with('division')
            ->with('position')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'User');
            });

        if (!empty($request['department_guid'])) {
            $data->where('users.department_guid', '=', $request['department_guid']);
        }

        if (!empty($request['division_guid'])) {
            $data->where('users.division_guid', '=', $request['division_guid']);
        }

        if (!empty($request['position_guid'])) {
            $data->where('users.position_guid', '=', $request['position_guid']);
        }

        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position_guid' => 'required|string|max:36|exists:positions,guid',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'is_generate_password' => 'required|boolean',
            'is_notify_to_email' => 'required|boolean',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        ///DEPARTMENT
        $department = null;
        if ($request->filled('department_guid')) {
            $validator = Validator::make($request->all(), [
                'department_guid' => 'required|string|max:36|exists:departments,guid',
            ], MessagesController::messages());

            if ($validator->fails()) {
                return ResponseController::getResponse(null, 422, $validator->errors()->first());
            }

            $department = $request['department_guid'];
        }

        ///DIVISION
        $division = null;
        if ($request->filled('division_guid')) {
            $validator = Validator::make($request->all(), [
                'division_guid' => 'required|string|max:36|exists:divisions,guid',
            ], MessagesController::messages());

            if ($validator->fails()) {
                return ResponseController::getResponse(null, 422, $validator->errors()->first());
            }

            $division = $request['division_guid'];
        }

        /// CHECK PASSWORD IS GENERATED OR NOT
        if ($request['is_generate_password']) {
            $password = Str::random(8);
        } else {
            $validator = Validator::make($request->all(), [
                'password' => 'required|string|min:6',
            ], MessagesController::messages());

            if ($validator->fails()) {
                return ResponseController::getResponse(null, 422, $validator->errors()->first());
            }

            $password = $request['password'];
        }

        /// VALIDATE INPUT TYPE
        $type = null;
        if ($request['type'] == null || $request['type'] == 'Top Management' || $request['type'] == 'Middle Management' || $request['type'] == 'First Line Management') {
            $type = $request['type'];
        } else {
            return ResponseController::getResponse(null, 422, "Wrong value of type. Ity should be ['', 'Top Management', 'Middle Management', 'First Line Management']");
        }


        if ($type == null) {
            $data = User::create([
                'position_guid' => $request['position_guid'],
                'department_guid' => $department,
                'division_guid' => $division,
                'id_user' => $request['id_user'],
                'name' => $request['name'],
                'email' => $request['email'],
                'phone_number' => $request['phone_number'],
                'password' => Hash::make($password),
            ]);
        } else {
            $data = User::create([
                'position_guid' => $request['position_guid'],
                'department_guid' => $department,
                'division_guid' => $division,
                'id_user' => $request['id_user'],
                'name' => $request['name'],
                'email' => $request['email'],
                'phone_number' => $request['phone_number'],
                'password' => Hash::make($password),
                'type' => $type,
            ]);
            $data->assignRole('User');
        }


          /// SEND EMAIL
        if ($request['is_notify_to_email']) {
            $firstname = strtok($request['name'], " ");
            $mj = new Client(
                env('MAILJET_API_KEY'),
                env('MAILJET_SECRET_KEY'),
                true,
                ['version' => 'v3.1']
            );
            $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => 'albyariahari@wit.id',
                            'Name' => 'WIT.ID'
                        ],
                        'To' => [
                            [
                                'Email' => $request['email'],
                                'Name' => $request['name']
                            ]
                        ],
                        'TemplateID' => 4451740,
                        'TemplateLanguage' => true,
                        'Subject' => "W. System Account Registration",
                        'Variables' => json_decode('{
                            "title": "W. System Account Registration",
                            "firstname": "' . $firstname . '",
                            "content": "Password Anda untuk masuk kedalam aplikasi adalah: ' . $password . '"
                        }', true)
                    ]
                ]
            ];
            $response = $mj->post(Resources::$Email, ['body' => $body]);
        }


        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'department_guid' => 'required|string|max:36|exists:departments,guid',
            'name' => 'required|string|max:255',
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
        $data = User::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        /// UPDATE DATA
        $data->department_guid = $request['department_guid'];
        $data->name = $request['name'];
        $data->status = $request['status'];
        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function checkPermissions(Request $request)
    {
        $data = User::where('guid', '=', $request['user_guid'])->first();
        $permissions = $data->getPermissionsViaRoles()->pluck('name');

        if ($permissions->contains($request['permission'])) {
            $response = true;
        } else {
            $response = false;
        }
        return ResponseController::getResponse($response, 200, 'Success');
    }

    public function resetPassword($guid)
    {
        /// GET DATA
        $data = User::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $password = Str::random(8);
        $data->password = Hash::make($password);
        $data->status = 'pending';
        $data->save();

        $firstname = strtok($data->name, " ");
        $mj = new Client(
            env('MAILJET_API_KEY'),
            env('MAILJET_SECRET_KEY'),
            true,
            ['version' => 'v3.1']
        );
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => 'albyariahari@wit.id',
                        'Name' => 'WIT.ID'
                    ],
                    'To' => [
                        [
                            'Email' => $data->email,
                            'Name' => $data->name
                        ]
                    ],
                    'TemplateID' => 4451740,
                    'TemplateLanguage' => true,
                    'Subject' => "W. System Account Registration",
                    'Variables' => json_decode('{
                            "title": "W. System Account Registration",
                            "firstname": "' . $firstname . '",
                            "content": "Password Anda untuk masuk kedalam aplikasi adalah: ' . $password . '"
                        }', true)
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);

        return ResponseController::getResponse(null, 200, 'Success');
    }
}
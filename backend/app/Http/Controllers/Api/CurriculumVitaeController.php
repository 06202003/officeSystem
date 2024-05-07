<?php

namespace App\Http\Controllers\Api;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class CurriculumVitaeController extends Controller
{
    public function getAll(Request $request)
    {
        $data = User::select(
            'users.guid',
            'users.name',
            'users.birth_city',
            'users.gender',
            'users.nik',
            'positions.position_name',
            'users.email',
            'users.npwp',
            'users.bank_account',
            'users.id_employee',
            'education.entry_year',
            'education.out_year',
            'education.institution_name AS education_institution_name',
            'education.department AS education_department',
            'education.qualification',
            'skill_masters.skill',
            'skills.level',
            'skills.notes',
            'project_histories.project_name',
            'project_histories.year AS project_year',
            'project_histories.platform',
            'project_history_masters.role AS project_role',  
            'project_histories.description AS project_description',
            'work_histories.start_year AS work_start_year',
            'work_histories.end_year AS work_end_year',
            'work_histories.company_name AS work_company_name',
            'work_histories.company_phone',
            'work_histories.company_adress',
            'work_histories.company_type',
            'work_histories.position AS work_position',
            'work_histories.job_desk',
            'additional_information.connection AS additional_connection',
            'additional_information.name AS additional_name',
            'additional_information.birth_city AS additional_birth_city',
            'additional_information.birth_date AS additional_birth_date',
            'additional_information.adress AS additional_address',
            'additional_information.phone_number AS additional_phone_number',
            'additional_information.work AS additional_work',
            'reference_contacts.name AS contact_name',
            'reference_contacts.company AS contact_company',
            'reference_contacts.phone_number AS contact_phone_number',
            'reference_contacts.connection AS contact_connection'
        )
        ->leftJoin('education', 'users.guid', '=', 'education.user_guid')
        ->leftJoin('skills', 'users.guid', '=', 'skills.user_guid')
        ->leftJoin('skill_masters', 'skills.skill_guid', '=', 'skill_masters.guid')
        ->leftJoin('project_histories', 'users.guid', '=', 'project_histories.user_guid')
        ->leftJoin('project_history_masters', 'project_histories.role_guid', '=', 'project_history_masters.guid')
        ->leftJoin('work_histories', 'users.guid', '=', 'work_histories.user_guid')
        ->leftJoin('additional_information', 'users.guid', '=', 'additional_information.user_guid')
        ->leftJoin('reference_contacts', 'users.guid', '=', 'reference_contacts.user_guid')
        ->leftJoin('positions', 'users.position_guid', '=', 'positions.guid')
        ->orderBy('users.name', 'asc');

        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function getData($guid)
    {
        $data = User::select(
            'users.guid',
            'users.name',
            'users.birth_city',
            'users.birth_date',
            'users.gender',
            'users.nik',
            'positions.position_name',
            'users.email',
            'users.npwp',
            'users.bank_account',
            'users.id_employee',
            'education.entry_year',
            'education.out_year',
            'education.institution_name AS education_institution_name',
            'education.department AS education_department',
            'education.qualification',
            'skill_masters.skill',
            'skills.level',
            'skills.notes',
            'project_histories.project_name',
            'project_histories.year AS project_year',
            'project_histories.platform',
            'project_history_masters.role AS project_role',  
            'project_histories.description AS project_description',
            'work_histories.start_year AS work_start_year',
            'work_histories.end_year AS work_end_year',
            'work_histories.company_name AS work_company_name',
            'work_histories.company_phone',
            'work_histories.company_adress',
            'work_histories.company_type',
            'work_histories.position AS work_position',
            'work_histories.job_desk',
            'additional_information.connection AS additional_connection',
            'additional_information.name AS additional_name',
            'additional_information.birth_city AS additional_birth_city',
            'additional_information.birth_date AS additional_birth_date',
            'additional_information.adress AS additional_address',
            'additional_information.phone_number AS additional_phone_number',
            'additional_information.work AS additional_work',
            'reference_contacts.name AS contact_name',
            'reference_contacts.company AS contact_company',
            'reference_contacts.phone_number AS contact_phone_number',
            'reference_contacts.connection AS contact_connection'
        )
        ->leftJoin('education', 'users.guid', '=', 'education.user_guid')
        ->leftJoin('skills', 'users.guid', '=', 'skills.user_guid')
        ->leftJoin('skill_masters', 'skills.skill_guid', '=', 'skill_masters.guid')
        ->leftJoin('project_histories', 'users.guid', '=', 'project_histories.user_guid')
        ->leftJoin('project_history_masters', 'project_histories.role_guid', '=', 'project_history_masters.guid')
        ->leftJoin('work_histories', 'users.guid', '=', 'work_histories.user_guid')
        ->leftJoin('additional_information', 'users.guid', '=', 'additional_information.user_guid')
        ->leftJoin('reference_contacts', 'users.guid', '=', 'reference_contacts.user_guid')
        ->leftJoin('positions', 'users.position_guid', '=', 'positions.guid')
        ->orderBy('users.name', 'asc')
        ->where('users.guid', '=', $guid);

        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function getDataSelf()
    {
        $data = User::select(
            'users.guid',
            'users.name',
            'users.birth_city',
            'users.gender',
            'users.nik',
            'positions.position_name',
            'users.email',
            'users.npwp',
            'users.bank_account',
            'users.id_employee',
            'education.entry_year',
            'education.out_year',
            'education.institution_name AS education_institution_name',
            'education.department AS education_department',
            'education.qualification',
            'skill_masters.skill',
            'skills.level',
            'skills.notes',
            'project_histories.project_name',
            'project_histories.year AS project_year',
            'project_histories.platform',
            'project_history_masters.role AS project_role',  
            'project_histories.description AS project_description',
            'work_histories.start_year AS work_start_year',
            'work_histories.end_year AS work_end_year',
            'work_histories.company_name AS work_company_name',
            'work_histories.company_phone',
            'work_histories.company_adress',
            'work_histories.company_type',
            'work_histories.position AS work_position',
            'work_histories.job_desk',
            'additional_information.connection AS additional_connection',
            'additional_information.name AS additional_name',
            'additional_information.birth_city AS additional_birth_city',
            'additional_information.birth_date AS additional_birth_date',
            'additional_information.adress AS additional_address',
            'additional_information.phone_number AS additional_phone_number',
            'additional_information.work AS additional_work',
            'reference_contacts.name AS contact_name',
            'reference_contacts.company AS contact_company',
            'reference_contacts.phone_number AS contact_phone_number',
            'reference_contacts.connection AS contact_connection'
        )
        ->leftJoin('education', 'users.guid', '=', 'education.user_guid')
        ->leftJoin('skills', 'users.guid', '=', 'skills.user_guid')
        ->leftJoin('skill_masters', 'skills.skill_guid', '=', 'skill_masters.guid')
        ->leftJoin('project_histories', 'users.guid', '=', 'project_histories.user_guid')
        ->leftJoin('project_history_masters', 'project_histories.role_guid', '=', 'project_history_masters.guid')
        ->leftJoin('work_histories', 'users.guid', '=', 'work_histories.user_guid')
        ->leftJoin('additional_information', 'users.guid', '=', 'additional_information.user_guid')
        ->leftJoin('reference_contacts', 'users.guid', '=', 'reference_contacts.user_guid')
        ->leftJoin('positions', 'users.position_guid', '=', 'positions.guid')
        ->orderBy('users.name', 'asc')
        ->where('users.guid', auth('api')->user()->guid);
        $data->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }
}

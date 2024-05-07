<?php

namespace Database\Seeders;

use App\Models\CompanyProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyProject::create([
            "company_guid" => "80447fae-620c-4e7d-999b-4b3278377b28",
            "project_guid" => "cdebd36b-60d8-4d94-bcd6-b6c889b7e2c9",
            "guid" => "4ea960d0-c9fa-4ee1-a449-bb6cfce26c83"
        ]);
    }
}

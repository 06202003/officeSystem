<?php

namespace Database\Seeders;

use App\Models\UserProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserProject::create([
            "user_guid" => "25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9",
            "project_guid" => "cdebd36b-60d8-4d94-bcd6-b6c889b7e2c9",
            "guid" => "75a1df71-1c77-498e-a5f7-e289a5a31f45"
        ]);
    }
}

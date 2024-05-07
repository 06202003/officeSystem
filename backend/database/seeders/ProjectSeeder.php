<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            "project_name" => "Smart Tutor",
            "description" => "Membuat pertanyaan berdasarkan open ai",
            "start_date" => "2024-03-06T12:04",
            "end_date" => "2024-03-10T12:04",
            "project_category_guid" => "6c46064b-c80e-4f03-a7e1-05e7eacce9a1",
            "project_manager_guid" => "25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9",
            "guid" => "cdebd36b-60d8-4d94-bcd6-b6c889b7e2c9"
        ]);
    }
}

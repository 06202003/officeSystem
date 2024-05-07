<?php

namespace Database\Seeders;

use App\Models\ProjectHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectHistory::create([      
            'guid' => '07bfdd6c-2f6f-43f0-b7dd-a46997b6844e',
            'project_name' => 'WIT System',
            'year' => '2022', 
            'platform' => 'Web',
            'role_guid' => 'f9573537-a243-481b-b005-1bc1808a5403',
            'description' => 'Buat semua bagian BackEnd',
            'user_guid'=> '25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9'
        ]);
    }
}

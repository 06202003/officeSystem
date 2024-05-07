<?php

namespace Database\Seeders;

use App\Models\ProjectHistoryMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectHistoryMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectHistoryMaster::create([      
            'guid' => 'f9573537-a243-481b-b005-1bc1808a5403',
            'role' => 'BackEnd Developer',
        ]);
    }
}

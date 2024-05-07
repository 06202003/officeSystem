<?php

namespace Database\Seeders;

use App\Models\WorkHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkHistory::create([      
            'guid' => '9c2979db-9ec3-4e2b-8d98-251916fd9462',
            'start_year' => '2010',
            'end_year' => '2014',
            'company_name' => 'WIT. ID',
            'company_phone' => '+62312341412',
            'company_adress' => 'JL Sukakarya 2 No 40 ',
            'company_type' => 'IT Consultant',
            'position' => 'CEO',
            'job_desk' => 'Responsibility all Employee',
            'user_guid' => '25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9'
        ]);
    }
}

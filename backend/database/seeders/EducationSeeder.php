<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::create([      
            'guid' => '08614201-a2be-4308-ba10-394899952d00',
            'entry_year' => '2010',
            'out_year' => '2013',
            'institution_name' => 'Institut Teknologi Bandung',
            'department' => 'STEI',
            'qualification' => '4',
            'user_guid' => '25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9'
        ]);
    }
}

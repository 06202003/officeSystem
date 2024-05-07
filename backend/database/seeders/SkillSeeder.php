<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create([      
            'guid' => '5fbf44ac-169f-48c2-b78a-fb18f0a61d29',
            'skill_guid' => '1d4d6807-2f7f-41ac-b4dd-9bc122d495ca',
            'level' => 'Advanced',
            'notes' => 'Laravel',
            'user_guid' => '25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9'
        ]);
    }
}

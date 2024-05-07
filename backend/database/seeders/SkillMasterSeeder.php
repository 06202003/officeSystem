<?php

namespace Database\Seeders;

use App\Models\SkillMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SkillMaster::create([      
            'guid' => '1d4d6807-2f7f-41ac-b4dd-9bc122d495ca',
            'skill' => 'PHP',
        ]);
    }
}

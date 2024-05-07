<?php

namespace Database\Seeders;

use App\Models\LeaveAllocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveAllocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        LeaveAllocation::create([
            'guid' => 'd8a8a1e4-d70e-45bf-a9cd-7aab29b15e8b',
            'name' => 'Cuti Tahunan',
            'number_of_day' => '15',
            'description' => 'Cuti Karyawan Tahunan',
            'user_guid' => '25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9'
        ]);

        LeaveAllocation::create([
            'guid' => '241a4c3d-9046-4376-9d94-6d0233bfc5cd',
            'name' => 'Cuti Tahunan',
            'number_of_day' => '15',
            'description' => 'Cuti Karyawan Tahunan',
            'user_guid' => '6792040b-7a2e-4759-8625-eb655417bd94'
        ]);

        LeaveAllocation::create([
            'guid' => '6792040b-7a2e-4759-8625-eb655417bd94',
            'name' => 'Cuti Tahunan',
            'number_of_day' => '15',
            'description' => 'Cuti Karyawan Tahunan',
            'user_guid' => '241a4c3d-9046-4376-9d94-6d0233bfc5cd'
        ]);

    }
}

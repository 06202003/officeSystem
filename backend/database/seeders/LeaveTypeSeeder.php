<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveType::create([
            'guid' => '8f4de85d-7bce-448d-b76c-5fe82f310faa',
            'name' => 'Cuti Sakit',
            'description' => 'Cuti karena sakit'
        ]);
    }
}

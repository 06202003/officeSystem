<?php

namespace Database\Seeders;

use App\Models\LeaveRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveRequest::create([
            'guid' => '022b315e-4bb0-4b56-a618-04a09594860b',
            'user_requested_guid' => '25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9  ',
            'start_date' => '2024-03-24',
            'end_date' => '2024-03-26',
            'leave_type_guid' => '8f4de85d-7bce-448d-b76c-5fe82f310faa',
            'date_requested' => '2024-03-22',
            'description' => 'Sakit kaki',
        ]);
    }
}

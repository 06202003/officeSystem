<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            "description" => "delete checklist",
            "card_guid" => "9ccc4398-fd37-4116-9bcc-b8729dfb32a7",
            "user_guid" => "25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9",
            "guid" => "7472b0eb-3459-4eaf-b6a2-4a82ac1f9994"
        ]);
    }
}

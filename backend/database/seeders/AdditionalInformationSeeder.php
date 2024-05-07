<?php

namespace Database\Seeders;

use App\Models\AdditionalInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdditionalInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdditionalInformation::create([
            "connection" => "friend",
            "name" => "Delvin Brian Sandika", 
            "birth_city" => "Bandung",
            "birth_date" => "20-12-1990",
            "adress" => "Jln. Dago atas",
            "phone_number" => "082155849952",
            "work" => "Freelance",
            "user_guid" => "25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9"
        ]);
}
}

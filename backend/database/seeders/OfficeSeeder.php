<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::create([
            "office_name" => "WIT.ID",
            "city" => "Bandung",
            "district" => "Sukajadi",
            "address" => "Jl. Sukakarya II No.40",
            "phone" => "0222000289",
            "guid" => "9c9e0522-6e07-4ea3-b832-40b66edc5986"
        ]);
    }
}

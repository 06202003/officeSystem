<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            "company_name" => "pylabs",
            "description" => "Perusahaan bidang IT",
            "contact" => "084534252627",
            "guid" => "80447fae-620c-4e7d-999b-4b3278377b28"
        ]);
    }
}

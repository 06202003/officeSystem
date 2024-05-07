<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::create([
            "guid" => "6e8cf392-793f-4c5f-9f77-3ebf64585dd4",
            "vendor_name" => "Point99 BEC",
            "Contact" => "089507647137",
            "address" => "Jalan Purnawarman No. 17, Bandung, West Java 40117, Indonesia",
        ]);
    }
}

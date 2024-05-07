<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventory::create([
            "inventory_name" => "Laptop",
            "brand" => "Asus",
            "purchase_date" => "2024-02-11",
            "price" => "8000000",
            "description" => "Intel I7 Gen 13",
            "category_guid" => "1f8bcf34-d26e-4656-9a17-ebedea5eb666",
            "room_guid" => "0bada170-f11a-4149-98eb-a145221191b9",
            "vendor_guid" => "6e8cf392-793f-4c5f-9f77-3ebf64585dd4",
            "guid" => "8bf610fa-67db-4e52-a24d-75352f5a1387",
        ]);
    }
}

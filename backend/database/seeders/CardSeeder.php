<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Card::create([
            "card_name" => "CRUD",
            "description" => "CRUD all data",
            "deadline" => "2024-03-10T12:04",
            "order" => 1,
            "catalog_guid" => "3ee0a215-4766-4b50-a577-b10a4a0d69aa",
            "guid" => "9ccc4398-fd37-4116-9bcc-b8729dfb32a7"
        ]);
    }
}

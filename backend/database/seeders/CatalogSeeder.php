<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalog::create([
            "list_name" => "Generate Question",
            "description" => "Generate Question With AI",
            "board_guid" => "1cdb54d5-0fa7-451b-8722-c0fd982136da",
            "guid" => "3ee0a215-4766-4b50-a577-b10a4a0d69aa",
            "order" => 1
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "category_name" => "Perangkat Elektronik",
            "guid" => "1f8bcf34-d26e-4656-9a17-ebedea5eb666",
        ]);
    }
}

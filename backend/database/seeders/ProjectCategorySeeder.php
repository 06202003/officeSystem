<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectCategory::create([
            "category_name" => "Web Laravel",
            "description" => "Membuat web dengan laravel",
            "guid" => "6c46064b-c80e-4f03-a7e1-05e7eacce9a1"
        ]);
    }
}

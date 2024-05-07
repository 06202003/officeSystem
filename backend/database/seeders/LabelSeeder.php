<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Label::create([
            "label_name" => "ready",
            "description" => "Ready",
            "color" => "blue",
            "guid" => "ea960709-92ed-4888-a8a2-4876f85b1925"
        ]);
    }
}

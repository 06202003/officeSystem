<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Board::create([
            "board_name" => "Task Smart Tutor",
            "description" => "Berisikan task apa saja yang akan dibuat",
            "project_guid" => "cdebd36b-60d8-4d94-bcd6-b6c889b7e2c9",
            "guid" => "1cdb54d5-0fa7-451b-8722-c0fd982136da"
        ]);
    }
}

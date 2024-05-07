<?php

namespace Database\Seeders;

use App\Models\Checklist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Checklist::create(
            [
                "checklist_name" => "Today Task",
                "card_guid" => "9ccc4398-fd37-4116-9bcc-b8729dfb32a7",
                "guid" => "05558179-1853-4c0e-b031-57a642cf44b1"
            ]

        );
    }
}

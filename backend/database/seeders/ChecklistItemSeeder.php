<?php

namespace Database\Seeders;

use App\Models\ChecklistItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChecklistItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChecklistItem::create([
            "checklist_item_name" => "Make Postman",
            "checked" => 1,
            "checklist_guid" => "05558179-1853-4c0e-b031-57a642cf44b1",
            "guid" => "3a1f1b1d-9beb-46ef-b645-54ffad1a7bbe"
        ]);
    }
}

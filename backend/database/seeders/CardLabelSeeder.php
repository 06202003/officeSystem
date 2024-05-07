<?php

namespace Database\Seeders;

use App\Models\CardLabel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CardLabel::create([
            "card_guid" => "9ccc4398-fd37-4116-9bcc-b8729dfb32a7",
            "label_guid" => "ea960709-92ed-4888-a8a2-4876f85b1925",
            "guid" => "f8885534-d4a3-415e-913d-e95bf8a886f6"
        ]);
    }
}

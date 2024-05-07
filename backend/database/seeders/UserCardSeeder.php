<?php

namespace Database\Seeders;

use App\Models\UserCard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserCard::create([
            'card_guid' => '9ccc4398-fd37-4116-9bcc-b8729dfb32a7',
            'user_guid' => '25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9',
            'guid' => '7fbf44ac-169f-48c2-b72a-fb18f0a61d21'
        ]);
    }
}

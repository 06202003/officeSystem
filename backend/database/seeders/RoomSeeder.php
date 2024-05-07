<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            "room_name" => "Ruang Magang",
            "floor" => "1",
            "office_guid" => "9c9e0522-6e07-4ea3-b832-40b66edc5986",
            "guid" => "0bada170-f11a-4149-98eb-a145221191b9",
        ]);
    }
}

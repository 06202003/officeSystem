<?php

namespace Database\Seeders;

use App\Models\Notice;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Notice::create([
            'guid' => '0asb0f15-df3d-4dbd-a126-61e984fe15qq',
            'title' => 'Pengumuman',
            'content' => 'Diharapkan semua hadir rapat hari kamis',
            'url' => 'https://wit.id',
        ]);

        Notice::create([
            'guid' => '2pp634f5-b9c3-42f1-880c-ace3abba9fas',
            'title' => 'Info',
            'content' => 'Hari minggu libur',
            'url' => 'https://wit.id',
        ]);
    }
}

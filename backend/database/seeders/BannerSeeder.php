<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'guid' => '077b0f15-df3d-4dbd-a126-61e984fe15qq',
            'title' => 'Our Team',
            'content' => 'WIT Full Team',
            'url' => 'https://wit.id',
            'image' => 'https://wit.id/wp-content/uploads/2021/11/2021-WE101-Internal.jpg',
        ]);

        Banner::create([
            'guid' => '281634f5-b9c3-42f1-880c-ace3abba9fas',
            'title' => 'Banner 2',
            'content' => 'Description Banner 2',
            'url' => 'https://wit.id',
            'image' => 'https://wit.id/wp-content/uploads/2021/08/bg2-we101-scaled.jpg',
        ]);

        Banner::create([
            'guid' => '281634f5-b9c3-42f1-880c-ace3abba9fpp',
            'title' => 'Banner 3',
            'content' => 'Description Banner 3',
            'url' => 'https://wit.id',
            'image' => 'https://wit.id/wp-content/uploads/2021/04/bg-2021-we-101-paperfeed.jpeg',
        ]);
    }
}

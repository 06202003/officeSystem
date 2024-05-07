<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            "text" => "Good",
            "card_guid" => "9ccc4398-fd37-4116-9bcc-b8729dfb32a7",
            "guid" => "1cc16ef5-1aad-4a36-8632-91fc75bbb09f"
        ]);
    }
}

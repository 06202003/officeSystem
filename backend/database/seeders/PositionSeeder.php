<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'guid' => '077b0f15-df3d-4dbd-a126-61e984fe153c',
            'position_name' => 'Chief Executive Officer',
        ]);

        Position::create([
            'guid' => '281634f5-b9c3-42f1-880c-ace3abba9f14',
            'position_name' => 'Managing Director',
        ]);

        Position::create([
            'guid' => '6273d3bb-a940-4f9f-b583-a71420bc50c0',
            'position_name' => 'Human Resource Manager',
        ]);

        Position::create([
            'guid' => '4ab917a1-f005-4577-94a5-46abcb510516',
            'position_name' => 'General Manager',
        ]);

        Position::create([
            'guid' => '07dfbc87-4f58-48f8-a602-7bf2e7aa2185',
            'position_name' => 'Chief Finance Officer',
        ]);

        Position::create([
            'guid' => '5c9a150a-3247-464a-a187-502cba6f6889',
            'position_name' => 'Chief Marketing Officer',
        ]);

        Position::create([
            'guid' => '867b7a9a-6a25-47b8-a22d-e496e2de4e09',
            'position_name' => 'Chief Infrastructure Officer',
        ]);

        Position::create([
            'guid' => '36a9ce57-ae96-428e-a4b9-44c300ca7834',
            'position_name' => 'Chief Operation Officer',
        ]);

        Position::create([
            'guid' => 'c072e222-9c2a-4b09-9c81-01ff2f190ccc',
            'position_name' => 'Chief Technology Officer',
        ]);

        Position::create([
            'guid' => '7cd465ef-673a-4f88-9014-449d8d71cc17',
            'position_name' => 'Head Of Analyst Division',
        ]);

        Position::create([
            'guid' => '044faee8-faaa-48fd-baa9-69867cb848b3',
            'position_name' => 'Head Of Frontend Division',
        ]);

        Position::create([
            'guid' => 'a202bb0c-d590-4cd6-8d38-35ac902b7510',
            'position_name' => 'Head Of Backend Division',
        ]);

        Position::create([
            'guid' => '5ee912a2-267d-4fd3-8560-5f8813d15740',
            'position_name' => 'Head Of Mobile Division',
        ]);

        Position::create([
            'guid' => 'c3368e2d-954f-4cbc-9cc7-e9d5bddda049',
            'position_name' => 'Head Of Project Division',
        ]);

        Position::create([
            'guid' => 'c84a673c-aba1-47b3-8bd7-34b27fae27a5',
            'position_name' => 'Finance Manager',
        ]);

        Position::create([
            'guid' => 'f2369222-458f-48d6-b515-f9cbfa325667',
            'position_name' => 'Corporate Secretary',
        ]);

        Position::create([
            'guid' => 'd111ad9b-f12a-4aa9-bb39-c8c129d01565',
            'position_name' => 'Business Development',
        ]);

        Position::create([
            'guid' => '05bf5c20-ecc6-474a-9a18-5aaf8c27af4c',
            'position_name' => 'Strategic Communication',
        ]);

        Position::create([
            'guid' => 'd5ba812d-1e05-4a53-88ef-50d138a3e226',
            'position_name' => 'Brand Strategic',
        ]);

        Position::create([
            'guid' => '0e5da571-c5d7-40aa-921e-35729614491a',
            'position_name' => 'Senior Business Analyst',
        ]);

        Position::create([
            'guid' => '06d37686-b6a3-4329-a4a0-5ace81584acc',
            'position_name' => 'Senior Frontend Developer',
        ]);

        Position::create([
            'guid' => '1a1ec1a8-f6ae-4fda-a9ba-092786f8235e',
            'position_name' => 'Senior Project Manager',
        ]);

        Position::create([
            'guid' => 'ba525276-80d3-4666-93af-0cc84394e71c',
            'position_name' => 'Senior Backend Developer',
        ]);

        Position::create([
            'guid' => 'b037dffd-2c27-42f8-bcb6-92014d3c1361',
            'position_name' => 'Senior Mobile Developer',
        ]);

        Position::create([
            'guid' => '124ff006-8826-49bb-a30d-8f420a212e9b',
            'position_name' => 'Junior Mobile Developer',
        ]);

        Position::create([
            'guid' => 'f7e0b860-4cac-460e-b0a0-15327bf3012f',
            'position_name' => 'Junior Backend Developer',
        ]);

        Position::create([
            'guid' => '5b2d5c52-a7fe-4d21-b837-50826c3e8664',
            'position_name' => 'Junior Frontend Developer',
        ]);

        Position::create([
            'guid' => '9568a49f-2507-4dfb-85d2-663c619423b1',
            'position_name' => 'UI/UX Designer',
        ]);

        Position::create([
            'guid' => '6092c737-bdd7-442f-a5cb-eea6ddb2730b',
            'position_name' => 'Senior Dev Ops',
        ]);

        Position::create([
            'guid' => 'b7a97b95-7798-4a0f-ab84-cd6f0c5bf2d0',
            'position_name' => 'Networking Supervisor',
        ]);

        Position::create([
            'guid' => 'a54fb841-f070-456c-9fae-07eb5d3b674d',
            'position_name' => 'Web Developer',
        ]);

        Position::create([
            'guid' => '007056be-9cfe-4cd3-a947-27bc459bf4ce',
            'position_name' => 'Internship',
        ]);

        Position::create([
            'guid' => '2b1221cc-0649-4470-b232-530ce4dd43a9',
            'position_name' => 'Freelance',
        ]);
    }
}

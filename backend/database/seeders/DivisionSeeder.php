<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::create([
            'guid' => '3fa79246-097e-4765-a573-22a834bc0939',
            'department_guid' => '2037e615-a3a9-4b0f-a9ae-a8bcbd829068',
            'division_name' => 'Strategic',
        ]);

        Division::create([
            'guid' => 'd5a95eeb-77d7-44c4-8258-64bfab5d320d',
            'department_guid' => 'b0cc7d8e-e7d8-48ff-aff7-654e268638cd',
            'division_name' => 'Analyst',
        ]);

        Division::create([
            'guid' => 'ccd4b4fa-c4b0-4425-8532-6dce93bccc32',
            'department_guid' => 'b0cc7d8e-e7d8-48ff-aff7-654e268638cd',
            'division_name' => 'Frontend',
        ]);

        Division::create([
            'guid' => 'df08acfa-401b-408a-85f7-9dde27e3d611',
            'department_guid' => 'b0cc7d8e-e7d8-48ff-aff7-654e268638cd',
            'division_name' => 'Project',
        ]);

        Division::create([
            'guid' => '63cf422d-0759-473b-a735-6c0d9ca70543',
            'department_guid' => 'b0cc7d8e-e7d8-48ff-aff7-654e268638cd',
            'division_name' => 'Backend',
        ]);

        Division::create([
            'guid' => 'e925a071-f7a4-4335-902d-e009c245c020',
            'department_guid' => 'b0cc7d8e-e7d8-48ff-aff7-654e268638cd',
            'division_name' => 'Mobile',
        ]);

        Division::create([
            'guid' => '2e1fc7f3-8317-4199-9633-c97536c66c9c',
            'department_guid' => 'b0cc7d8e-e7d8-48ff-aff7-654e268638cd',
            'division_name' => 'Frontend',
        ]);

        Division::create([
            'guid' => '5877a1f1-4fcf-460c-a7f2-be9e5994f5fd',
            'department_guid' => '06c2a184-3ed0-4b37-a957-a1a69ab08ac7',
            'division_name' => 'Dev Ops',
        ]);

        Division::create([
            'guid' => '0e02456a-3e8a-42de-aa12-2d1d7ca10fa9',
            'department_guid' => '06c2a184-3ed0-4b37-a957-a1a69ab08ac7',
            'division_name' => 'Networking',
        ]);

        Division::create([
            'guid' => '6ff2b859-bb79-483f-84e6-d539b74838e1',
            'department_guid' => '8c7e7652-8910-4cde-bfe4-3ab97fca8511',
            'division_name' => 'Website',
        ]);

        Division::create([
            'guid' => '7a079a87-5ee3-4fa1-a135-3bd9da690da3',
            'department_guid' => '8c7e7652-8910-4cde-bfe4-3ab97fca8511',
            'division_name' => 'WMS',
        ]);

        Division::create([
            'guid' => 'ec13af89-f503-43b1-9dbd-230de6ddad09',
            'department_guid' => 'a05f24b5-3f82-4f23-b500-bff7b684e4da',
            'division_name' => 'Administrator',
        ]);

        Division::create([
            'guid' => 'd57dd7ef-f59c-4a34-bc7c-85ec75c27c52',
            'department_guid' => 'a05f24b5-3f82-4f23-b500-bff7b684e4da',
            'division_name' => 'Fullstack',
        ]);

        Division::create([
            'guid' => 'fec13ab5-b1da-4c30-a4d2-6b94736b4b85',
            'department_guid' => 'a05f24b5-3f82-4f23-b500-bff7b684e4da',
            'division_name' => 'Frontend',
        ]);
    }
}

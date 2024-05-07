<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'guid' => '87ef5817-e5a0-46a8-b862-a9d8ed7f185e',
            'department_name' => 'Finance',
        ]);

        Department::create([
            'guid' => '2037e615-a3a9-4b0f-a9ae-a8bcbd829068',
            'department_name' => 'Marketing',
        ]);

        Department::create([
            'guid' => '06c2a184-3ed0-4b37-a957-a1a69ab08ac7',
            'department_name' => 'Infrastructure',
        ]);

        Department::create([
            'guid' => '8c7e7652-8910-4cde-bfe4-3ab97fca8511',
            'department_name' => 'Operational',
        ]);

        Department::create([
            'guid' => 'b0cc7d8e-e7d8-48ff-aff7-654e268638cd',
            'department_name' => 'Technology',
        ]);

        Department::create([
            'guid' => 'a05f24b5-3f82-4f23-b500-bff7b684e4da',
            'department_name' => 'Freelance',
        ]);

        Department::create([
            'guid' => '25709cce-53e5-4f13-b27c-883444f06889',
            'department_name' => 'Intenship',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'guid' => '191f864a-32d3-4441-a4d7-43b7f590b538',
            'role_name' => 'Super Admin',
        ]);

        Role::create([
            'guid' => 'bd7f61fa-3e93-4373-a988-4b0e84864944',
            'role_name' => 'Admin',
        ]);

        Role::create([
            'guid' => '2c2ce088-92f3-4ffa-b81d-9a1dd17a9076',
            'role_name' => 'User',
        ]);
    }
}

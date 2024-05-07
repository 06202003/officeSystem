<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Super Admin
        $superAdmin = User::create([
            'name' => 'WIT.ID Super Admin',
            'email' => 'superadmin@wit.id',
            'password' => Hash::make('empatTH3010*#'),
            'status' => 'active',
        ]);

        // Admin
        $admin = User::create([
            'name' => 'WIT.ID Admin',
            'email' => 'admin@wit.id',
            'password' => Hash::make('admin12345*#'),
            'status' => 'active',
        ]);

        // Alby
        $user1 = User::create([
            'position_guid' => 'c072e222-9c2a-4b09-9c81-01ff2f190ccc',
            'department_guid' => 'b0cc7d8e-e7d8-48ff-aff7-654e268638cd',
            'division_guid' => 'e925a071-f7a4-4335-902d-e009c245c020',
            'fcm_token' => null,
            'id_employee' => 'WIT-010-001',
            'name' => 'Alby Ariahari Putra',
            'email' => 'albyariahari@wit.id',
            'phone_number' => '085721622577',
            'password' => Hash::make('asdasd12*#'),
            'email_verified_at' => Carbon::now(),
            'type' => "Top Management",
            'status' => 'active',
            'guid' => '25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9'
        ]);

        // Mullik
        $user2 = User::create([
            'position_guid' => 'b037dffd-2c27-42f8-bcb6-92014d3c1361',
            'department_guid' => 'b0cc7d8e-e7d8-48ff-aff7-654e268638cd',
            'division_guid' => 'e925a071-f7a4-4335-902d-e009c245c020',
            'fcm_token' => null,
            'id_employee' => 'WIT-010-010',
            'name' => 'Triand Mullik',
            'email' => 'triand@wit.id',
            'phone_number' => '087821913435',
            'password' => Hash::make('asdasd12*#'),
            'email_verified_at' => Carbon::now(),
            'status' => 'active',
            'guid' => '241a4c3d-9046-4376-9d94-6d0233bfc5cd'

            
        ]);

        // Mek
        $user3 = User::create([
            'position_guid' => '5ee912a2-267d-4fd3-8560-5f8813d15740',
            'department_guid' => 'b0cc7d8e-e7d8-48ff-aff7-654e268638cd',
            'division_guid' => 'e925a071-f7a4-4335-902d-e009c245c020',
            'fcm_token' => null,
            'id_employee' => 'WIT-010-005',
            'name' => 'Mikhael Suryawan Putra',
            'email' => 'mikhael@wit.id',
            'phone_number' => '081221689093',
            'password' => Hash::make('asdasd12*#'),
            'email_verified_at' => Carbon::now(),
            'type' => "Middle Management",
            'status' => 'active',
            'guid' => '6792040b-7a2e-4759-8625-eb655417bd94'

        ]);

        $superAdmin->assignRole('Super Admin');
        $admin->assignRole('Admin');
        $user1->assignRole('User');
        $user2->assignRole('User');
        $user3->assignRole('User');
    }
}

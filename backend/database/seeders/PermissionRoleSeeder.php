<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
            'Read_Dashboard',

            'Create_Role',
            'Read_Role',
            'Update_Role',
            'Delete_Role',

            'Create_User',
            'Read_User',
            'Update_User',
            'Delete_User',

            'Create_Position',
            'Read_Position',
            'Update_Position',
            'Delete_Position',

            'Create_Department',
            'Read_Department',
            'Update_Department',
            'Delete_Department',

            'Create_Division',
            'Read_Division',
            'Update_Division',
            'Delete_Division',

            'Read_Attendance',

            'Create_ProductTag',
            'Read_ProductTag',
            'Update_ProductTag',
            'Delete_ProductTag',

            'Create_Product',
            'Read_Product',
            'Update_Product',
            'Delete_Product',

            'Create_Notice',
            'Read_Notice',
            'Update_Notice',
            'Delete_Notice',

            'Create_Banner',
            'Read_Banner',
            'Update_Banner',
            'Delete_Banner',

            'Create_CV',
            'Read_CV',
            'Update_CV',
            'Delete_CV',

            'Create_SkillMaster',
            'Read_SkillMaster',
            'Update_SkillMaster',
            'Delete_SkillMaster',

            'Create_Skill',
            'Read_Skill',
            'Update_Skill',
            'Delete_Skill',

            'Create_ProjectHistoryMaster',
            'Read_ProjectHistoryMaster',
            'Update_ProjectHistoryMaster',
            'Delete_ProjectHistoryMaster',

            'Create_WorkHistory',
            'Read_WorkHistory',
            'Update_WorkHistory',
            'Delete_WorkHistory',

            'Create_AdditionalInformation',
            'Read_AdditionalInformation',
            'Update_AdditionalInformation',
            'Delete_AdditionalInformation',

            'Create_ReferenceContact',
            'Read_ReferenceContact',
            'Update_ReferenceContact',
            'Delete_ReferenceContact',

            'Create_LeaveType',
            'Read_LeaveType',
            'Update_LeaveType',
            'Delete_LeaveType',

            'Create_LeaveRequest',
            'Read_LeaveRequest',
            'Update_LeaveRequest',
            'Delete_LeaveRequest',

            'Create_LeaveAllocation',
            'Read_LeaveAllocation',
            'Update_LeaveAllocation',
            'Delete_LeaveAllocation',
        ];

        $currentTime = Carbon::now();

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'created_at' => $currentTime,
            ]);

            // Menambahkan 1 detik untuk perbedaan waktu di setiap data berikutnya
            $currentTime = $currentTime->addSeconds(1);
        }

        Role::create([
            'guid' => '2c2ce088-92f3-4ffa-b81d-9a1dd17a9076',
            'name' => 'User',
        ]);

        Role::create([
            'guid' => 'bd7f61fa-3e93-4373-a988-4b0e84864944',
            'name' => 'Admin',
        ]);

        Role::create([
            'guid' => '191f864a-32d3-4441-a4d7-43b7f590b538',
            'name' => 'Super Admin',
        ]);

        $roleSuperAdmin = Role::findByName('Super Admin');
        $roleSuperAdmin->givePermissionTo(Permission::all());


        $permissionsUser = [
            'Read_Dashboard',

            'Read_Attendance',

            'Read_ProductTag',

            'Read_Product',

            'Read_Notice',

            'Read_Banner',
        ];

        $roleUser = Role::findByName('User');
        $roleUser->givePermissionTo($permissionsUser);
    }
}

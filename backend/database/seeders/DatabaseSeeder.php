<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Office;
use App\Models\Room;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
                $this->call(PermissionRoleSeeder::class);
                $this->call(VendorSeeder::class);

                $this->call(PositionSeeder::class);
                $this->call(DepartmentSeeder::class);
                $this->call(DivisionSeeder::class);
                $this->call(UserSeeder::class);
                $this->call(FileSeeder::class);
                $this->call(NoticeSeeder::class);
                $this->call(BannerSeeder::class);
                $this->call(OtpSeeder::class);
                $this->call(AttendanceLogSeeder::class);
                $this->call(ProvincesTableSeeder::class);
                $this->call(CitiesTableSeeder::class);
                $this->call(ParameterMasterSeeder::class);

                //CV Seeder
                $this->call(EducationSeeder::class);
                $this->call(SkillMasterSeeder::class);
                $this->call(SkillSeeder::class);
                $this->call(ProjectHistoryMasterSeeder::class);
                $this->call(ProjectHistorySeeder::class);
                $this->call(WorkHistorySeeder::class);

                //Inventory Seeder
                $this->call(OfficeSeeder::class);
                $this->call(RoomSeeder::class);
                $this->call(CategorySeeder::class);
                $this->call(InventorySeeder::class);

                //Leave Seeder
                $this->call(LeaveAllocationsSeeder::class);
                $this->call(LeaveTypeSeeder::class);
                $this->call(LeaveRequestSeeder::class);

                // $this->call(VillagesTableSeeder::class);
                $this->call(ProjectCategorySeeder::class);
                $this->call(CompanySeeder::class);
                $this->call(ProjectSeeder::class);
                $this->call(CompanyProjectSeeder::class);
                $this->call(UserProjectSeeder::class);
                $this->call(BoardSeeder::class);
                $this->call(CatalogSeeder::class);
                $this->call(CardSeeder::class);
                $this->call(LabelSeeder::class);
                $this->call(CardLabelSeeder::class);
                $this->call(CommentSeeder::class);
                $this->call(ActivitySeeder::class);
                $this->call(ChecklistSeeder::class);
                $this->call(ChecklistItemSeeder::class);
                $this->call(UserCardSeeder::class);
        }
}
